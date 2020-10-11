<?php

namespace App\Services;

use App\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function index()
    {
        return Category::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function find(int $category_id)
    {
        return Category::find($category_id);
    }

    public function update(int $category_id, array $data)
    {
        return Category::where('id', $category_id)->update($data);
    }  

    public function destroy(int $category_id)
    {
        return Category::find($category_id)->delete();
    }
}