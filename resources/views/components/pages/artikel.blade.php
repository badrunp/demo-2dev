@props(["data" => []])
@if(count($data) > 0)
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto">
      <div class="flex items-center justify-between gap-4">
         <h1 class="text-2xl font-semibold">Artikel Terbaru</h1>
         @if(!Request()->routeIs("artikel"))
         <a href="{{route("artikel")}}" class="flex items-center gap-1 text-xs text-blue-600 focus:underline">
            <span>Lihat Semua</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
               <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
         </a>
         @endif
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 sm:gap-6">
       @foreach($data as $item)
                <div>
            <a href="{{ route("articles.show", $item)}}">
             @if(false)
                         <img class="rounded-t-lg" src="{{asset('storage/'. $item->thumbnail)}}" alt="{{$item->name}}" />
             @else
            <img class="rounded-t-lg" src="{{asset('/images/alivio.jpeg')}}" alt="{{$item->name}}" />
            
            @endif
            </a>
            <div class="pb-2 pt-4">
               <div class="flex items-center gap-4 mb-3">
                  <p class="text-xs text-slate-600 dark:text-slate-400">{{$item->created_at->diffForHumans()}}</p>
                  <p class="text-xs p-[2px] px-2 bg-slate-100 rounded-full text-slate-700 dark:text-slate-700">{{$item->category->name}}</p>
               </div>
               <a href="{{ route("articles.show", $item)}}">
                  <span class="block mb-2 text-xl font-bold tracking-tight hover:underline">
                  {{$item->title}}</span>
               </a>
               <p class="text-sm mb-3 font-normal text-slate-700 dark:text-slate-400">{{$item->summary}}</p>
               <div class="flex items-center gap-3">
                @if($item->user->photo)
                  <img class="w-10 h-10 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                  @else
                  <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
                  @endif
                  <div>
                     <h2 class="text-sm font-semibold">{{$item->user->name}}</h2>
                     <p class="text-sm text-slate-700 dark:text-slate-400">{{$item->user->jabatan ? $item->user->jabatan : "Admin"}}</p>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      
   </section>
   @endif