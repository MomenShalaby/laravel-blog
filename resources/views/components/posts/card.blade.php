<div class="card h-100">
    <a href="{{ route('posts.show', $post->id) }}">
        <img src="{{ $post->image }}" alt="card__image" class="card-img-top" style="object-fit: cover; height: 200px;">
    </a>
    <div class="card-body">
        <a href="{{ route('posts.show', $post->id) }}">
            <h5 class="card-title fw-bold"> {{ $post->title }}</h5>
        </a>

        <p class="card-text">{{ Str::limit($post->description, 25, '...') }}</p>
        by<span class="card-text fw-bold"> {{ $post->user->name }}</span>
        <p class="card-text"> Created {{ $post->created_at->diffForHumans() }}</p>
    </div>
</div>
