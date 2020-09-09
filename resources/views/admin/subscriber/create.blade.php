@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить подписчика
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем подписчика</h3>

                    @include('admin.errors')
                </div>
                {{ Form::model($sub, ['method' => 'post', 'url' => route('subscribers.store'), 'novalidate', 'autocomplete' => 'off']) }}
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email') }}
                            {{ Form::email('email', $sub->email, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('subscribers.index') }}" class="btn btn-default">Назад</a>
                    {{ Form::button('Добавить', ['type' => 'submit', 'class' => 'btn btn-success pull-right']) }}
                </div>
                {{ Form::close() }}
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
