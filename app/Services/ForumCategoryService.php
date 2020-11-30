<?php

namespace App\Services;

use App\ForumCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ForumCategoryService
{
    public function index()
    {
        return ForumCategory::orderBy('name', 'asc')->withCount('topic')->get();
    }

    public function create(array $data)
    {
        return ForumCategory::create($data);
    }

    public function find(int $category_id)
    {
        return ForumCategory::find($category_id);
    }

    public function update(int $category_id, array $data)
    {
        return ForumCategory::where('id', $category_id)->update($data);
    }  

    public function destroy(int $category_id)
    {
        return ForumCategory::find($category_id)->delete();
    }
}