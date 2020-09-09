@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем категорию</h3>
                </div>
                @include('admin.errors')
                {{ Form::model($category, ['method' => 'PATCH', 'url' => route('categories.update', $category), 'novalidate', 'autocomplete' => 'off']) }}
                @include('admin.category.inc.form')
                <div class="box-footer">
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Назад</a>
                    {{ Form::submit('Изменить', ['class' => 'btn btn-success pull-right', 'data-disable-with' => 'Сохраняем']) }}
                    {{ Form::close() }}
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
