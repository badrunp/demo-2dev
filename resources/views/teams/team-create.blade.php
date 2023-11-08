<x-app-layout>

<div>

<!-- Breadcrumb -->

<nav class="flex mb-8" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
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
        <a href="{{ route("teams.index")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Daftar Tim</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("teams.create")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Tambah</a>
      </div>
    </li>
  </ol>
</nav>

<div class="mb-8">
<h1 class="mb-2 text-2xl font-medium">Tambah Daftar Tim</h1>
</div>

    <form class="mb-8" method="POST" action="{{ route('teams.store') }}">
        @csrf
        
      <div class="mb-4">
         <x-input-label class="mb-1" for="status" :value="__('Status Tim')" />
         <select id="status" name="status" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("status") ? "selected" : ""}}>Pilih status tim</option>
         <option {{ old("status") == "active" ? "selected" : ""}} value="active">Aktif</option>
          <option {{ old("status") == "noactive" ? "selected" : ""}} value="noactive">Tidak Aktif</option>
         </select>
         <x-input-error :messages="$errors->get('status')" />
      </div>
        
        <div class="mb-4">
         <x-input-label class="mb-1" for="user_id" :value="__('Nama')" />
         <select id="user_id" name="user_id" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5" >
          @if(session()->has("user"))
          <option value="{{session()->get("user")->id}}" selected>{{session()->get("user")->name}}</option>
          @endif
         </select>
         <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
      </div>
       
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Terisi otomatis" readOnly/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
                  <div class="mb-4">
            <x-input-label for="jabatan" :value="__('Jabatan')" />
            <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" placeholder="Terisi otomatis" readOnly/>
            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
        </div>
        
                          <div class="mb-4">
            <x-input-label for="phone" :value="__('Nomor Hp')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="Terisi otomatis" readOnly/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        
                                  <div class="mb-4">
            <x-input-label for="created_at" :value="__('Bergabung Pada')" />
            <x-text-input id="created_at" class="block mt-1 w-full" type="text" name="created_at" placeholder="Terisi otomatis" readOnly/>
            <x-input-error :messages="$errors->get('created_at')" class="mt-2" />
        </div>
        
        <div class="flex items-center gap-2">
        <a href="{{route("teams.index")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
</svg>
<span>Kembali</span></a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
<span>Simpan</span></button>

        </div>
      </form>

@push("script")
<script>
 
       $(document).ready(function() {
          $('#user_id').select2({
           placeholder: "Pilih User",
           ajax: {
            url: "{{route("api.users.findAllAdmin")}}",
            dataType: 'json',
            delay: 250,
            processResults: function(data){
             return {
              results: data
             }
            }
           }
          }).on('select2:select', function (e) { 
            let id = e.params.data.id
            let url = "{{url("/api/users")}}/" + id
            $.ajax({
             url: url,
             type: "get",
             dataType: 'json',
             success: function(data){
             $("#email").val(data.email)
             $("#jabatan").val(data.jabatan ? data.jabatan : "-")
             $("#phone").val(data.phone ? data.phone : "-")
             $("#created_at").val(data.created_at)
             }
            })
            
          });
      });
</script>
@endpush
</x-app-layout>
