<?php

namespace App\V1\Categories\Model;

use App\V1\BaseModel;
use App\V1\Products\Model\Product;

/**
 * Class Category
 * @package App\Api\V1\Categories
 */
class Category extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'type',
        "root"
    ];

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'root' => 'integer'
    ];

    public $timestamps = false;

    /**
     * @param int $id
     * @param int $owner
     * @return mixed
     */
    public function findByOwner($id, $owner)
    {
        return $this->findOrFail($id);
    }

    static function getCategoryByName($name)
    {
        $category = Category::from('categories')->select('*')->where('name','=',$name)->first();
        return $category->id;
    }

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

}
