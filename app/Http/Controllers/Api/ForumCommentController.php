<?php

namespace App\Http\Controllers\Api;

use App\ForumComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Services\ForumCommentService;

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
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'topic_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

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
