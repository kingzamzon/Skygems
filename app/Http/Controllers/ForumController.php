<?php

namespace App\Http\Controllers;


use App\ForumTopic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ForumCategoryService;
use App\Services\ForumTopicService;
use App\Services\ForumCommentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForumController extends Controller
{
    protected $forumCategoryService, $forumTopicService, $forumCommentService, $userService;

    public function __construct(ForumCategoryService $forumCategoryService, ForumTopicService $forumTopicService, 
                                ForumCommentService $forumCommentService, UserService $userService)
    {
        $this->forumCategoryService = $forumCategoryService;
        $this->forumTopicService = $forumTopicService;
        $this->forumCommentService = $forumCommentService;
        $this->userService = $userService;
    }

    public function login_show()
    {
        $query = '';

        return view('forum.views.login', compact('query'));
    }

    public function login(Request $request)
    {
        try {
            # credentials
            $credentials =  $request->only('phone', 'password');
            # attempt login
            if (Auth::attempt($credentials)) {
                # Authentication passed...
                $success = "Welcome";
                return redirect()->route('forum.index')->with(['data' => $success]);
            }
            else{
                return back()->withInput()->withErrors(['Password incorrect']);
            }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function logout()
    {
        # logout
        Auth::logout();
        return redirect()->route('forum.index');
    }


    /**
     * 
     * 
     * 
     * Operations related to topic
     */
    public function index()
    {
        $query = '';
        $topics = $this->forumTopicService->index();

        return view('forum.views.index', compact('topics', 'query'));
    }

    public function create()
    {
        $query = '';
        $categories = $this->forumCategoryService->index();

        return view('forum.views.create_topic', compact('query', 'categories'));
    }

    public function showTopic($slug)
    {
        $query = '';

        $topic = $this->forumTopicService->findSlug($slug);
        // increase views 
        $topic->views += 1;
        $topic->save();

        $topic['comment_interactors'] = $this->forumCommentService->sumUniqueUserComment($topic->id);

        $topics = $this->forumTopicService->index();

        return view('forum.views.single_topic', compact('topic','topics', 'query'));
    }

    public function likeTopic($slug)
    {
        $topic = $this->forumTopicService->findSlug($slug);
        // increase views 
        $topic->likes += 1;
        $topic->save();

        $success = "Topic Created";
        return redirect()->back()->with(['success' => $success]);
    }

    /**
     * Store Topic
     */
    public function storeTopic(Request $request)
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

        $post = $this->forumTopicService->create($data);

        $success = "Topic Created";
        return redirect()->back()->with(['success' => $success]);
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
            return view('forum.views.search', compact('query', 'topics'));
        }else {
            return redirect()->route('forum.404');
        }
    }

    /**
     * 
     * 
     * Operations related to comment
     */
    public function storeComment(Request $request)
    {
        $rules = [
            'comment' => 'required',
            'topic_id' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        $data['likes'] = 0;

        $post = $this->forumCommentService->create($data);

        $success = "Comment Posted";
        return redirect()->back()->with(['success' => $success]);
    }

    public function likeComment($comment_id)
    {
        $comment = $this->forumCommentService->find($comment_id);
        $comment->likes += 1;
        $comment->save();

        return redirect()->back();
    }


    /***
     * 
     * 
     * Operations related to categories
     */
    public function categories()
    {
        $query = '';
        $categories = $this->forumCategoryService->index();

        return view('forum.views.categories', compact('categories', 'query'));
    }

    public function categories_show($slug)
    {
        $query = '';
        $category = $this->forumCategoryService->find($slug);
        $topics = $this->forumTopicService->findByCategory($category->id);

        return view('forum.views.categories_single', compact('query', 'category', 'topics'));
    }

    /**
     * 
     * 
     * Display user profile
     */
    public function profile_show($user)
    {
        $query = '';
        $user = $this->userService->findByUsername($user);
        $usertopics = $this->forumTopicService->findByUser($user->id);
        $usercomments = $this->forumCommentService->findUserComment($user->id);

        return view('forum.views.user_single', compact('query', 'user', 'usertopics', 'usercomments'));
    }

    /**
     * 
     * 
     * Error page with topics to read from
     */
    public function error404()
    {
        $topics = $this->forumTopicService->index();
        $query = '';

        return view('forum.views.404', compact('topics', 'query'));
    }

}