<?php

namespace App\Services\Category;

use App\Contracts\Admin\AdminContracts;
use App\Contracts\Auth\AuthContract;
use App\Contracts\Category\CategoryContracts;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CategoryService implements CategoryContracts
{

    public function getAll()
    {
        $data = Category::where('is_active', 1)->get();
        return $data;
    }
    public function createCategory($data)
    {
        $isCreateCategory = Category::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
        return $isCreateCategory;
    }

    public function updateCategory($data)
    {
        $id = uuidtoid($data['uuid'], 'categories');
        $isUpdateCategory = Category::where('id', $id)->first();
        $isUpdateCategory->name = $data['name'];
        $isUpdateCategory->description= $data['description'];
        $isUpdateCategory->save();
        return $isUpdateCategory;
    }

    public function findZoneById($uuid)
    {
        $id = uuidtoid($uuid, 'categories');
        return Category::find($id);
    }
}
