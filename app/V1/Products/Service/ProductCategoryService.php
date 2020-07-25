<?php

namespace App\V1\Products\Service;

use App\Events\Attachments\CreateFile;
use App\V1\Files\Model\File;
use App\V1\Products\Model\Product;
use App\V1\Products\Model\ProductAttributes;
use App\V1\Products\Model\ProductCategoryAttributes;

class ProductCategoryService
{
    /**
     * Add a new role to the database
     * @param $data
     * @return Product
     */
    public function add($data)
    {
        $product = ProductCategoryAttributes::firstOrNew([
            'key' => $data['key'],
            'category_id' => $data['category_id']
        ]);

        if(!$errors = $product->isValid()) {
            return view('adminlte::productsCategory/create', ['product' => $product, 'errors' => $errors]);
        }

        $product->save();

        return $product;
    }


    /**
     * @param Product $product
     * @param $data
     * @return Product|array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function update(ProductCategoryAttributes $product, $data)
    {
        $product->fill($data);

        if(!$errors = $product->isValid()) {
            return view('adminlte::products/create', ['product' => $product, 'errors' => $errors]);
        }

        $product->save();

        return $product;
    }

    /**
     * Delete a role from the database
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        /** @var Product $Product */
        $Product = ProductCategoryAttributes::find($id);

        $Product->delete();
        return true;
    }
}