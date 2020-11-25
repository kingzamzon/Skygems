<?php

namespace App\Services;

use App\ForumComment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ForumCommentService
{
    public function index()
    {
        return ForumComment::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return ForumComment::create($data);
    }

    public function find(int $comment_id)
    {
        return ForumComment::find($comment_id);
    }

    public function findTopicComment(int $topic_id)
    {
        return ForumComment::where('topic_id', $topic_id)->get();
    }

    public function findUserComment(int $user_id)
    {
        return ForumComment::where('user_id', $user_id)->get();
    }

    public function sumUniqueUserComment(int $topic_id)
    {
        return ForumComment::where('topic_id', $topic_id)->get()->pluck('user_id')->unique()->count();
    }

    public function update(int $comment_id, array $data)
    {
        return ForumComment::where('id', $comment_id)->update($data);
    }  

    public function destroy(int $comment_id)
    {
        return ForumComment::find($comment_id)->delete();
    }
}