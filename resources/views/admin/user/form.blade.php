<div class="form-group">
    {{ Form::label('name', 'Имя') }}
    {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Ваше имя', 'name' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'E-mail') }}
    {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Электронный адрес Вашей почты', 'name' => 'email']) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'Пароль') }}
    {{ Form::password('password', ['class' => 'form-control', 'name' => 'password']) }}
</div>
<div class="form-group">
    {{ Form::label('passwordConfirm', 'Подтвердите пароль') }}
    {{ Form::password('passwordConfirm', ['class' => 'form-control', 'name' => 'password_confirmation']) }}
</div>
<div class="form-group">
    {{ Form::label('avatar', 'Аватар') }}
    {{ Form::file('avatar', ['name' => 'avatar']) }}

    <p class="help-block">Форматы изображения - jpg, bmp, png, gif, svg</p>
</div>
