<?php

namespace App\Http\Controllers\Api;

use App\ForumTopic;
use App\Services\ForumTopicService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumTopicController extends Controller
{
    protected $forumTopicService, $forumCommentService, $userService;

    public function __construct(ForumTopicService $forumTopicService, 
                                ForumCommentService $forumCommentService,
                                UserService $userService)
    {
        $this->forumTopicService = $forumTopicService;
        $this->forumCommentService = $forumCommentService;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = $this->forumTopicService->index();

        return response($data);
    }

    /**
     * Like post
     */
    public function likeTopic($slug)
    {
        $topic = $this->forumTopicService->findSlug($slug);
        // increase views 
        $topic->likes += 1;
        $topic->save();
        return response($topic);
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tag' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        $data['slug'] = str::slug($request->title, '-');
        $data['flag'] = ForumTopic::OPEN_FLAG;
        $data['views'] = 1;
        $data['likes'] = 0;

        $data = $this->forumTopicService->create($data);

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForumTopic  $forumTopic
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $topic = $this->forumTopicService->find($slug);
        // increase views 
        $topic->views += 1;
        $topic->save();

        $topic['comment_interactors'] = $this->forumCommentService->sumUniqueUserComment($topic->id);
        $topic['comments'] = $this->forumCommentService->findTopicComment($topic->id);

        return response($topic);
    }

    /**
     * 
     * @query search?query=biloo
     */
    public function findTopic(Request $request)
    {
        $query = $request->input('query');

        if($query){
            $topics = $this->forumTopicService->findByTitle($query);
            return response($topic);
        }
    }

    /**
     * 
     * 
     * Display user profile
     */
    public function profile_show($user)
    {
        $user = $this->userService->findByUsername($user);
        $user['topics'] = $this->forumTopicService->findByUser($user->id);
        $user['comments'] = $this->forumCommentService->findUserComment($user->id);

        return response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForumTopic  $forumTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumTopic $forumTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForumTopic  $forumTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumTopic $forumTopic)
    {
        //
    }
}
