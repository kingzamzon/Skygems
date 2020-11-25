<?php

namespace App\Http\Controllers\Api;

use App\ForumComment;
use App\Http\Controllers\Controller;
use App\Services\ForumCommentService;
use Illuminate\Http\Request;

class ForumCommentController extends Controller
{
    protected $forumCommentService;

    public function __construct(ForumCommentService $forumCommentService)
    {
        $this->forumCommentService = $forumCommentService;
    }

    /**
     * Like a single Topic comment 
     *
     */

    public function likeComment($comment_id)
    {
        $comment = $this->forumCommentService->find($comment_id);
        $comment->likes += 1;
        $comment->save();

        return response($comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'comment' => 'required',
            'topic_id' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        $data['likes'] = 0;

        $data = $this->forumCommentService->create($data);

        return response($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumComment $forumComment)
    {
        //
    }
}
