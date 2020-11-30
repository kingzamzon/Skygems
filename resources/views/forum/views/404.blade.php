@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-layout-404">
           <span class="tt-icon">
                <svg class="icon">
                  <use xlink:href="#icon-error_404"></use>
                </svg>
           </span>
           <h6 class="tt-title">ERROR 404</h6>
           <p>Sorry we can’t find what you are looking for, here’s some<br>
            <a href="#" class="tt-color-dark tt-underline-02">suggested topics</a> for you.</p>
        </div>
        <div class="tt-topic-list tt-offset-top-30">
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
        </div>
    </div>
</main>
@endsection