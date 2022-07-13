<x-layouts.index>
    <x-slot name='title'>
        Home
    </x-slot>
    <main class="container-lg">
        <h1>BLOG en Laravel 9</h1>
        <section>
            <div class="row">
                @foreach ($posts as $post)
                <div class="p-1 col-12 {{ $loop->first ? 'col-sm-12 col-lg-8': 'col-sm-6 col-lg-4'}}">
                    @php
                    $imgSRC = $post->image->url ??
                    'https://blog.ida.cl/wp-content/uploads/sites/5/2020/04/tamano-redes-blog-655x470.png';

                    if(!str_contains($imgSRC,'http')){
                    $imgSRC = Storage::url($post->image->url);
                    }
                    @endphp
                    <div style="
                        background-image:url('{{$imgSRC}}');
                        height: 200px; background-size:cover; background-position: center; ">

                        <h3>
                            <a href="{{route('posts.show', $post)}}">{{$post->title}}</a>
                        </h3>

                        @foreach ($post->tags as $tag)
                        <a href="{{route('posts.byTag', $tag)}}"
                            class="badge text-decoration-none rounded-pill px-2 fs-6"
                            style="color:#000; background-color: rgb({{rand(70,255)}}, {{rand(70,255)}}, {{rand(70,255)}})">
                            <small class="text-muted">{{$tag->name}}</small>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <div>
                {{$posts->links()}}
            </div>
        </section>
    </main>
</x-layouts.index>