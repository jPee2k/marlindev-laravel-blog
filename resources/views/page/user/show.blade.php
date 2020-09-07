@extends('layouts.blog')

@section('title', htmlspecialchars($user->name))
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post">
                        <div class="post-thumb">
                            <div class="text-center user-show-text">
                                <span>Пользователь </span>
                                <h4 class="entry-title text-uppercase">{{ $user->name }}</h4>
                                <span>зарегистрирован c {{ $date }}</span>
                            </div>

                            <img src="{{ $user->getImage() }}" alt="" class="profile-image">
                        </div>

                        <div class="post-content user-show-content">
                            <ul>
                                <li>Адрес эл. почты: {{ $user->email }}</li>
                                <li>Количество постов: {{ $user->posts()->count() }}</li>
                                <li>Количество комментариев: {{ $user->comments()->count() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                @include('page.inc.sidebar')

            </div>
        </div>
    </div>
@endsection
