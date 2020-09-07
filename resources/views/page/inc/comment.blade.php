<div class="top-comment">
    <!--top comment-->
    <a href="{{ route('user.show', $post->author->id) }}" style="display: inline">
        <img src="{{ $post->author->getImage() }}" class="pull-left img-circle" alt="" height="100">
    </a>

    <h4>
        <a href="{{ route('user.show', $post->author->id) }}">
            {{ $post->author->name }}
        </a>
    </h4>

    <p>{{ $post->author->slogan }}</p>
</div>
<!--top comment end-->
<div class="row">
    <!--blog next previous-->
    <div class="col-md-6">
        @if ($post->hasPrevious())
            <div class="single-blog-box">
                <a href="{{ route('post.show', $post->getPrevious()->slug) }}">
                    <img src="{{ $post->getPrevious()->getImage() }}" alt="">

                    <div class="overlay">

                        <div class="promo-text">
                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                            <h5>{{ $post->getPrevious()->title }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        @if ($post->hasNext())
            <div class="single-blog-box">
                <a href="{{ route('post.show', $post->getNext()->slug) }}">
                    <img src="{{ $post->getNext()->getImage() }}" alt="">

                    <div class="overlay">

                        <div class="promo-text">
                            <p><i class=" pull-right fa fa-angle-right"></i></p>
                            <h5>{{ $post->getNext()->title }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>
<!--blog next previous end-->
<div class="related-post-carousel">
    <!--related post carousel-->
    <div class="related-heading">
        <h4>Вам также может понравиться</h4>
    </div>
    <div class="items">
        @foreach ($post->related() as $item)
            <div class="single-item">
                <a href="{{ route('post.show', $item->slug) }}">
                    <img src="{{ $item->getImage() }}" alt="">

                    <p>{{ $item->title }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
<!--related post carousel-->
@if (!$post->comments->isEmpty())
    @foreach ($post->getComments() as $comment)
        <div class="bottom-comment">
            <!--bottom comment-->
            <div class="comment-img page-comment" style="padding-bottom: 0px">
                <a href="{{ route('user.show', $post->author->id) }}">
                    <img class="img-circle" src="{{ $comment->author->getImage() }}" alt="" width="75">
                </a>
            </div>

            <div class="comment-text">
                <h5><a href="{{ route('user.show', $post->author->id) }}">{{ $comment->author->name }}</a></h5>

                <p class="comment-date">
                    {{ $comment->created_at->diffForHumans() }}
                </p>

                <p class="para">
                    {{ $comment->text }}
                </p>
            </div>
        </div>
    @endforeach
@endif
<!-- end bottom comment-->

@if (Auth::check())
    <div class="leave-comment">
        <!--leave comment-->
        <h4>Оставьте ответ</h4>

        {{ Form::open([
            'method' => 'POST',
            'url' => route('user.comment'),
            'class' => 'form-horizontal contact-form',
            'role' => 'form',
        ]) }}
        {{ Form::hidden('post_id', htmlspecialchars($post->id)) }}
        <div class="form-group">
            <div class="col-md-12">
                {{ Form::text('message', htmlspecialchars(old('text')), [
                    'class' => 'form-control',
                    'rows' => 6,
                    'placeholder' => 'Напишите свой комментарий',
                ]) }}
            </div>
        </div>
        {{ Form::button('Отправить', ['type' => 'submit', 'class' => 'btn send-btn']) }}
        {{ Form::close() }}
    </div>
@endif
<!--end leave comment-->
