@if (count($topics) > 0)
    @foreach ($topics as $topic)
    <div class="tt-item">
        <div class="tt-col-avatar">
            <svg class="tt-icon">
            <use xlink:href="#icon-ava-{{\Str::lower(\Str::substr($topic->user->name, 0,1))}}"></use>
            </svg>
        </div>
        <div class="tt-col-description">
            <h6 class="tt-title"><a href="{{route('forum.show', ['slug' => $topic->slug])}}">
                {{$topic->title}}
            </a></h6>
            <div class="row align-items-center no-gutters hide-desktope">
                <div class="col-11">
                    <ul class="tt-list-badge">
                        <li class="show-mobile"><a href="{{route('forum.categories.show', ['slug' => $topic->category->id])}}"><span class="tt-color05 tt-badge">{{$topic->category->name}}</span></a></li>
                        <li><a href="#"><span class="tt-badge">{{$topic->tag}}</span></a></li>
                    </ul>
                </div>
                <div class="col-1 ml-auto show-mobile">
                <div class="tt-value">1d</div>
                </div>
            </div>
        </div>
        <div class="tt-col-category">
            <a href="{{route('forum.categories.show', ['slug' => $topic->category->id])}}">
                <span class="tt-color{{$topic->category->color}} tt-badge">{{$topic->category->name}}</span>
            </a>
        </div>
        <div class="tt-col-value hide-mobile">{{$topic->likes}}</div>
        <div class="tt-col-value tt-color-select hide-mobile">{{$topic->title}}</div>
        <div class="tt-col-value hide-mobile">{{$topic->views}}</div>
        <div class="tt-col-value hide-mobile">{{$topic->date}}</div>
    </div>
    @endforeach
@endif