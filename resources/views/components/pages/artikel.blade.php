   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto">
      <div class="flex items-center justify-between gap-4">
         <h1 class="text-2xl font-semibold">Artikel Terbaru</h1>
         @if(!Request()->routeIs("artikel"))
         <a href="{{route("artikel")}}" class="flex items-center gap-1 text-xs text-slate-100 bg-blue-600 rounded-full px-2.5 py-1.5">
            <span>Lihat Semua</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
               <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
         </a>
         @endif
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <div class=" bg-white border border-slate-200 rounded-lg shadow dark:bg-slate-800 dark:border-slate-700">
            <a href="#">
            <img class="rounded-t-lg" src="{{asset('/images/alivio.jpeg')}}" alt="" />
            </a>
            <div class="p-5">
               <div class="flex items-center gap-4 mb-3">
                  <p class="text-xs text-slate-600 dark:text-slate-400">2 jam yang lalu</p>
                  <p class="text-xs p-[2px] px-2 bg-slate-100 rounded-full text-slate-700 dark:text-slate-700">Teknologi</p>
               </div>
               <a href="#">
                  <h5 class="mb-2 text-xl font-bold tracking-tight text-slate-900 dark:text-slate-100">Noteworthy technology acquisitions 2021</h5>
               </a>
               <p class="text-sm mb-3 font-normal text-slate-700 dark:text-slate-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
               <div class="flex items-center gap-3">
                  <img class="w-10 h-10 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                  <div>
                     <h2 class="text-sm font-semibold">Muhammad Badrun</h2>
                     <p class="text-sm text-slate-700 dark:text-slate-400">CO-Founder</p>
                  </div>
               </div>
            </div>
         </div>
                  <div class="bg-white border border-slate-200 rounded-lg shadow dark:bg-slate-800 dark:border-slate-700">
            <a href="#">
            <img class="rounded-t-lg" src="{{asset('/images/alivio.jpeg')}}" alt="" />
            </a>
            <div class="p-5">
               <div class="flex items-center gap-4 mb-3">
                  <p class="text-xs text-slate-600 dark:text-slate-400">2 jam yang lalu</p>
                  <p class="text-xs p-[2px] px-2 bg-slate-100 rounded-full text-slate-700 dark:text-slate-700">Teknologi</p>
               </div>
               <a href="#">
                  <h5 class="mb-2 text-xl font-bold tracking-tight text-slate-900 dark:text-slate-100">Noteworthy technology acquisitions 2021</h5>
               </a>
               <p class="text-sm mb-3 font-normal text-slate-700 dark:text-slate-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
               <div class="flex items-center gap-3">
                  <img class="w-10 h-10 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                  <div>
                     <h2 class="text-sm font-semibold">Muhammad Badrun</h2>
                     <p class="text-sm text-slate-700 dark:text-slate-400">CO-Founder</p>
                  </div>
               </div>
            </div>
         </div>
                  <div class="bg-white border border-slate-200 rounded-lg shadow dark:bg-slate-800 dark:border-slate-700">
            <a href="#">
            <img class="rounded-t-lg" src="{{asset('/images/alivio.jpeg')}}" alt="" />
            </a>
            <div class="p-5">
               <div class="flex items-center gap-4 mb-3">
                  <p class="text-xs text-slate-600 dark:text-slate-400">2 jam yang lalu</p>
                  <p class="text-xs p-[2px] px-2 bg-slate-100 rounded-full text-slate-700 dark:text-slate-700">Teknologi</p>
               </div>
               <a href="#">
                  <h5 class="mb-2 text-xl font-bold tracking-tight text-slate-900 dark:text-slate-100">Noteworthy technology acquisitions 2021</h5>
               </a>
               <p class="text-sm mb-3 font-normal text-slate-700 dark:text-slate-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
               <div class="flex items-center gap-3">
                  <img class="w-10 h-10 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                  <div>
                     <h2 class="text-sm font-semibold">Muhammad Badrun</h2>
                     <p class="text-sm text-slate-700 dark:text-slate-400">CO-Founder</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>