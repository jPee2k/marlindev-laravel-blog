@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Результаты поиска
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
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Найдено в</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td><a href="{{ route('posts.edit', $post) }}">{{ $post->title }}</a></td>
                                        <td><a href="{{ route('posts.index') }}">Публикации</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a href="{{ route('categories.edit', $category) }}">{{ $category->title }}</a></td>
                                        <td><a href="{{ route('categories.index') }}">Категории</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('users.edit', $user) }}">{{ $user->name }}</a></td>
                                        <td><a href="{{ route('users.index') }}">Пользователи</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
