@if (isset($randomPost))
    <div class="col-md-4">
        <aside class="footer-widget">
            <h3 class="widget-title text-uppercase">Стоит прочесть</h3>

            <div class="custom-post">
                <div>
                    <a href="{{ route('post.show', $randomPost->slug) }}">
                        <img src="{{ $randomPost->getImage() }}" alt="">
                    </a>
                </div>
                <div>
                    <a href="{{ route('post.show', $randomPost->slug) }}" class="text-uppercase">
                        {{ $randomPost->title }}
                    </a>
                    <span class="p-date">{{ PostHelper::getDate($randomPost) }}</span>
                </div>
            </div>
        </aside>
    </div>
@endif
