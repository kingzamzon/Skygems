@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent" class="tt-offset-small">
    <div class="tt-wrapper-section">
        <div class="container">
            <div class="tt-user-header">
                
                <div class="tt-col-title">
                    <div class="tt-title">
                        {{$query}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tt-tab-wrapper">
            <div class="tt-wrapper-inner">
                <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                    <li class="nav-item show">
                        <a class="nav-link active" data-toggle="tab" href="#tt-tab-01" role="tab"><span>Topic</span></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane tt-indent-none  show active" id="tt-tab-01" role="tabpanel">
                   <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Activity</div>
                        </div>
                        @if (count($topics) > 0)
                            @foreach ($topics as $topic)
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="{{route('forum.show', ['slug' => $topic->slug])}}">
                                        {{$topic->title}}
                                    </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                
                                                <li class="show-mobile">
                                                    <a href="{{route('forum.categories.show', ['slug' => $topic->category->id])}}">
                                                        <span class="tt-color03 tt-badge">{{$topic->category->name}}</span>
                                                    </a>
                                                </li>
                
                                                <li><a href="#"><span class="tt-badge">{{$topic->tag}}</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">{{$topic->date}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category">
                                    <a href="{{route('forum.categories.show', ['slug' => $topic->category->id])}}">
                                        <span class="tt-color03 tt-badge">{{$topic->category->name}}</span>
                                    </a>
                                </div>
                                <div class="tt-col-value  hide-mobile">{{$topic->likes}}</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">{{$topic->comment->count()}}</div>
                                <div class="tt-col-value  hide-mobile">{{$topic->views}}</div>
                                <div class="tt-col-value hide-mobile">{{$topic->date}}</div>
                            </div>
                            @endforeach
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
                <div class="tab-pane tt-indent-none" id="tt-tab-02" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Activity</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                  <use xlink:href="#icon-ava-d"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                               <h6 class="tt-title"><a href="#">
                                    Halloween Costume Contest 2018
                                </a></h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge">politics</span></a></li>
                                            <li><a href="#"><span class="tt-badge">contests</span></a></li>
                                            <li><a href="#"><span class="tt-badge">authors</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value">1h</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><span class="tt-color01 tt-badge">politics</span></div>
                            <div class="tt-col-value hide-mobile">985</div>
                            <div class="tt-col-value tt-color-select  hide-mobile">502</div>
                            <div class="tt-col-value hide-mobile">15.1k</div>
                            <div class="tt-col-value hide-mobile">1h</div>
                        </div>

                       
                        <div class="tt-row-btn">
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                  <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tt-indent-none" id="tt-tab-03" role="tabpanel">
                     <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value">Activity</div>
                        </div>

                        <div class="tt-item">
                            <div class="tt-col-avatar">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-ava-d"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                    Does Envato act against the authors of Envato markets?
                                </a></h6>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-9">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 ml-auto show-mobile">
                                        <div class="tt-value">5 Jan,19</div>
                                    </div>
                                </div>
                                <div class="tt-content">
                                    I really liked new badge - T-shirt. Will there be new contests with new badges for AudioJungle?
                                </div>
                            </div>
                            <div class="tt-col-category"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></div>
                            <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                        </div>
                        
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