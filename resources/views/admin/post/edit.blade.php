@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @include('admin.errors')
                </div>
                {{ Form::model($post, ['method' => 'PATCH', 'url' => route('posts.update', $post), 'files' => true]) }}
                <div class="box-body">
                    @include('admin.post.inc.form')
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Назад</a>
                    {{ Form::submit('Изменить', ['class' => 'btn btn-success pull-right', 'data-disable-with' => 'Сохраняем']) }}
                </div>
                {{ Form::close() }}
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
