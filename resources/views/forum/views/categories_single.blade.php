@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-catSingle-title">
            <div class="tt-innerwrapper tt-row">
                <div class="tt-col-left">
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-color{{$category->color}} tt-badge">{{$category->name}}</span></a></li>
                    </ul>
                </div>
                <div class="ml-left tt-col-right">
                    <div class="tt-col-item">
                        <h2 class="tt-value">Threads - {{$category->topic->count()}}</h2>
                    </div>
                    <div class="tt-col-item">
                        <div class="tt-search">
                            <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <form class="search-wrapper">
                                <div class="search-form">
                                    <input type="text" class="tt-search__input" placeholder="Search in {{$category->name}}">
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
                    </div>
                </div>
            </div>
            <div class="tt-innerwrapper">
                {{$category->description}}
            </div>
        </div>
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