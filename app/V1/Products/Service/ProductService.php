<?php

namespace App\V1\Products\Service;

use App\Events\Attachments\CreateFile;
use App\V1\Files\Model\File;
use App\V1\Products\Model\Product;
use App\V1\Products\Model\ProductAttributes;

class ProductService
{
    /**
     * Add a new role to the database
     * @param $data
     * @return Product
     */
    public function add($data)
    {
        $product = Product::firstOrNew([
            'name' => $data['name'],
            'description' => $data['description'],
            'category' => $data['category'],
            'img_principal' => 0
        ]);

        if(!$errors = $product->isValid()) {
            return view('adminlte::products/create', ['product' => $product, 'errors' => $errors]);
        }

        $product->save();

        if(array_get($data, 'thumbnail'))
        {
            $data['file'] = $data['thumbnail'];
            $attachment = $this->addAttachment($product, $data);
            $product->setAttribute('img_thumbnail',  $attachment->id);
            $product->save();
            unset($data['file']);
        }

        if(array_get($data, 'principal'))
        {
            $data['file'] = $data['principal'];
            $attachment = $this->addAttachment($product, $data);
            $product->setAttribute('img_principal',  $attachment->id);
            $product->save();
            unset($data['file']);
        }

        if(array_get($data, 'imagenes') && (!empty($data['imagenes'])))
        {
            foreach ($data['imagenes'] as $imagen)
            {
                $data['file'] = $imagen;
                $attachment = $this->addAttachment($product, $data);
                unset($data['file']);
            }
        }

        $product->save();

        return $product;
    }

    public function addAttachment(Product $product, $request)
    {

        $attachment = new File();
        event(new CreateFile($attachment, $request, $product));

        return $attachment;
    }
    /**
     * Update a role record
     * @param $id
     * @param $data
     * @return Product
     */
    public function update(Product $product, $data)
    {
        $product->fill($data);

        if(!$errors = $product->isValid()) {
            return view('adminlte::products/create', ['product' => $product, 'errors' => $errors]);
        }

        $product->save();

        if(array_get($data, 'attributes'))
        {
            $attributes = $data['attributes'];
            if(!empty($attributes))
            {
                ProductAttributes::from("products_attributes")->select('*')
                    ->where('product_id','=', $product->id)
                    ->forceDelete();
                foreach ($attributes as $key => $value)
                {
                    if($value != ''){
                        $attribute = ProductAttributes::firstOrNew([
                            'product_id' => $product->id,
                            'key' => $key,
                            'value' => $value
                        ]);
                        $product->addAttribute($attribute);
                    }
                }
            }
        }
        /**
         *
         */
        if(array_get($data, 'thumbnail'))
        {
            foreach ($product->attachments()->getResults() as $image){
                if($image->id == $product->img_thumbnail)
                    $image->delete();
            }
            $data['file'] = $data['thumbnail'];
            $attachment = $this->addAttachment($product, $data);
            $product->setAttribute('img_thumbnail',  $attachment->id);
            $product->save();
            unset($data['file']);
        }

        if(array_get($data, 'principal')) {
            foreach ($product->attachments()->getResults() as $image){
                if($image->id == $product->img_principal)
                    $image->delete();
            }
            $data['file'] = $data['principal'];
            $attachment = $this->addAttachment($product, $data);
            $product->setAttribute('img_principal',  $attachment->id);
            $product->save();
            unset($data['file']);
        }


        if (array_get($data ,'removeall') && $data['removeall'])
        {
            foreach ($product->attachments()->getResults() as $image) {
                $image->delete();
            }
        }


        if(array_get($data, 'imagenes') && (!empty($data['imagenes'])))
        {
            foreach ($product->attachments()->getResults() as $image) {
                if($image->id != $product->img_principal && $image->id != $product->img_thumbnail)
                    $image->delete();
            }

            foreach ($data['imagenes'] as $imagen)
            {
                $img['file'] = $imagen;
                $attachment = $this->addAttachment($product, $img);
                $product->save();
                $img['file'] = '';
            }
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
        $Product = Product::find($id);

        $Product->delete();
        return true;
    }
}