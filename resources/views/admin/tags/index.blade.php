<x-layouts.admin>
    <x-slot name="title">
        Tags
    </x-slot>
    @if (auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Moderator')
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create tags</a>
    @endif
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive-xl mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    @if (auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Moderator')
                    <th scope="col">Options</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    @if (auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Moderator')
                    <td width="180">
                        <div class="d-flex">
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning mx-2">Edit</a>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{$tags->links()}}
    </div>
</x-layouts.admin>