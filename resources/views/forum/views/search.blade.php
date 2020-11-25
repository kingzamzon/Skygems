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
            </div>
        </div>
    </div>
</main>
@endsection