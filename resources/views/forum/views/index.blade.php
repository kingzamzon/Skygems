@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent" class="tt-offset-small">
    <div class="container">
        <div class="tt-topic-list">
            <div class="tt-list-header">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Replies</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
            </div>
            {{-- <div class="tt-topic-alert tt-alert-default" role="alert">
              <a href="#" target="_blank">4 new posts</a> are added recently, click here to load them.
            </div> --}}
            <div class="tt-item tt-itemselect">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-ava-d"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="{{route('forum.show', ['slug' => 1])}}">
                        Web Hosting Packages for ThemeForest WordPress
                    </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-11">
                            <ul class="tt-list-badge">

                                <li class="show-mobile">
                                    <a href="{{route('forum.categories.show', ['slug' => 2])}}">
                                        <span class="tt-color03 tt-badge">exchange</span>
                                    </a>
                                </li>

                                <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                <li><a href="#"><span class="tt-badge">elements</span></a></li>
                            </ul>
                        </div>
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value">2h</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category">
                    <a href="{{route('forum.categories.show', ['slug' => 2])}}">
                        <span class="tt-color03 tt-badge">exchange</span>
                    </a>
                </div>
                <div class="tt-col-value  hide-mobile">401</div>
                <div class="tt-col-value tt-color-select  hide-mobile">975</div>
                <div class="tt-col-value  hide-mobile">12.6k</div>
                <div class="tt-col-value hide-mobile">2h</div>
            </div>

            @include('forum.views.datas.topic_list')                  

            @if (!Auth::check())
            <div class="tt-item tt-item-popup">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-ava-f"></use>
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
</main>
@endsection