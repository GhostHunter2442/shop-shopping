<?php

namespace App\Repositories;

use App\Category;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class CategoryRepository
{

    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $category = Category::all();
        return $category;
    }
    public function getById($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function getDatatables()
    {
        $query = Category::select('id', 'name')->latest('id');
        return $query;
    }

    public function store($request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return true;
    }
    public function update($request, $id)
    {
        $category = $this->getById($id);
        if(empty($category)) return false;

        $category->name = $request->name;
        $category->save();
        return true;
    }
    public function delete($id)
    {
        $category = $this->getById($id);
        if(empty($category)) return false;

        $category->delete();
        return true;
    }






}
