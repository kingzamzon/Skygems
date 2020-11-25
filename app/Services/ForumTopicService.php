<?php

namespace App\Services;

use App\ForumTopic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ForumTopicService
{
    public function index()
    {
        return ForumTopic::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return ForumTopic::create($data);
    }

    public function find(int $topic_id)
    {
        return ForumTopic::find($topic_id);
    }

    public function findSlug(string $slug)
    {
        return ForumTopic::where('slug', $slug)->first();
    }  

    public function findByTitle(string $title)
    {
        return ForumTopic::where('title', 'like', '%'.$title.'%')->get();
    }  

    public function update(int $topic_id, array $data)
    {
        return ForumTopic::where('id', $topic_id)->update($data);
    }  

    public function destroy(int $topic_id)
    {
        return ForumTopic::find($topic_id)->delete();
    }
}