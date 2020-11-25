<?php

namespace App\Http\Controllers\Api;

use App\ForumCategory;
use App\Services\ForumTopicService;
use App\Services\ForumCategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumCategoryController extends Controller
{
    protected $forumTopicService, $forumCategoryService;

    public function __construct(ForumTopicService $forumTopicService, ForumCategoryService $forumCategoryService)
    {
        $this->forumTopicService = $forumTopicService;
        $this->forumCategoryService = $forumCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->forumCategoryService->index();

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForumCategory  $forumCategory
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $category = $this->forumCategoryService->find($category);
        $category['topics'] = $this->forumTopicService->findByCategory($category->id);

        return response($category);
    }
}
