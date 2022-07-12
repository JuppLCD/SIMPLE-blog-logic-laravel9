<x-layouts.index>
    <x-slot name='title'>
        Register
    </x-slot>
    <main class="container-lg">
        <form action="{{route('myAut.register')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Your name" required>
                <label for="inputName">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com"
                    required>
                <label for="inputEmail">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password"
                    required>
                <label for="inputPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" id="inputPasswordConfirmation"
                    placeholder="Password" required>
                <label for="inputPasswordConfirmation">Password confirmation</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</x-layouts.index>