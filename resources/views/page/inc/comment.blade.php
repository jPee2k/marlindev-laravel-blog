<div class="top-comment">
    <!--top comment-->
    <img src="/img/blog/comment.jpg" class="pull-left img-circle" alt="">
    <h4>Rubel Miah</h4>

    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
        invidunt ut labore et dolore magna aliquyam erat.</p>
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
        <h4>You might also like</h4>
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
            <div class="comment-img">
                <img class="img-circle" src="{{ $comment->author->getImage() }}" alt="" width="75">
            </div>

            <div class="comment-text">
                <h5>{{ $comment->author->name }}</h5>

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
