<x-layouts.admin>
    <x-slot name="title">
        {{$post->title}}
    </x-slot>
    <div class="d-flex">
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary mx-2">Edit</a>
        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mx-2">Delete</button>
        </form>
    </div>
    <br>
    <section>
        <p>{{ $post->status == '1' ? 'Blog draft': 'Finished blog' }}</p>
        <hr>
        <h1>{{ $post->title }}</h1>
        <h4>{!! $post->extract !!}</h4>
        <hr>
        <p>{!! $post->body !!}</p>
        @php
        $img = $post->image->url ??
        'https://image.shutterstock.com/image-vector/vector-line-icon-img-260nw-2050481219.jpg';

        if(!str_contains($img,'http')){
        $img = Storage::url($post->image->url);
        }
        @endphp
        <div style="width: 200px;">
            <img src="{{$img}}" alt="{{ $post->title }}" class="img-fluid">
        </div>
    </section>


</x-layouts.admin>