<x-app-layout>


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
        <a href="{{ route("teams.show", $team)}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Detail</a>
      </div>
    </li>

  </ol>
</nav>

<div class="mb-8">
<h1 class="text-2xl font-medium">Detail Tim {{$team->name}}</h1>
</div>


<dl class="mb-6 max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 text-sm mt-3 dark:text-gray-400">Nama</dt>
        <dd class="text-base font-semibold">{{$team->user->name}}</dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 text-sm mt-3 dark:text-gray-400">Email</dt>
        <dd class="text-base font-semibold">{{$team->user->email ? $team->user->email : "-"}}</dd>
    </div>
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 text-sm mt-3 dark:text-gray-400">Jabatan</dt>
        <dd class="text-base font-semibold">{{$team->jabatan ? $team->jabatan : "-"}}</dd>
    </div>
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 text-sm mt-3 dark:text-gray-400">Nomor HP</dt>
        <dd class="text-base font-semibold">{{$team->phone ? $team->phone : "-"}}</dd>
    </div>
         <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Status</dt>
        <dd class="text-base font-semibold">
         
                         @if($team->status == "active")
                 <span class="text-green-600">Aktif</span>
                @else
                 <span class="text-red-600">Tidak Aktif</span>
                @endif
        </dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-gray-500 text-sm mt-3 dark:text-gray-400">Dibuat Pada</dt>
        <dd class="text-base font-semibold">{{$team->created_at ? $team->created_at : "-"}}</dd>
    </div>
</dl>

        <a href="{{route("teams.index")}}" class="w-max focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
</svg>
<span>Kembali</span></a>


</x-app-layout>