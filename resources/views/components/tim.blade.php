@props(["data" => []])
      @if(count($data) > 0)
   <section class="{{ Request()->routeIs('tentang-kami') ? '' : 'bg-blue-700'}} ">
      <div class="px-4 py-16 flex flex-col gap-12 max-w-4xl mx-auto">
      <div class="px-4 flex items-center flex-col gap-4">
         <h1 class=" text-2xl font-semibold text-center {{ Request()->routeIs('tentang-kami') ? '' : 'text-slate-100' }}">Tim Kami</h1>
         <p class="max-w-lg text-center text-sm {{ Request()->routeIs('tentang-kami') ? 'text-slate-700 dark:text-slate-400' : 'text-slate-200' }}">Dengan kondisi tim yang muda siap berkarya dan berpengalaman, kami siap sedia untuk membangun negeri menjadi lebih baik dan go-digital. Menyasar sektor bidang pasar secara menyeluruh.</p>
      </div>

      <div class="flex items-start justify-center flex-wrap gap-6">
       @foreach($data as $team)
         <div class="flex flex-col gap-4 items-center justify-center">
          @if($team->user->photo)
            <img class="w-[80px] h-[80px] rounded-full" src="{{asset("/images/dendi.png")}}" alt="Rounded avatar">
            @else
             <div class="relative w-20 h-20 overflow-hidden bg-gray-100 rounded-full">
    <svg class="absolute w-full h-full text-gray-400 -bottom-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
            @endif
            <div class="flex flex-col text-center">
               <h5 class="text-sm font-medium  {{ Request()->routeIs('tentang-kami') ? '' : 'text-slate-100' }}">{{$team->user->name}}</h5>
               @if($team->user->jabatan)
               <p class="text-xs  {{ Request()->routeIs('tentang-kami') ? 'text-slate-700 dark:text-slate-400' : 'text-slate-200' }}">{{$team->user->jabatan}}</p>
               @endif
            </div>
            <div class="flex items-center gap-2">
             @if($team->user->email)
               <a href="mailto:{{$team->user->email}}" target="_blank">
               <img src="{{asset('/images/social/email.png')}}" alt="" class="w-6 h-6" />
               </a>
               @endif
               @if($team->user->github_url)
               <a href="{{$team->user->guthub_url}}">
               <img src="{{asset('/images/social/github.png')}}" alt="" class="w-6 h-6" />
               </a>
               @endif
                @if($team->user->linkedin_url)
               <a href="{{$team->user->linkedin_url}}" target="_blank">
               <img src="{{asset('/images/social/linkedin.png')}}" alt="" class="w-6 h-6" />
               </a>
               @endif
            </div>
         </div>
         @endforeach
      </div>
    
   </section>
     @endif