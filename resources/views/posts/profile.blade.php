<x-layouts.index>
    <x-slot name='title'>
        Profile: {{auth()->user()->name}}
    </x-slot>
    <main class="container-lg">
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create post</a>
            <form action="{{ route('admin.users.deleteMyAccount') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete My Account</button>
            </form>
        </div>
        <h1 class="mb-2">Welcome {{auth()->user()->name}}</h1>
        <section>
            <h2 class="text-center mb-3">My Posts</h2>
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