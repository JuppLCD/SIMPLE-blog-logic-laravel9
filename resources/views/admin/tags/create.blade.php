<x-layouts.admin>
    <x-slot name='title'>
        Create Tag
    </x-slot>
    <form action="{{route('admin.tags.store')}}" method="POST">
        @csrf

        @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name Tag:</label>
            <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name"
                aria-describedby="nameTag">
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug Tag:</label>
            <input value="{{old('slug')}}" type="text" class="form-control" id="slug" name="slug"
                aria-describedby="slugTag" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <x-slot name="scripts">
        <script>
            const inputName = document.getElementById('name');
                    const inputSlug = document.getElementById('slug');
        
                    function slugify(text) {
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
        </script>
    </x-slot>
</x-layouts.admin>