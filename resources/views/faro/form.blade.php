    <script src="https://cdn.tiny.cloud/1/aws4tj8xvv0v21y5rqa92ji4fbcmc2kfg9ti1iqnvkz7kgxd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
    <script>
        tinymce.init({
        selector: '#body'
        });
    </script>

    <label for="title" class="block">
        <span class="text-gray-700">Título</span>
        <input
            type="text"
            name="title"
            id="title"
            class="outline-none mt-3 p-1 mb-3 pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            value="{{ old('title') ?? $post->title }}"
    />
    @error('title')
        <div class="alert alert-danger text-red-500">{{ $message }}</div>
    @enderror

    <label 
        for="body" 
        class="block focus-visible:ring-2 focus-visible:ring-rose-500"    
    >
        <span class="text-gray-700">Cuerpo</span>
        <textarea
            class="outline-none mt-3 p-1 mb-3 pl-2 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="body"
            id="body"
            rows="20"
            required
        >{{ old('body') ?? $post->body }}</textarea>
    </label>

    <div class="outline-none mt-3 mb-3">
        
        <label 
            for="image" 
            class="block focus-visible:ring-2 focus-visible:ring-rose-500"
        >
            <span 
                class="bg-green-600 hover:bg-green-500 h-10 w-full flex items-center justify-center rounded-md text-white text-sm p-2 cursor-pointer w-full border-2"
            >
                Agregar imágenes
            </span>

            <input
                type="file"
                name="images[]"
                id="image"
                class="hidden"
                multiple
        />

    </div>

    <div>
        <label 
            for="category_id"
        > 
            Categorías
        </label>

            <select 
                class="border-2"
                name="category_id" 
                id="category_id"
                required
            >
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}"
                        {{ $category->id == $post->category_id ? 'selected' : ''}}
                    >   
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
    
    </div>

    <div 
        class="flex items-end justify-end w-full p-2"
    >
        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-500 text-sm text-white p-3 rounded-md h-auto w-34 uppercase"
        >
            Publicar
        </button>
    </div>