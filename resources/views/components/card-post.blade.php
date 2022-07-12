@props(['post'])

<div class="card mb-3">
    <img src="{{$post->image->url ?? 'https://blog.ida.cl/wp-content/uploads/sites/5/2020/04/tamano-redes-blog-655x470.png'}}"
        alt="{{$post->title}}" class="card-img-top"
        style="height: 200px; background-size: cover; background-position: center">
    <div class="card-body">
        <h3 class="card-title"><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h3>
        <p class="card-text">{!!$post->extract!!}</p>
        <p class="card-text">
            @foreach ($post->tags as $tag)
            <a href="{{route('posts.byTag', $tag)}}" class="badge text-decoration-none rounded-pill px-2 fs-6"
                style="color:#000; background-color: rgb({{rand(70,255)}}, {{rand(70,255)}}, {{rand(70,255)}})">
                <small class="text-muted">{{$tag->name}}</small>
            </a>
            @endforeach
        </p>
    </div>
</div>