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