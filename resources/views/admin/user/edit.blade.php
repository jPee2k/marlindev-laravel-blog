@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактировать учетные данные
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем данные пользователя</h3>
                    @include('admin.errors')
                </div>
                {{ Form::model($user, ['method' => 'PATCH', 'url' => route('users.update', $user), 'files' => 'true', 'novalidate', 'autocomplete' => 'off']) }}
                <div class="box-body">
                    <div class="col-md-6">
                        @include('admin.user.inc.form')
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ Form::submit('Изменить', ['class' => 'btn btn-warning pull-right', 'data-disable-with' => 'Сохраняем']) }}
                </div>
                {{ Form::close() }}
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
