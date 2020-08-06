@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить категорию
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем категорию</h3>
          @include('admin.errors')
        </div>
        {{ Form::model($category, ['url' => route('categories.store')]) }}
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('exampleInputEmail1', 'Название') }}
              {{ Form::text('exampleInputEmail1', '', ['class' => 'form-control', 'placeholder' => 'type category name', 'name' => 'title']) }}
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ Form::submit('Назад', ['class' => 'btn btn-default']) }}
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