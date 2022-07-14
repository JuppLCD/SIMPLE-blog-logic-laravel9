<x-layouts.admin>
    <x-slot name='title'>
        Edit Blog
    </x-slot>
    <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
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
            <label for="title" class="form-label">Title Blog:</label>
            <input value="{{old('title', $post->title)}}" type="text" class="form-control" id="title" name="title"
                aria-describedby="titleBlog">
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug Blog (Title):</label>
            <input value="{{old('slug', $post->slug)}}" type="text" class="form-control" id="slug" name="slug"
                aria-describedby="slugCategory" readonly>
        </div>

        <div class="mb-3">
            <label for="extract">Extract:</label>
            <textarea class="form-control" placeholder="Leave a extract here" name='extract'
                id="extract">{{old('extract', $post->extract)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="body">Body:</label>
            <textarea class="form-control" placeholder="Leave a body here" name='body'
                id="body">{{old('body', $post->body)}}</textarea>
        </div>

        <div class="mb-3">
            <h4>Status of yor blog</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{old('status'
                    ,$post->status
                )==='1' ? 'checked' : '' }}>
                <label class="form-check-label" for="status1">
                    Blog draft
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="2"
                    {{old('status',$post->status)==='2'
                ? 'checked' : '' }}>
                <label class="form-check-label" for="status2">
                    Finished blog
                </label>
            </div>
        </div>

        <div class="form-floating mb-5">
            <select class="form-select" id="category_id" aria-label="Floating label select example" name='category_id'>
                <option value="">Open this select menu</option>
                @foreach ($categories as $id => $categoryName)
                <option value="{{$id}}" {{old('category_id', $post->category_id) == $id ?
                    'selected': ''}}>{{$categoryName}}
                </option>
                @endforeach
            </select>
            <label for="category_id">Category of your blog</label>
        </div>

        <div class="mb-5">
            <h4 for="tags">Tags of your blog</h4>
            @foreach ($tags as $id => $tagName)
            <label class="me-3">
                <input type="checkbox" name="tags[]" value="{{$id}}" {{in_array($id, old('tags', $tagsInPost ))
                    ? 'checked' : '' }}>
                {{$tagName}}
            </label>
            @endforeach
        </div>

        <section class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="image" class="form-label">Image Blog:</label>
                    <input class="form-control" type="file" name="image" id="image" aria-describedby="imageBlog"
                        accept="image/*">
                </div>
            </div>
            <div class="col">
                @php
                $img = $post->image->url ??
                'https://blog.ida.cl/wp-content/uploads/sites/5/2020/04/tamano-redes-blog-655x470.png';

                if(!str_contains($img,'http')){
                $img = Storage::url($post->image->url);
                }
                @endphp
                <img src="{{old('image', $img)}}" id="imgElement" alt="{{$post->title}}" class="img-fluid">
            </div>
        </section>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#body' ) )
                .catch( error => {
                    console.error( error );
                } );
            ClassicEditor
                .create( document.querySelector( '#extract' ) )
                .catch( error => {
                    console.error( error );
                } );
            const inputName = document.getElementById('title');
            const inputSlug = document.getElementById('slug');

            // * Slug Title
            function slugify(text = '') {
                return text
                    .toString() // Cast to string (optional)
                    .normalize('NFKD') // The normalize() using NFKD method returns the Unicode Normalization Form of a given string.
                    .toLowerCase() // Convert the string to lowercase letters
                    .trim() // Remove whitespace from both sides of a string (optional)
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                    .replace(/\-\-+/g, '-'); // Replace multiple - with single -
                }

            inputName.addEventListener('input', (e)=>{
                let slug = slugify(e.target.value);
                inputSlug.value = slug;
            });

            // * File Input and img
            const inputFile = document.getElementById('image');
            const imgElement = document.getElementById('imgElement');

            inputFile.addEventListener('change', (e)=>{
                const file = e.target.files[0];

                const fr = new FileReader();
                fr.onload = (event) => {
                    imgElement.setAttribute('src', event.target.result)
                };
                fr.readAsDataURL(file);
            });
        </script>
    </x-slot>

</x-layouts.admin>