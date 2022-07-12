<x-layouts.index>
    <x-slot name='title'>
        {{$post->title}}
    </x-slot>
    <main class="container-lg">
        <p>{{ $post->status == '1' ? 'Blog draft': 'Finished blog' }}</p>
        <h1>{{$post->title}}</h1>
        <h3>{!! $post->extract !!}</h3>
        <p>{!! $post->body !!}</p>
        <img src="{{ $post->image->url }}" alt="{{$post->title}}">
    </main>
</x-layouts.index>