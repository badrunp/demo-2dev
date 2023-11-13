@props(["data" => []])

@if(count($data) > 0)
   <section class=" py-16 flex flex-col gap-12 max-w-4xl mx-auto">
      <div class="px-4 flex items-center flex-col gap-4">
         <h1 class="text-2xl font-semibold text-center">Hasil Proyek</h1>
         <p class="text-center text-sm leading-6 text-slate-700 dark:text-slate-400 max-w-lg">Ini adalah hasil proyek yang telah berhasil kami kerjakan untuk saat ini.</p>
      </div>
      <div>
         <div class="mb-4 border-b border-slate-200 dark:border-slate-700 sm:px-4">
            <ul class="hide-scroll flex flex-nowrap -mb-px text-sm font-medium text-center overflow-x-scroll list-none" style="padding: 0 !important" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
             @foreach($data as $key => $item)
               <li class="mr-2" role="presentation">
                  <button class="w-max inline-block p-4 border-b-2 rounded-t-lg " id="{{\Str::slug($key)}}-tab" data-tabs-target="#{{\Str::slug($key)}}" type="button" role="tab" aria-controls="{{\Str::slug($key)}}" aria-selected="false">{{$key}}</button>
               </li>
               @endforeach
            </ul>
         </div>
         <div id="default-tab-content" class="px-4">
             @foreach($data as $key => $item)
            <div class="hidden" id="{{\Str::slug($key)}}" role="tabpanel" aria-labelledby="{{\Str::slug($key)}}-tab">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 sm:gap-6">
              
              @foreach($item as $project)
              <div>
               @if($project->thumbnail && false)
                   <a href="#">
        <img
            class="rounded-t-lg"
            src="{{asset('storage/' . $project->thumbnail)}}"
            alt="{{$project->thumbnail}}"
        />
    </a>
               @else
               
    <a href="#">
        <img
            class="rounded-t-lg"
            src="{{asset('/images/alivio.jpeg')}}"
            alt="{{$project->name}}"
        />
    </a>
    @endif
    <div class="pb-2 pt-4">
        <a href="{{ route("projects.show", $project)}}">
            <h5
                class="mb-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-slate-100"
            >
                {{$project->name}}
            </h5>
        </a>
        <p class="mb-3 font-normal text-slate-700 dark:text-slate-400 text-sm leading-6">
            {{$project->summary}}
        </p>
        <div class="flex items-center gap-2">
          @if($project->demo_url)
            <a
                href="{{$project->demo_url}}"
                target="_blank"
                class="  text-slate-900 bg-slate-100 border border-slate-300 focus:outline-none hover:bg-slate-100 focus:ring-4 focus:ring-slate-200 font-medium rounded-full text-sm px-6 py-1.5 dark:bg-slate-700 dark:text-slate-100 dark:border-slate-800 dark:hover:bg-slate-700 dark:hover:border-slate-800 dark:focus:ring-slate-600 flex items-center gap-2"
            >
                <span>Kunjungi</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"
                    />
                </svg>
            </a>
            @endif
            <a
                href="{{ route("projects.show", $project) }}"
                class="w-max text-slate-100 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-full text-sm px-6 py-1.5 text-center flex items-center gap-2"
            >
                <span>Detail</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                    />
                </svg>
            </a>
        </div>
    </div>
</div>

              
              @endforeach
                      
               </div>
            </div>
            @endforeach
            </div>
                           @if(!Request()->routeIs("proyek"))
               <a href="{{route("proyek")}}" class="w-max mt-10 flex items-center gap-2 text-sm text-blue-600 text-center mx-auto">
            <span>Lihat semua proyek</span>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
  <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
</svg>

         </a>
         @endif
         </div>

      </div>

   </section>
   
   @endif