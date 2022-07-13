<x-layouts.index>
    <x-slot name='title'>
        {{$post->title}}
    </x-slot>

    <main class="container-lg my-2">
        <p class="text-muted text-end">{{ $post->status == '1' ? 'Blog draft': 'Finished blog' }} |
            <b>{{$post->category->name}}</b>
        </p>
        <h1>{{$post->title}}</h1>
        <h4>{!! $post->extract !!}</h4>

        <section class="row mt-5">
            <main class="col-12 col-lg-8">
                <figure class="figure w-100">
                    @php
                    $imgSRC = $post->image->url ??
                    'https://blog.ida.cl/wp-content/uploads/sites/5/2020/04/tamano-redes-blog-655x470.png';

                    if(!str_contains($imgSRC,'http')){
                    $imgSRC = Storage::url($post->image->url);
                    }
                    @endphp
                    <img src="{{ $imgSRC }}" alt="{{$post->title}}" class="figure-img img-fluid rounded w-100"
                        style="height: 200px;background-size:cover; background-position: center;">
                </figure>
                <p>{!! $post->body !!}</p>
            </main>

            @if (count($similares) > 0)
            <aside class="col-12 col-lg-4">
                <h3>Blog similares</h3>
                <div class="mt-2">
                    <ul>
                        @foreach ($similares as $similar)
                        <li class="card mb-3 mx-auto" style="max-width: 700px">
                            @php
                            $imgSRC = $similar->image->url ??
                            'https://blog.ida.cl/wp-content/uploads/sites/5/2020/04/tamano-redes-blog-655x470.png';

                            if(!str_contains($imgSRC,'http')){
                            $imgSRC = Storage::url($similar->image->url);
                            }
                            @endphp

                            <a href="{{route('posts.show', $similar)}}" class="row g-0">
                                <div class="col-4">
                                    <img src="{{$imgSRC}}" alt="{{$similar->title}}" class="img-fluid rounded-start">
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="card-body text-center p-2">
                                        <h5 class="card-title">{{$similar->title}}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            @endif
        </section>
    </main>
</x-layouts.index>