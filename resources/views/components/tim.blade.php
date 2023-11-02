   <section class="{{ Request()->routeIs('tentang-kami') ? '' : 'bg-blue-600'}} ">
      <div class="px-4 py-16 flex flex-col gap-12 max-w-4xl mx-auto">
      <div class="px-4 flex items-center flex-col gap-4">
         <h1 class=" text-2xl font-semibold text-center {{ Request()->routeIs('tentang-kami') ? '' : 'text-slate-100' }}">Tim Kami</h1>
         <p class="max-w-lg text-center text-sm {{ Request()->routeIs('tentang-kami') ? 'text-slate-700 dark:text-slate-400' : 'text-slate-200' }}">Dengan kondisi tim yang muda siap berkarya dan berpengalaman, kami siap sedia untuk membangun negeri menjadi lebih baik dan go-digital. Menyasar sektor bidang pasar secara menyeluruh.</p>
      </div>
      <div class="flex items-center justify-center flex-wrap gap-6">
         <div class="flex flex-col gap-4 items-center justify-center">
            <img class="w-[80px] h-[80px] rounded-full" src="{{asset("/images/dendi.png")}}" alt="Rounded avatar">
            <div class="flex flex-col text-center">
               <h5 class="text-sm font-medium  {{ Request()->routeIs('tentang-kami') ? '' : 'text-slate-100' }}">Dendi Budiansyah</h5>
               <p class="text-xs  {{ Request()->routeIs('tentang-kami') ? 'text-slate-700 dark:text-slate-400' : 'text-slate-200' }}">Founder</p>
            </div>
            <div class="flex items-center gap-2">
               <a href="/">
               <img src="{{asset('/images/social/email.png')}}" alt="" class="w-6 h-6" />
               </a>
               <a href="/">
               <img src="{{asset('/images/social/github.png')}}" alt="" class="w-6 h-6" />
               </a>
               <a href="/">
               <img src="{{asset('/images/social/linkedin.png')}}" alt="" class="w-6 h-6" />
               </a>
            </div>
         </div>
         <div class="flex flex-col gap-4 items-center justify-center">
            <img class="w-[80px] h-[80px] rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
            <div class="flex flex-col text-center">
               <h5 class="text-sm font-medium  {{ Request()->routeIs('tentang-kami') ? '' : 'text-slate-100' }}">Muhammad Badrun</h5>
               <p class="text-xs  {{ Request()->routeIs('tentang-kami') ? 'text-slate-700 dark:text-slate-400' : 'text-slate-200' }}">CO-Founder</p>
            </div>
            <div class="flex items-center gap-2">
               <a href="/">
               <img src="{{asset('/images/social/email.png')}}" alt="" class="w-6 h-6" />
               </a>
               <a href="/">
               <img src="{{asset('/images/social/github.png')}}" alt="" class="w-6 h-6" />
               </a>
               <a href="/">
               <img src="{{asset('/images/social/linkedin.png')}}" alt="" class="w-6 h-6" />
               </a>
            </div>
         </div>
      </div>
   </section>