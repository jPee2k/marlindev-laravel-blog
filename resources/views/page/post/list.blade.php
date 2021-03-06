@extends('layouts.blog')

@if (isset($category->title))
    @section('title', 'Поиск по категории - ' . htmlspecialchars($category->title))
    @else
    @section('title', 'Поиск по тегу - ' . htmlspecialchars($tag->title))
    @endif

    @section('content')
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($posts as $post)
                            <article class="post post-grid">
                                <div class="post-thumb">
                                    <a href="{{ route('post.show', $post->slug) }}">
                                        <img src="{{ $post->getImage() }}" alt="">
                                    </a>

                                    <a href="{{ route('post.show', $post->slug) }}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        @include('page.post.category')

                                        <h1 class="entry-title">
                                            <a href="{{ route('post.show', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h1>
                                    </header>
                                    <div class="entry-content">
                                        {!! Str::limit($post->description, 128) !!}

                                        <div class="social-share">
                                            <span class="social-share-title pull-left text-capitalize">
                                                By Rubel On
                                                {{ PostHelper::getDate($post) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach


                        {{ $posts->links() }}
                    </div>

                    @include('page.inc.sidebar')
                </div>
            </div>
        </div>
    @endsection
