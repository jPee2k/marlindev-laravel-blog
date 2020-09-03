@extends('layouts.blog')

@section('title', 'login')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0">
                        <!--leave comment-->

                        @include('admin.errors')

                        <h3 class="text">Вход</h3>
                        <br>

                        {{ Form::open([
                                'method' => 'POST',
                                'url' => route('user.login'),
                                'class' => 'form-horizontal contact-form',
                                'role' => 'form',
                            ]) }}

                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::email('email', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Адрес эл. почты'
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Пароль'
                                    ]) }}
                            </div>
                        </div>
                        {{ Form::button('Войти', [
                                'type' => 'submit',
                                'class' => 'btn send-btn col-md-offset-10',
                                'data-disable-with' => 'Входим',
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
