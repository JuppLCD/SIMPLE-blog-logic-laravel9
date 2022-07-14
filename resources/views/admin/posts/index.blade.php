<x-layouts.admin>
    <x-slot name="title">
        Posts
    </x-slot>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create post</a>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive-xl mt-3">
        @if ($posts->count())
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Extract</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><a href="{{ route('admin.posts.show', $post) }}" class="text-info">{{$post->title}}</a></td>
                    <td>{!!$post->extract!!}</td>
                    <td>{{$post->status == '1' ? 'Blog draft': 'Finished blog'}}</td>
                    <td width="180">
                        <div class="d-flex">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning mx-2">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$posts->links()}}
        </div>

        @else
        <p>There are no blogs</p>
        @endif
    </div>
</x-layouts.admin>