<x-guest-layout>
 <div class="mt-[60px] pt-6 pb-16">

<!-- Breadcrumb -->

<nav class="flex px-5 py-3 text-slate-700 border border-slate-200 bg-slate-50 dark:bg-slate-800 dark:border-slate-700 mb-6" aria-label="Breadcrumb">
  <ol class="list-none inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse list-none" style="padding: 0 !important;">
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
        <a href="{{route("artikel")}}" class="ms-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ms-2 dark:text-slate-400 dark:hover:text-white">Artikel</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center w-[180px] sm:w-[240px] md:w-full">
        <svg class="rtl:rotate-180 flex-none  w-3 h-3 mx-1 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="block ms-1 text-sm font-medium text-slate-500 md:ms-2 dark:text-slate-400 truncate">{{$article->title}}</span>
      </div>
    </li>
  </ol>
</nav>

<div class="max-w-3xl mx-auto">
<div class="px-4 space-y-4 mb-6">
 <p class="text-xs border border-blue-600 rounded-full py-1 px-3 w-max bg-blue-100 text-blue-800">{{ $article->category->name}}</p>
 <h1 class="text-3xl font-semibold">{{$article->title}}</h1>
 <p class="text-sm text-slate-700 dark:text-slate-400 leading-6 -mt-1">{{$article->summary}}</p>
 
                <div class="flex items-center gap-3">
                @if($article->user->photo)
                  <img class="w-10 h-10 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                  @else
                  <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
                  @endif
                  <div>
                     <h2 class="font-medium text-base">{{$article->user->name}}</h2>
                     
                     <p class="text-sm text-slate-700 dark:text-slate-400">{{$article->time_to_read}} • {{$article->created_at->diffForHumans()}}</p></p>
                  </div>
               </div>
</div>

<div class="mb-6">
@if(false)
<img src="{{asset("storage/", $article->thumbnail )}}" alt="{{$article->title}}" class="w-full bg-contain"/>
@else
<img src="{{asset("images/alivio.jpeg")}}" alt="{{$article->title}}" class="w-full bg-contain"/>
@endif
</div>

<div class="px-4 mb-8 text-sm leading-6 space-y-4 text-slate-800 dark:text-slate-300">
 {!! $article->content !!}
</div>

<div class="border-t border-slate-300 dark:border-slate-700 py-4 px-4 mb-2">
 <h2 class="text-xl font-medium mb-4">Topik Terkait</h2>
 <div class="flex flex-wrap gap-2"> 
 @foreach($article->tags as $tag)
 <a href="#" class="text-xs px-3.5 py-1.5 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-400 border border-slate-300 dark:border-slate-700 hover:bg-slate-300 dark:hover:bg-slate-700">{{$tag->name}}</a>
 @endforeach
 </div>
</div>

@if(count($articles) > 0)
<div class="border-t py-4 border-slate-300 dark:border-slate-700">
 <h2 class="text-xl font-medium mb-4 px-4">Baca Lainya</h2>
 <div class="grid grid-cols-1 md:grid-cols-2 gap-2 divide-y divide-slate-300 dark:divide-slate-700">
  @foreach($articles as $item)
  <div class="flex items-center gap-4 px-4">
   <div class="space-y-2 flex-1 py-6">
    <a href="{{route("articles.show", $item)}}" class="font-semibold text-lg text-blue-600 hover:underline">{{$item->title}}</a>
    <p class="text-sm text-slate-700 dark:text-slate-400">{{$item->created_at->diffForHumans()}} • {{$item->category->name}}</p>
   </div>
   
   @if(false)
   <div class="relative w-[120px]">
    <img src="{{asset("storage/", $article->thumbnail )}}" alt="{{$article->title}}" class="w-full h-full"/>
   </div>
   @else
   <div class="relative w-[120px]">
       <img src="{{asset("images/alivio.jpeg")}}" alt="{{$article->title}}" class="w-full h-full"/>
   </div>
   @endif
  </div>
  @endforeach
  </div>
 </div>
 
 
@endif
</div>
 </div>
 
 
 </div>
 
 @push("head")
 <style>
  ul,ol {
   padding: 0 1rem !important;
  }
 </style>
 @endpush
 
 </x-guest-layout>