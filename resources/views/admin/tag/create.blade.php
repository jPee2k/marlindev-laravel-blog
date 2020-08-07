@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить тег
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем тег</h3>
          @include('admin.errors')
        </div>
        {{ Form::model($tag, ['url' => route('tags.store')]) }}
        @include('admin.tag.form')
        <div class="box-footer">
          <a href="{{ route('tags.index') }}" class="btn btn-default">Назад</a>
          {{ Form::submit('Добавить', ['class' => 'btn btn-success pull-right']) }}
        </div>
        {{ Form::close() }}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection