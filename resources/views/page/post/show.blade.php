@extends('layouts.blog')

@section('title', htmlspecialchars($post->title))

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @include('layouts.inc.status')

                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                @include('page.post.category')
                                <h1 class="entry-title">
                                    {{ $post->title }}
                                </h1>

                            </header>
                            <div class="entry-content">
                                <p>{!! $post->content !!}</p>
                            </div>
                            <div class="decoration">
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('tag.show', $tag->slug) }}" class="btn btn-default">
                                        {{ $tag->title }}
                                    </a>
                                @endforeach
                            </div>

                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">
                                    By {{ $post->author->name ?? 'Administration'}} On {{ PostHelper::getDate($post) }}
                                </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    
                    @include('page.inc.comment')
                </div>

                @include('page.inc.sidebar')
            </div>
        </div>
    </div>
@endsection
