<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - {{$title ?? 'Laravel'}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{$links ?? ''}}
</head>

<body>
    <x-navegation />
    <div class="position-relative">
        <button class="btn btn-primary" id="btnOpenAsideMovil"><i class="fa-solid fa-caret-down fs-2"></i></button>
        <aside class="aside-admin border-end">
            <nav>
                <div class="d-flex border-bottom">

                    <button class="btn d-none" id="btnCloseAside"><i class="fa-solid fa-xmark fs-2 mx-2"></i></button>
                    <button class="btn" id="btnOpenAside"><i
                            class="fa-solid fa-circle-chevron-down fs-2 mx-2"></i></button>

                    <a href="{{ route('admin.home') }}" class="text-reset text-decoration-none ms-2">
                        <h3 class="my-3">Blog<b>Admin</h3></b>
                    </a>
                </div>
                <x-layouts.admin-navegation />
            </nav>
        </aside>
        <main class="main-admin">
            <div class="container-lg ">
                {{$slot}}
            </div>
        </main>
    </div>

    {{$scripts ?? ''}}
    <script>
        const btnOpenAside = document.getElementById('btnOpenAside');
                const btnCloseAside = document.getElementById('btnCloseAside');
                const btnOpenAsideMovil = document.getElementById('btnOpenAsideMovil');
    
                const asideAdmin = document.querySelector('.aside-admin');
                const mainAdmin = document.querySelector('.main-admin');
    
                const descriptionLinks = Array.from(document.querySelectorAll('.aside-admin a.text-reset.text-decoration-none.d-block.p-2 span'));
    
                btnOpenAside.addEventListener('click', ()=>{
                    btnOpenAside.classList.add('d-none');
                    btnCloseAside.classList.remove('d-none');
    
                    asideAdmin.classList.add('openAside');
                    mainAdmin.classList.add('openAside');
    
                    descriptionLinks.forEach(span => {
                        span.classList.remove('d-none')
                    });
                });
    
                btnOpenAsideMovil.addEventListener('click', ()=>{
                    btnOpenAside.classList.add('d-none');
                    btnOpenAsideMovil.classList.add('d-none');
                    btnCloseAside.classList.remove('d-none');
    
                    asideAdmin.classList.add('openAside');
                    mainAdmin.classList.add('openAside');
    
                    descriptionLinks.forEach(span => {
                        span.classList.remove('d-none')
                    });
                });
    
                btnCloseAside.addEventListener('click', ()=>{
                    btnOpenAside.classList.remove('d-none');
                    btnOpenAsideMovil.classList.remove('d-none');
                    btnCloseAside.classList.add('d-none');
    
                    asideAdmin.classList.remove('openAside');
                    mainAdmin.classList.remove('openAside');
    
                    descriptionLinks.forEach(span => {
                        span.classList.add('d-none')
                    });
                });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>