<x-layouts.admin>
    <x-slot name='title'>
        Edit User
    </x-slot>
    <form action="{{route('admin.users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')

        @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @endif

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">UserName:</label>
            <input value="{{old('name', $user->name)}}" type="text" class="form-control" id="name" name="name"
                aria-describedby="UserName">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Email:</label>
            <input value="{{old('email', $user->email)}}" type="text" class="form-control" id="email" name="email"
                aria-describedby="UserEmail">
        </div>

        <div class="mb-5">
            <h4 for="tags">User role</h4>
            @foreach ($roles as $id => $roleName)
            <label class="me-3">
                <input type="radio" name="role" value="{{$id}}" {{ old('role', $user->role->id ) == $id ? 'checked'
                : '' }}>
                {{$roleName}}
            </label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <x-slot name="scripts">
    </x-slot>
</x-layouts.admin>