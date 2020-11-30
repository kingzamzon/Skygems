@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent" class="tt-offset-small">
    <div class="tt-wrapper-section">
        <div class="container">
            <div class="tt-user-header">
                <div class="tt-col-avatar">
                    <div class="tt-icon">
                       <svg class="tt-icon">
                          <use xlink:href="#icon-ava-{{\Str::lower(\Str::substr($user->name, 0,1))}}"></use>
                        </svg>
                    </div>
                </div>
                <div class="tt-col-title">
                    <div class="tt-title">
                        <a href="#">{{$user->name}}</a>
                    </div>
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-color14 tt-badge">LVL : {{$user->role_id}}</span></a></li>
                    </ul>
                </div>
                <div class="tt-col-btn" id="js-settings-btn">
                    <div class="tt-list-btn">
                        <a href="#" class="tt-btn-icon">
                            <svg class="tt-icon">
                              <use xlink:href="#icon-settings_fill"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tt-tab-wrapper">
            <div class="tt-wrapper-inner">
                <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tt-tab-02" role="tab"><span>Threads</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"><span>Replies</span></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane tt-indent-none show active" id="tt-tab-02" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Activity</div>
                        </div>

                        @if ($usertopics->count() > 0)
                            @foreach ($usertopics as $usertopic)
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-{{\Str::lower(\Str::substr($usertopic->user->name, 0,1))}}"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="{{route('forum.show', ['slug' => $usertopic->slug])}}">
                                            {{$usertopic->title}}
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-11">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="{{route('forum.categories.show', ['slug' => $usertopic->category->id])}}"><span class="tt-color01 tt-badge">politics</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">{{$usertopic->tag}}</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-1 ml-auto show-mobile">
                                                <div class="tt-value">{{$usertopic->date}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category">
                                        <a href="{{route('forum.categories.show', ['slug' => $usertopic->category->id])}}">
                                            <span class="tt-color{{$usertopic->category->color}} tt-badge">{{$usertopic->category->name}}</span>
                                        </a>
                                    </div>
                                    <div class="tt-col-value hide-mobile">{{$usertopic->likes}}</div>
                                    <div class="tt-col-value tt-color-select hide-mobile">{{$usertopic->comment->count()}}</div>
                                    <div class="tt-col-value hide-mobile">{{$usertopic->views}}</div>
                                    <div class="tt-col-value hide-mobile">{{$usertopic->date}}</div>
                                </div>
                            @endforeach
                        @else
                            <h2>No Topic</h2>
                        @endif

                       
                    </div>
                </div>
                <div class="tab-pane tt-indent-none" id="tt-tab-03" role="tabpanel">
                     <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value">Activity</div>
                        </div>

                        @if ($usercomments->count() > 0)
                            @foreach ($usercomments as $usercomment)
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="{{route('forum.show', ['slug' => $usercomment->topic->slug])}}">
                                        {{$usercomment->topic->title}}
                                    </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-9">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile">
                                                    <a href="{{route('forum.categories.show', ['slug' => $usercomment->topic->category->id])}}">
                                                        <span class="tt-color{{$usercomment->topic->category->color}} tt-badge">
                                                            {{$usercomment->topic->category->name}}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-3 ml-auto show-mobile">
                                            <div class="tt-value">{{date('d M,y', strtotime($usercomment->created_at))}}</div>
                                        </div>
                                    </div>
                                    <div class="tt-content">
                                        {{$usercomment->comment}}
                                    </div>
                                </div>
                                <div class="tt-col-category">
                                    <a href="{{route('forum.categories.show', ['slug' => $usercomment->topic->category->id])}}">
                                        <span class="tt-color{{$usercomment->topic->category->color}} tt-badge">
                                            {{$usercomment->topic->category->name}}
                                        </span>
                                    </a>
                                </div>
                                <div class="tt-col-value-large hide-mobile">{{date('d M,y', strtotime($usercomment->created_at))}}</div>
                            </div>
                            @endforeach
                        @else
                            <h2>No Comment</h2>
                        @endif
                        
                        <div class="tt-row-btn">
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                  <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection