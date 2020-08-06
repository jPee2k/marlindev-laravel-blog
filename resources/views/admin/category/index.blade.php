@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
              @include('admin.success')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                      <a href="{{ route('categories.edit', $category) }}" class="fa fa-pencil"></a>
                      <!-- <a href="{{ route('categories.destroy', $category) }}" data-confirm="Вы уверены?" data-method="delete" class="fa fa-remove" rel="nofollow"></a> -->
                      {{ Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category]]) }}
                        {{ Form::button('', ['class' => 'fa fa-remove', 'class' => 'delete', 'rel' => 'nofollow', 'type' => 'submit']) }}
                      {{ Form::close() }}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div>{{ $categories->links() }}</div>
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  @endsection