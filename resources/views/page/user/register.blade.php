@extends('layouts.blog')

@section('title', 'Registration')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0">
                        <!--leave comment-->

                        @include('admin.errors')

                        <h3 class="text">Регистрация</h3>
                        <br>

                        {{ Form::model($user, [
                                'method' => 'POST',
                                'url' => route('user.store'),
                                'class' => 'form-horizontal contact-form',
                                'role' => 'form',
                            ]) }}
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::text('name', $user->name, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Ваше имя',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::email('email', $user->email, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Адрес эл. почты',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Пароль',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password_confirmation', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Подтвердите пароль',
                                    ]) }}
                            </div>
                        </div>
                        {{ Form::button('Подтвердить', [
                                'type' => 'submit',
                                'class' => 'btn send-btn col-md-offset-10',
                                'data-disable-with' => 'Регистрация',
                            ]) }}
                        {{ Form::close() }}
                    </div>
                    <!--end leave comment-->
                </div>

                @include('page.inc.sidebar')
            </div>
        </div>
    </div>
@endsection
