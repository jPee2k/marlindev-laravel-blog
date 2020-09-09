@extends('layouts.blog')

@section('title', 'Личный кабинет - ' . htmlspecialchars($user->name))
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0">
                        <!--leave comment-->

                        @include('admin.errors')

                        <h3 class="text-uppercase">Мой профиль</h3>
                        <br>
                        <img src="{{ $user->getImage() }}" alt="" class="profile-image">
                        {{ Form::model($user, [
                                'method' => 'PATCH',
                                'url' => route('user.update'),
                                'files' => true,
                                'role' => 'form',
                                'class' => 'form-horizontal contact-form',
                                'novalidate',
                                'autocomplete' => 'off'
                            ]) }}

                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::email('email', $user->email, ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::text('slogan', $user->slogan, ['class' => 'form-control', 'placeholder' => 'Ваш слоган']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Пароль']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Подтвердите пароль']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                {{ Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile']) }}
                            </div>
                        </div>
                        {{ Form::button('Применить', [
                                'type' => 'submit',
                                'class' => 'btn send-btn col-md-offset-10',
                                'data-disable-with' => 'Сохраняем',
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
