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
        <a href="{{ route("testimonis.index")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Testimoni</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("testimonis.edit",  $testimoni)}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Edit</a>
      </div>
    </li>
  </ol>
</nav>

<div class="mb-8">
<h1 class="mb-2 text-2xl font-medium">Edit Testimoni {{$testimoni->name}}</h1>
</div>

    <form class="mb-8" method="POST" action="{{ route('testimonis.update', $testimoni) }}" enctype="multipart/form-data">
        @csrf
                 @method('patch')

        
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $testimoni->name)" autofocus/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
                <div class="mb-4">
            <x-input-label for="pekerjaan" :value="__('Pekerjaan(Opsional)')" />
            <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan', $testimoni->pekerjaan)" autofocus/>
            <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
        </div>
                        <div class="mb-4">
            <x-input-label for="alamat" :value="__('Alamat(Opsional)')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat', $testimoni->alamat)" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>
        
                <div class="mb-4">
        
<label class="block mb-2 text-sm font-medium text-slate-900 dark:text-white" for="photo">Pilih Gambar(Opsional)</label>
@if($testimoni->photo)
        <image src="{{asset("storage/" . $testimoni->photo)}}" alt="{{$testimoni->name}}" class="w-12 h-12 mb-2" />
        @endif
        </dd>
<input class="block w-full text-sm text-slate-900 border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm dark:placeholder-slate-400" aria-describedby="file_input_help" id="photo" type="file" name="photo">
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>
        
       <div class="mb-4">
                   <x-input-label for="message" :value="__('Message')" class="mb-2" />
<textarea id="message" rows="4" name="message" class="block p-2.5 w-full text-sm text-slate-900 border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm" placeholder="Tulis message disini...">{{old("message", $testimoni->message)}}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
       </div>
        
        <div class="flex items-center gap-2">
        <a href="{{route("testimonis.index")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
</svg>
<span>Kembali</span></a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
<span>Simpan</span></button>

        </div>
      </form>

</x-app-layout>
