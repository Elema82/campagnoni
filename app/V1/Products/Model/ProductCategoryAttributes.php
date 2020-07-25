<?php

namespace App\V1\Products\Model;

use App\V1\BaseModel;
use App\V1\Categories\Model\Category;

/**
 * Class ProductCategoryAttributes
 * @package App\V1\Products\Model
 */
class ProductCategoryAttributes extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'products_category_attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'key',
        'category_id'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'key' => 'required|string|max:255',
        'category_id' => 'integer|exists:categories,id'
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

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
