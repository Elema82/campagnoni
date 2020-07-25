<?php

namespace App\V1\Products\Model;

use App\V1\BaseModel;
use App\V1\Files\Model\File;

/**
 * Class ProductAttributes
 * @package App\V1\Products\Model
 */
class ProductAttributes extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'products_attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'key',
        'value',
        'product_id'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'key' => 'required|string|max:255',
        'value' => 'required|string',
        'product_id' => 'integer|exists:products,id'
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
        return $this->belongsTo(ProductCategoryAttributes::class, 'key', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
