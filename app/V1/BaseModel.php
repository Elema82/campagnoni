<?php

namespace App\V1;

//use App\Http\Requests\Filters\ValidatingFilterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{
//    use ValidatingFilterable;

    protected $primarySearchColumn = 'id';

    protected $tableAlias = '';

    protected $idSaved = false;

    protected $monetary = [];

    public function isValid()
    {
        /**
         * @var $validator Validator
         */
        $validator = \Validator::make($this->toArray(), $this->rules);

        if ($validator->fails()) {
            return  $validator->getMessageBag();
        }

        return true;
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasAttribute($key)
    {
        return array_key_exists($key, array_flip($this->getAttributes()));
    }

    /**
     * @return array|string
     */
    public function getPrimarySearchColumn()
    {
        if(!is_array($this->primarySearchColumn))
            return $this->tableAlias . $this->primarySearchColumn;
        else{
            $columnsAndAlias = [];
            foreach ($this->primarySearchColumn as $column){
                $columnsAndAlias[] = $this->tableAlias . $column;
            }
            return $columnsAndAlias;
        }
    }

    /**
     * @param string $order
     * @return string
     */
    public function getOrderingCriteria($order)
    {
        return Schema::hasColumn($this->getTable(), $order)
            ? $this->tableAlias . $order
            : $this->getPrimarySearchColumn();
    }

    /**
     * @param $param
     * @return string
     */
    public function likeParam($param)
    {
        return '%' . $param . '%';
    }

    /**
     * @param array $fields
     * @return array
     */
    public function toResponseArray(array $fields = [])
    {
        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $this->getAttribute($field);
        }

        return $data;
    }

    /**
     * @param BaseModel $model
     * @return bool
     */
    public function isSameAs(BaseModel $model)
    {
        return $this->is($model);
    }

    /**
     * @param array $relations
     * @param null $foreignKeyRelated
     */
    public function flush($relations = [], $foreignKeyRelated = null)
    {
        DB::beginTransaction();

        try{
            $this->forceSave();
            /** @var BaseModel $related */
            foreach ($relations as $related) {
                if($foreignKeyRelated) {
                    $related->setAttribute($foreignKeyRelated, $this->id);
                }

                $related->forceSave();
            }
        } catch(\Exception $e) {
            DB::rollback();

            throw new StoreResourceFailedException($e->getMessage());
        }

        DB::commit();

        $this->isSaved = true;
    }

    /**
     * @return bool
     */
    public function isSaved()
    {
        return $this->isSaved;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        if (array_key_exists($key, array_flip($this->monetary))) {
            $value = Money::create($value)->formatted();
        }

        $this->setAttribute($key, $value);
    }
}