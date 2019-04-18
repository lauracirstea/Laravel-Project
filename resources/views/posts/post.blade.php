
<div class="card text-center" style="margin-bottom: 20px;">
    <div class="card-header">
        <h3>
            <a href="/posts/{{$post->id}}">
                {{ $post->title }}
            </a>
        </h3>
        <p class="blog-post-meta">
            {{$post->user->name}} on
            {{$post->created_at->toFormattedDateString()}}
        </p>

    </div>
    <div class="card-body">
        <h5 class="card-text">{{$post->body}}</h5>
    </div>
</div>
