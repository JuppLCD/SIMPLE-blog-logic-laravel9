<x-layouts.admin>
    <x-slot name="title">
        Categories
    </x-slot>
    @if (auth()->user()->role->name === 'Admin')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create category</a>
    @endif
    <div class="table-responsive-xl mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    @if (auth()->user()->role->name === 'Admin')
                    <th scope="col">Options</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    @if (auth()->user()->role->name === 'Admin')
                    <td width="180">
                        <div class="d-flex">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="btn btn-warning mx-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
        {{$categories->links()}}
    </div>
</x-layouts.admin>