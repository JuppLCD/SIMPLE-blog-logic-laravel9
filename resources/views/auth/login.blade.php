<x-layouts.index>
    <x-slot name='title'>
        LogIn
    </x-slot>
    <main class="container-lg">
        <form action="{{route('myAut.login')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com"
                    required {{-- ! Quitar luego --}} value="test@test.com">
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password"
                    required {{-- ! Quitar luego --}} value="test123456">
                <label for="inputPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</x-layouts.index>