@extends('website.layout')
@section('content')
<main class="news-page">
    <div class="news-title-background"></div>
    <div class="container">
        <div class="row">
            <div class="news-title">
                <a href="#" class="tittle"> <i></i> {{strtoupper($section->title)}}</a>
                <img src="{{ image($section->icon) }}" alt="">
                <div class="paginationn paginationtop">
                    {{ $posts->links("website.components.pagination") }} <span style="margin-left:5px" >  {{$section->title}}</span>
                </div>
            </div>
        </div>
    </div>
    <section class="home-latest-news-section news-page newspage-news">
        <div class="container">
            <div class="conchild">
                <div class="content">
                    @foreach($posts as $post)
                    <a href="{{ $post->getFullSlug() }}">
                        <div class="child">
                            <span>{{getDates($post->date)}}</span>
                            @if($post->thumb == false)
                                <img src="/website/img/newscoverimg.png" alt="">
                            @else
                                <img src="{{ image($post->thumb) }}" alt="">
                            @endif
                            <div class="text">
                                <h2>{{strip_tags($post->title)}}</h2>
                                <p>
                                    {{strip_tags($post->desc)}}
                                </p>
                                <div class="grey-line"></div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="paginationn paginationbottom">
                    {{ $posts->links("website.components.pagination") }}
            </div>
        </div>
    </section>
</main>
@endsection
