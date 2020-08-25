<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('exampleInputEmail1', 'Название') }}
            {{ Form::text('exampleInputEmail1', $category->title, ['class' => 'form-control', 'placeholder' => 'Название категории', 'name' => 'title']) }}
        </div>
    </div>
</div>
