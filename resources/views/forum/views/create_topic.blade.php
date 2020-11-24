@extends('forum.layouts.app')

@section('content')
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                Create New Topic
            </h1>
            <form class="form-default form-create-topic">
                <div class="form-group">
                    <label for="inputTopicTitle">Topic Title</label>
                    <div class="tt-value-wrapper">
                        <input type="text" name="name" class="form-control" id="inputTopicTitle" placeholder="Subject of your topic">
                        <span class="tt-value-input">99</span>
                    </div>
                    <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
                </div>
                <div class="pt-editor">
                    <h6 class="pt-title">Topic Body</h6>
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
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="5" placeholder="Lets get started"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputTopicTitle">Category</label>
                                <select class="form-control">
                                    <option value="Select">Select</option>
                                    <option value="Value 01">Value 01</option>
                                    <option value="Value 02">Value 02</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="inputTopicTags">Tags</label>
                                <input type="text" name="name" class="form-control" id="inputTopicTags" placeholder="Use comma to separate tags">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-auto ml-md-auto">
                            <a href="#" class="btn btn-secondary btn-width-lg">Create Post</a>
                        </div>
                    </div>
                </div>
            </form>
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
            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-ava-n"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="#">
                        Does Envato act against the authors of Envato markets?
                    </a></h6>
                    <div class="row align-items-center no-gutters hide-desktope">
                        <div class="col-auto">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>
                            </ul>
                        </div>
                        <div class="col-auto ml-auto show-mobile">
                           <div class="tt-value">1d</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category"><span class="tt-color05 tt-badge">music</span></div>
                <div class="tt-col-value hide-mobile">358</div>
                <div class="tt-col-value tt-color-select hide-mobile">68</div>
                <div class="tt-col-value hide-mobile">8.3k</div>
                <div class="tt-col-value hide-mobile">1d</div>
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
</main>
@endsection