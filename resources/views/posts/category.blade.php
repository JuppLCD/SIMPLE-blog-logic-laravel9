<x-layouts.index>
    <x-slot name='title'>
        Category: {{$category->name}}
    </x-slot>
    <main class="container-lg">
        <h1 class="text-center mb-3">Category: {{$category->name}}</h1>
        <section>
            <div>
                @foreach ($posts as $post)
                <x-card-post :post="$post" />
                @endforeach
            </div>

            <div>
                {{$posts->links()}}
            </div>
        </section>
    </main>

</x-layouts.index>