@extends('layouts.blog')

@section('title', 'Registration')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0">
                        <!--leave comment-->

                        <h3 class="text-uppercase">Register</h3>
                        <br>

                        @include('admin.errors')

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
                                        'placeholder' => 'Name',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::email('email', $user->email, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Email',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Password',
                                    ]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::password('password_confirmation', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Password confirmation',
                                    ]) }}
                            </div>
                        </div>
                        {{ Form::submit('Подтвердить', [
                                'class' => 'btn send-btn',
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
