@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent">
    <div class="tt-custom-mobile-indent container">
        <div class="tt-categories-title">
            <div class="tt-title">Categories</div>
            <div class="tt-search">
                <form class="search-wrapper">
                    <div class="search-form">
                        <input type="text" class="tt-search__input" placeholder="Search Categories">
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
        <div class="tt-categories-list">
            <div class="row">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4">
                            <div class="tt-item">
                                <div class="tt-item-header">
                                    <ul class="tt-list-badge">
                                        <li><a href="#"><span class="tt-color{{$category->color}} tt-badge">{{$category->name}}</span></a></li>
                                    </ul>
                                    <h6 class="tt-title"><a href="page-categories-single.html">Threads - {{$category->topic_count}}</a></h6>
                                </div>
                                <div class="tt-item-layout">
                                <div class="innerwrapper">
                                    {{$category->description}}
                                </div>
                                <a href="#" class="tt-btn-icon">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h5>No Category</h5>
                    </div>
                @endif


      
            
              
                
                
                <div class="col-12">
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
</main>
@endsection