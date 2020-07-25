<?php

namespace App\V1\Categories\Service;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryService
{
    /**
     * Add a new role to the database
     * @param $data
     * @return Category
     */
    public function add($data)
    {
        $category = Category::firstOrNew([
            'name' => $data['name'],
            'type' => $data['type'],
            'root' => (isset($data['root']))?$data['root']:0
        ]);

        if ($category->isInvalid()) {
            throw new ConflictHttpException($category->getErrors());
        }

        $category->save();

        return $category;
    }

    /**
     * Update a role record
     * @param $id
     * @param $data
     * @return Category
     */
    public function update(Category $category, $data)
    {
        $category->fill($data);

        if ($category->isInvalid()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$category->getErrors());
        }

        $category->save();

        return $category;
    }

    /**
     * Delete a role from the database
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        /** @var Category $category */
        $category = Category::find($id);

        $category->delete();
        return true;
    }
}