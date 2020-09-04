@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить тег
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем тег</h3>
                </div>
                @include('admin.errors')
                {{ Form::model($tag, ['method' => 'PATCH', 'url' => route('tags.update', $tag)]) }}
                @include('admin.tag.inc.form')
                <div class="box-footer">
                    <a href="{{ route('tags.index') }}" class="btn btn-default">Назад</a>
                    {{ Form::submit('Изменить', ['class' => 'btn btn-success pull-right', 'data-disable-with' => 'Сохраняем']) }}
                    {{ Form::close() }}
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
