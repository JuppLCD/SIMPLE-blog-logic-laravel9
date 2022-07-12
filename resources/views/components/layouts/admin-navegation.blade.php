<ul class="list-group list-group-flush">
    {{-- <li class="list-group-item p-0">
        <a href="#" class="text-reset text-decoration-none d-block p-2"><i class="fa-solid fa-user fs-4 mx-3"></i><span
                class="ms-4 d-none">Profile</span></a>
    </li> --}}

    @if (auth()->user()->role->name === 'Admin')
    <li class="list-group-item p-0">
        <a href="{{ route('admin.users.index') }}" class="text-reset text-decoration-none d-block p-2"><i
                class="fa-solid fa-address-card fs-4 mx-3"></i><span class="ms-4 d-none">Users</span></a>
    </li>
    @endif

    {{-- ALL USERS; Admin see all blogs, normal users see their own blogs --}}
    <li class="list-group-item accordion accordion-flush p-0" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button p-2 collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseBlog" aria-expanded="false" aria-controls="collapseBlog">
                    <i class="fa-solid fa-file-lines fs-4 mx-3"></i><span class="ms-4">Blogs</span>
                </button>
            </h2>
            <div id="collapseBlog" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <ul class="accordion-body p-0 text-center">
                    <li class="list-group-item p-0"><a href="{{ route('admin.posts.index') }}"
                            class="text-reset text-decoration-none d-block p-2">Blogs</a></li>
                    @if (auth()->user()->role->name === 'Admin')
                    <li class="list-group-item p-0"><a href="#" class="text-reset text-decoration-none d-block p-2">My
                            Blogs</a></li>
                    @endif
                    <li class="list-group-item p-0"><a href="{{ route('admin.posts.create') }}"
                            class="text-reset text-decoration-none d-block p-2">Crete
                            Blog</a></li>
                </ul>
            </div>
        </div>
    <li class="list-group-item p-0">
        <a href="{{ route('admin.categories.index') }}" class="text-reset text-decoration-none d-block p-2"><i
                class="fa-solid fa-hashtag fs-4 mx-3"></i><span class="ms-4 d-none">Categories</span></a>
    </li>
    <li class="list-group-item p-0">
        <a href="{{ route('admin.tags.index') }}" class="text-reset text-decoration-none d-block p-2"><i
                class="fa-solid fa-tags fs-4 mx-3"></i><span class="ms-4 d-none">Tags</span></a>
    </li>
</ul>