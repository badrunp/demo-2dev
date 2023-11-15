<x-guest-layout>
 <div class="mt-[60px] pt-6 pb-16">

<!-- Breadcrumb -->

<nav class="flex px-5 py-3 text-slate-700 border border-slate-200 bg-slate-50 dark:bg-slate-800 dark:border-slate-700 mb-4" aria-label="Breadcrumb">
  <ol class="list-none inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse" style="padding: 0 !important;">
    <li class="inline-flex items-center">
      <a href="{{route("home")}}" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-blue-600 dark:text-slate-400 dark:hover:text-white">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Beranda
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-slate-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{route("proyek")}}" class="ms-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ms-2 dark:text-slate-400 dark:hover:text-white">Proyek</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center overflow-x-hidden w-[180px] sm:w-[240px] md:w-full">
        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="block ms-1 text-sm font-medium text-slate-500 md:ms-2 dark:text-slate-400 truncate">{{$project->name}}</span>
      </div>
    </li>
  </ol>
</nav>

<div class="max-w-3xl mx-auto pt-2">
<div class="px-4 space-y-4 mb-4">
 <h1 class="text-2xl font-medium text-center">{{$project->type->name}}</h1>
</div>

<div class="mb-6">
@if(false)
<img src="{{asset("storage/", $project->thumbnail )}}" alt="{{$article->title}}" class="w-full bg-contain"/>
@else
<img src="{{asset("images/alivio.jpeg")}}" alt="{{$project->title}}" class="w-full bg-contain"/>
@endif
</div>

<div class="px-4">
 <h4 class="text-sm text-slate-600 dark:text-slate-400 mb-2">Tools/Teknologi</h4>
 <div class="flex items-center flex-wrap mb-6 gap-1">
   @foreach($project->tools as $key => $tool)
 <p class="text-sm">{{$tool->name}}{{ $key != $project->tools->count() - 1 ? ", " : "" }} </p>
 @endforeach
 </div>
@if($project->demo_url)
    <a href="{{$project->demo_url}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center justify-center gap-2"><span>Lihat Website</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
</svg>
</a>
@endif

<div class="mt-16 space-y-2 mb-6">
<p class="text-blue-600 font-medium">{{$project->type->name}}</p>
<h1 class="text-3xl font-medium">{{$project->name}}</h1>
 <p class="text-sm leading-6 text-slate-700 dark:text-slate-400">{{$project->summary}}</p>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2 mb-6">
 <img src="{{asset("images/alivio.jpeg")}}" alt="{{$project->title}}" class="w-full bg-contain"/>
 <img src="{{asset("images/alivio.jpeg")}}" alt="{{$project->title}}" class="w-full bg-contain"/>
 <img src="{{asset("images/alivio.jpeg")}}" alt="{{$project->title}}" class="w-full bg-contain"/>
 <img src="{{asset("images/alivio.jpeg")}}" alt="{{$project->title}}" class="w-full bg-contain"/>
</div>

<div class="text-sm space-y-4 leading-6 text-slate-800 dark:text-slate-300">
 {!! $project->desc !!}
</div>
</div>

</div>
 
 
 </div>
  @push("head")
 <style>
  ul,ol {
   padding: 0 1.5rem !important;
  }
 </style>
 @endpush
 
 </x-guest-layout>