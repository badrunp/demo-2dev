<x-app-layout>

<div>

<!-- Breadcrumb -->

<nav class="flex mb-8" aria-label="Breadcrumb">
  <ol class="list-none inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="{{ route("dashboard")}}" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-blue-600 dark:text-slate-400 dark:hover:text-white">
        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Dashboard
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("articles.index")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Daftar Artikel</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("articles.create")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Tambah</a>
      </div>
    </li>
  </ol>
</nav>

<div class="mb-8">
<h1 class="mb-2 text-2xl font-medium">Tambah Daftar Artikel</h1>
</div>

    <form class="mb-8" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
        

        
        <div class="mb-4">
            <x-input-label for="title" :value="__('Judul')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
       
       
                <div class="mb-4">
        
<label class="block mb-2 text-sm font-medium text-slate-900 dark:text-white" for="photo">Pilih Thumbnail</label>
<input class="block w-full text-sm text-slate-900 border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm dark:placeholder-slate-400" aria-describedby="file_input_help" id="thumbnail" type="file" name="thumbnail">
            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
        </div>
              <div class="mb-4">
         <x-input-label class="mb-1" for="category_id" :value="__('Kategori')" />
         <select id="category_id" name="category_id" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("category_id") ? "selected" : ""}}>Pilih Kategori</option>
         @foreach($categories as $category)
         <option {{ old("category_id") == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
         @endforeach
         </select>
         <x-input-error :messages="$errors->get('category_id')" />
      </div>
                    <div class="mb-4">
         <x-input-label class="mb-1" for="tags_id" :value="__('Tags(Opsional)')" />
         <select id="tags_id" name="tags_id[]" multiple="multiple" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         @foreach($tags as $tag)
         <option value="{{$tag->id}}">{{$tag->name}}</option>
         @endforeach
         </select>
         <x-input-error :messages="$errors->get('tags_id')" />
      </div>
                      
              <div class="mb-4">
         <x-input-label class="mb-1" for="status" :value="__('Status Artikel')" />
         <select id="status" name="status" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("status") ? "selected" : ""}}>Pilih Status</option>
         <option {{ old("status") == "true" ? "selected" : ""}} value="true">Published</option>
          <option {{ old("status") == "false" ? "selected" : ""}} value="false">Unpublished</option>
         </select>
         <x-input-error :messages="$errors->get('status')" />
      </div>
       <div class="mb-4">
        
                   <x-input-label for="summary" :value="__('Summary')" class="mb-2" />
<textarea id="summary" rows="4" name="summary" class="block p-2.5 w-full text-sm text-slate-900 border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm" placeholder="Tulis summary disini...">{{old("summary")}}</textarea>
            <x-input-error :messages="$errors->get('summary')" class="mt-2" />
       </div>
       
       <div class="mb-4">
                           <x-input-label for="content" :value="__('Konten')" class="mb-2" />
<textarea id="content" name="content">
 {{old("content")}}
</textarea>
         <x-input-error :messages="$errors->get('content')" />
       </div>


        
        <div class="flex items-center gap-2">
        <a href="{{route("articles.index")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
</svg>
<span>Kembali</span></a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
<span>Simpan</span></button>

        </div>
      </form>
      
      @push("head")
      <script src="https://cdn.tiny.cloud/1/rcgt62i5cc98uggo6wa96z7tm8g3kc9185jnnacta4fpycmz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
      @endpush
@push("script")

<script>
  tinymce.init({
    selector: '#content',
    plugins: [
      'advlist', 'autolink', 'link', 'lists', 'charmap', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'template',
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
    
  });
</script>
<script>
 
 $(document).ready(function(){
  $("#category_id").select2()
    $("#tags_id").select2()
 })
</script>
@endpush
</x-app-layout>
