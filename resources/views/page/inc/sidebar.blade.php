<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        @if (!Auth::user())
            <aside class="widget news-letter">
                <h3 class="widget-title text-uppercase text-center">Быть в курсе событий</h3>
                {{ Form::open(['method' => 'POST', 'url' => route('user.subscribe')]) }}
                {{ Form::email('email', null, ['placeholder' => 'Ваш адрес эл. почты']) }}
                {{ Form::submit('Подписаться', ['class' => 'text-uppercase text-center btn btn-subscribe']) }}
                {{ Form::close() }}
            </aside>
        @endif
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Популярные посты</h3>

            @foreach ($popularPosts as $post)
                <div class="popular-post">
                    <a href="{{ route('post.show', $post->slug) }}" class="popular-img">
                        <img src="{{ $post->getImage() }}" alt="">
                        <div class="p-overlay"></div>
                    </a>
                    <div class="p-content">
                        <a href="{{ route('post.show', $post->slug) }}" class="text-uppercase">{{ $post->title }}
                        </a>
                        <span class="p-date">{{ PostHelper::getDate($post) }}</span>
                    </div>
                </div>
            @endforeach

        </aside>

        @if (url()->current() !== route('user.create') && url()->current() !== route('user.login-page') && url()->current() !== route('user.edit') && url()->current() !== route('user.show', $post->author))

            <aside class="widget">
                <h3 class="widget-title text-uppercase text-center">Рекомендуемые</h3>
                <div id="widget-feature" class="owl-carousel">

                    @foreach ($featuredPosts as $post)
                        <div class="item">
                            <div class="feature-content">
                                <img src="{{ $post->getImage() }}" alt="">
                                <a href="{{ route('post.show', $post->slug) }}" class="overlay-text text-center">
                                    <h5 class="text-uppercase">{{ $post->title }}</h5>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </aside>
            <aside class="widget pos-padding">
                <h3 class="widget-title text-uppercase text-center">Актуальное</h3>

                @foreach ($recentPosts as $post)
                    <div class="thumb-latest-posts">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ route('post.show', $post->slug) }}" class="popular-img">
                                    <img src="{{ $post->getImage() }}" alt="">
                                    <div class="p-overlay"></div>
                                </a>
                            </div>
                            <div class="p-content">
                                <a href="{{ route('post.show', $post->slug) }}" class="text-uppercase">
                                    {{ $post->title }}
                                </a>
                                <span class="p-date">{{ PostHelper::getDate($post) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </aside>
            <aside class="widget border pos-padding">
                <h3 class="widget-title text-uppercase text-center">Категории</h3>
                <ul>

                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('category.show', $category->slug) }}">
                                {{ $category->title }}
                            </a>
                            <span class="post-count pull-right">
                                ({{ $category->posts->where('status', 1)->count() }})
                            </span>
                        </li>
                    @endforeach

                </ul>
            </aside>

        @endif

    </div>
</div>
