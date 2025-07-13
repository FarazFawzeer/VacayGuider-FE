<article class="post-card">
    <img src="{{ $post->image_post ? asset('storage/' . $post->image_post) : 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=280&fit=crop' }}"
        alt="Post Image" class="post-image">
    <div class="post-content">
        <h2 class="post-title">{{ $post->title }}</h2>
        <div class="post-meta">
            <span class="post-date">{{ $post->posted_time->diffForHumans() }}</span>
            <span class="post-likes">{{ $post->likes_count }}</span>
        </div>
        <p class="post-description">{{ $post->description }}</p>
        <div class="post-tags">
            @foreach ($post->hashtags as $tag)
                <span class="tag">{{ $tag }}</span>
            @endforeach
        </div>
        <div class="post-actions">
            <button class="action-btn share-btn">Share</button>
            <button class="action-btn view-btn">View Full</button>
        </div>
    </div>
</article>
