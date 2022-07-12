<header class="sticky-top">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-lg">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @if ($categories->count())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{route('posts.byCategory', $category)}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                </ul>
                @auth
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle text-white" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.home') }}">DashBoard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('myAut.logout')}}">Log Out</a>
                        </li>
                    </ul>
                </div>
                @else
                <div class="float-end">
                    <a href="{{route('myAut.viewLogin')}}" class="btn btn-outline-primary">Log In</a>
                    <a href="{{route('myAut.viewRegister')}}" class="btn btn-primary">Sing Up</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</header>