@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-single-topic-list">
            <div class="tt-item">
                 <div class="tt-single-topic">
                    <div class="tt-item-header">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-{{\Str::lower(\Str::substr($topic->user->name, 0,1))}}"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                               <a href="#">{{$topic->user->name}}</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                            </a>
                        </div>
                        <h3 class="tt-item-title">{{$topic->title}}</h3>
                        <div class="tt-item-tag">
                            <ul class="tt-list-badge">
                                <li><a href="{{route('forum.categories.show', ['slug' => $topic->category->id])}}"><span class="tt-color{{$topic->category->color}} tt-badge">{{$topic->category->name}}</span></a></li>
                                <li><a href="#"><span class="tt-badge">{{$topic->tag}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        {!! $topic->body !!}
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                            <span class="tt-text">{{$topic->likes}}</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                             <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            <span class="tt-text">{{$topic->likes}}</span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                             <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tt-item">
                <div class="tt-info-box">
                    <h6 class="tt-title">Thread Status</h6>
                    <div class="tt-row-icon">
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                <span class="tt-text">{{$topic->comment->count()}}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-view"></use></svg></i>
                                <span class="tt-text">{{$topic->views}}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-user"></use></svg></i>
                                <span class="tt-text">@if($topic->comment->count() > 0) 
                                    {{$topic->comment_interactors}} @else {{ 0 }}@endif
                                </span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                <span class="tt-text">{{$topic->likes}}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                <span class="tt-text">{{$topic->likes}}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                              <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                <span class="tt-text">32</span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row-object-inline form-default">
                        <h6 class="tt-title">Sort replies by:</h6>
                        <ul class="tt-list-badge tt-size-lg">
                            <li><a href="#"><span class="tt-color02 tt-badge">Recent</span></a></li>
                            <li><a href="#"><span class="tt-badge">Most Liked</span></a></li>
                            <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                            <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                            <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
                        </ul>
                        <select class="tt-select form-control">
                            <option value="Recent">Recent</option>
                            <option value="Most Liked">Most Liked</option>
                            <option value="Longest">Longest</option>
                            <option value="Shortest">Shortest</option>
                            <option value="Accepted Answer">Accepted Answer</option>
                        </select>
                    </div>
                </div>
            </div>
            @if($topic->comment->count() > 0)
                @foreach ($topic->comment as $com)
                    <div class="tt-item">
                        <div class="tt-single-topic">
                            <div class="tt-item-header pt-noborder">
                                <div class="tt-item-info info-top">
                                    <div class="tt-avatar-icon">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-ava-{{\Str::lower(\Str::substr($com->user->name, 0,1))}}"></use></svg></i>
                                    </div>
                                    <div class="tt-avatar-title">
                                    <a href="#">{{$com->user->name}}</a>
                                    </div>
                                    <a href="#" class="tt-info-time">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{date('d M, y', strtotime($com->created_at))}}
                                    </a>
                                </div>
                            </div>
                            <div class="tt-item-description">
                                {{$com->comment}}
                            </div>
                            <div class="tt-item-info info-bottom">
                                <a href="#" class="tt-icon-btn">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                    <span class="tt-text">{{$com->likes}}</span>
                                </a>
                                <div class="col-separator"></div>
                                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="tt-wrapper-inner">
            <h4 class="tt-title-separator"><span>You’ve reached the end of replies</span></h4>
        </div>

        @if (!Auth::check())
            <div class="tt-topic-list">
                <div class="tt-item tt-item-popup">
                    <div class="tt-col-avatar">
                        <svg class="tt-icon">
                        <use xlink:href="#icon-ava-l"></use>
                        </svg>
                    </div>
                    <div class="tt-col-message">
                        Seen something that interest you. Login to learn and contribute.
                    </div>
                    <div class="tt-col-btn">
                        <a href="{{route('forum.login')}}" class="btn btn-primary">Log in</a>
                        <button type="button" class="btn-icon">
                            <svg class="tt-icon">
                            <use xlink:href="#icon-cancel"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @else
        <div class="tt-wrapper-inner">
            <div class="pt-editor form-default">
                <h6 class="pt-title">Post Your Reply</h6>
                 <div class="pt-row">
                    <div class="col-left">
                        <ul class="pt-edit-btn">
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-quote"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-bold"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-italic"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-share_topic"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-blockquote"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-performatted"></use>
                                </svg>
                            </button></li>
                            <li class="hr"></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-upload_files"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-bullet_list"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-heading"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-horizontal_line"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-emoticon"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-settings"></use>
                                </svg>
                            </button></li>
                            <li><button type="button" class="btn-icon">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-color_picker"></use>
                                </svg>
                            </button></li>
                        </ul>
                    </div>
                    <div class="col-right tt-hidden-mobile">
                        <a href="#" class="btn btn-primary">Preview</a>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" rows="5" placeholder="Lets get started"></textarea>
                </div>
                <div class="pt-row">
                    <div class="col-auto">
                        <div class="checkbox-group">
                            <input type="checkbox" id="checkBox21" name="checkbox" checked="">
                            <label for="checkBox21">
                                <span class="check"></span>
                                <span class="box"></span>
                                <span class="tt-text">Subscribe to this topic.</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-secondary btn-width-lg">Reply</a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="tt-topic-list tt-ofset-30">
            <div class="tt-list-search">
                <div class="tt-title">Suggested Topics</div>
                <!-- tt-search -->
                <div class="tt-search">
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search for topics">
                            <button class="tt-search__btn" type="submit">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                             <button class="tt-search__close">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-cancel"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="tt-list-header tt-border-bottom">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Replies</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
            </div>
            @include('forum.views.datas.topic_list')
            

            <div class="tt-row-btn">
                <button type="button" class="btn-icon js-topiclist-showmore">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-load_lore_icon"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</main>
@endsection