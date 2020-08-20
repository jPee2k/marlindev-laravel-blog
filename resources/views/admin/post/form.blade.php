<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('title', 'Название') }}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Название поста']) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Лицевая картинка') }}
        <!-- todo Выводить картинку при редактировании (admin.post.inc.image)-->
        <div class="posts-images-border">
            <img src="{{ $post->getImage() }}" alt="" width="100">
        </div>
        {{ Form::file('image') }}

        <p class="help-block">
            Форматы изображения: jpg, bmp, png, gif, svg<br>
            Максимальный размер изображения: 2 mb
        </p>
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Категория') }}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control select2']) }}
    </div>
    <div class="form-group">
        {{ Form::label('tags', 'Теги') }}
        {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите теги']) }}
    </div>
    <!-- Date -->
    <div class="form-group">
        {{ Form::label('date', 'Дата:') }}
        <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('date', $post->date, ['class' => 'form-control pull-right']) }}
        </div>
        <!-- /.input group -->
    </div>

    <!-- checkbox -->
    <div class="form-group">
        <label>
            {{ Form::checkbox('is_featured', $post->is_featured, false) }}
            <b>Рекомендовать</b>
        </label>
    </div>

    <!-- checkbox -->
    <div class="form-group">
        <label>
            {{ Form::checkbox('status', $post->status, false, ['checked']) }}
            <b id="status">Черновик</b>
        </label>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {{ Form::label('description', 'Описание публикации') }}
        {{ Form::textarea('description', $post->description, [
            'class' => 'form-control',
            'cols' => '30',
            'rows' => '10',
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('content', 'Полный текст') }}
        {{ Form::textarea('content', $post->content, [
            'class' => 'form-control',
            'cols' => '30',
            'rows' => '10',
        ]) }}
    </div>
</div>
