<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('exampleInputEmail1', 'Название') }}
            {{ Form::text('exampleInputEmail1', $tag->title, ['class' => 'form-control', 'placeholder' => 'Название тега', 'name' => 'title']) }}
        </div>
    </div>
</div>