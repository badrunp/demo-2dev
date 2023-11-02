<x-guest-layout>
   <section class="relative min-h-screen sm:h-[700px] sm:min-h-0 w-full flex items-center justify-center flex-col px-6 overflow-hidden bg-blue-700 dark:bg-transparent">
      <div class="hidden dark:block w-[500px] md:w-[600px] lg:w-[800px] h-[500px] md:h-[800px] lg:w-[1000px] rounded-full bg-gradient-to-bl from-blue-600 to-transparent absolute top-0 -right-[200px] -z-10 blur-3xl opacity-20"></div>
      <div class="flex flex-col justify-center items-center gap-6 sm:max-w-md md:max-w-lg">
         <h1 class="text-4xl font-semibold text-center text-slate-100">Kami Siap Membuat Website</span> Impian Anda</h1>
         <p class="text-slate-200 dark:text-slate-400 text-center opacity-80 dark:opacity-100">Kami hadir untuk membantu mewujudkan website impian Anda yang siap Go-Digital dari lokal hingga internasional</p>
         <a href="{{route("harga")}}" class="w-max mt-2 text-slate-900 dark:text-slate-100 bg-slate-100 dark:bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 dark:hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-slate-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-10 py-3 text-center flex items-center gap-2 font-medium">
            <span>Lihat Harga</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
         </a>
      </div>
   </section>
   <section class="px-4 py-16">
      <div class=" flex flex-col gap-4 max-w-4xl mx-auto">
         <h1 class="text-2xl font-semibold text-center">Tentang Kami</h1>
         <p class="text-sm text-slate-700 dark:text-slate-400">Duos Dev adalah brand usaha kami di bidang IT yang berlokasi di Cikijing - Majalengka dan memberikan layanan profesional dibekali tenaga ahli yang berpengalaman. Dengan bermodal pengetahuan dan jam terbang yang kami miliki, kami siap menjawab kebutuhan masyarakat terlebih untuk perusahaan dalam pembuatan website untuk kemajuan usahanya.</p>
         <a href="{{route("tentang-kami")}}" class="mt-2 w-max ml-auto md:ml-0 text-sm font-medium text-blue-600 flex items-center gap-2 focus:underline hover:underline">
            <span>Selengkapan</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
         </a>
{{--            <a href="{{route("tentang-kami")}}" class="mt-2 w-max py-2.5 px-5 mr-2 text-sm font-medium rounded-full border bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:outline-none flex items-center gap-2 border-none text-slate-100"> --}}
{{--             <span>Selengkapan</span> --}}
{{--             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> --}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /> --}}
{{--             </svg> --}}
{{--          </a> --}}
      </div>
   </section>
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto">
      <div class="flex flex-col items-start gap-4">
         <h1 class="text-2xl font-semibold">Layanan Kami</h1>
         <span class="text-sm text-slate-700 dark:text-slate-400">Mau membuat website apa? Duos Dev solusi lengkap dalam pembuatan website untuk perusahaan atau perorangan, dengan tampilan yang responsive, serta layanan marketing untuk website Anda.</span>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
         <div class="p-4 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">Website Profil Perusahaan</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
         <div class="p-4 bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">Website Toko Online</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
         <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">Website Undangan</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
         <div class="p-4 bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">Landing Page</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
         <div class="p-4 bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">Website Pemerintahan</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
         <div class="p-4 bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100 mb-3">
               <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <a href="#">
               <h5 class="mb-2 text-base font-medium tracking-tight text-slate-100">UI/UX</h5>
            </a>
            <p class="text-sm mb-3 font-normal text-slate-100">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
         </div>
      </div>
   </section>
  <x-pages.harga/>
   <section class=" bg-blue-600">
      <div class="px-4 py-16 flex flex-col gap-4 overflow-x-hidden max-w-4xl mx-auto">
         <div class="relative">
            <div class="translate-x-4 sm:translate-x-16">
               <img
                  src="{{asset('/images/big-centered.png')}}"
                  alt="big-centered"
                  class="w-[90%] sm:w-[80%] rounded-sm"
                  />
            </div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2 shadow">
               <img
                  src="{{asset('/images/small-right.png')}}"
                  alt="small right"
                  class="w-[100px] sm:w-[250px] rounded-sm"
                  />
            </div>
         </div>
         <div class="max-w-xl relative">
            <h1 class="text-2xl sm:text-6xl font-bold text-slate-100">
               Proses Cepat <br /> Dan Hasil Berkualitas
            </h1>
            <p class="text-sm mt-2 sm:mt-4 text-slate-200">
               Proses pembuatan website yang cepat dengan kualitas tinggi karena
               menggunakan teknologi dan framework terupdate yang banyak digunakan
               oleh pengembang aplikasi di seluruh dunia.
            </p>
         </div>
      </div>
   </section>
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto">
      <h1 class="text-2xl font-semibold text-center">Kenapa Menggunakan <br/> Jasa Duos Dev</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
         <div class="block p-6  bg-white border border-slate-200 rounded-lg shadow  dark:bg-slate-800 dark:border-slate-700 flex flex-col items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
               <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
            </svg>
            <h5 class="text-base font-semibold tracking-tight">Teknologi Website Terbaru</h5>
            <p class="text-sm text-center font-normal text-slate-700 dark:text-slate-400">Framework yang kami gunakan sudah terupdate. Seperti ReactJS, NextJS, Laravel, Tailwind CSS, Mongo DB dll sesuai kebutuhan.</p>
         </div>
         <div class="block p-6  bg-white border border-slate-200 rounded-lg shadow  dark:bg-slate-800 dark:border-slate-700 flex flex-col items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
            </svg>
            <h5 class="text-md font-semibold tracking-tight ">Free Maintenance 2 Bulan</h5>
            <p class="text-sm text-center font-normal text-slate-700 dark:text-slate-400">Maksudnya adalah perawatan website secara berkala agar website selalu terupdate dan terhindar dari error.</p>
         </div>
         <div class="block p-6  bg-white border border-slate-200 rounded-lg shadow  dark:bg-slate-800 dark:border-slate-700 flex flex-col items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
            </svg>
            <h5 class="text-md font-semibold tracking-tight ">Design Website Responsive</h5>
            <p class="text-sm text-center font-normal text-slate-700 dark:text-slate-400">Website sudah mendukung untuk tampilan multi perangkat seperti Android/iOS, komputer/laptop dan tablet.</p>
         </div>
         <div class="block p-6  bg-white border border-slate-200 rounded-lg shadow  dark:bg-slate-800 dark:border-slate-700 flex flex-col items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-100">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
            </svg>
            <h5 class="text-md font-semibold tracking-tight "> SEO Optimization</h5>
            <p class="text-sm text-center font-normal text-slate-700 dark:text-slate-400">Merupakan sebuah proses optimasi pada mesin pencari dalam mempopulerkan website di halaman pertama browser.</p>
         </div>
      </div>
   </section>
   <section class=" bg-blue-600">
      <div class="px-4 py-16 flex flex-col gap-12 max-w-4xl mx-auto">
         <div class="flex items-center flex-col gap-4">
            <h1 class="text-2xl font-semibold text-center text-slate-100">Testimoni Dari Klien</h1>
            <p class="text-center text-sm text-slate-200 max-w-lg opacity-80">Beberapa testimoni dari klien yang sudah menggunakan jasa kami.</p>
         </div>
         <div>
            <div id="animation-carousel" class="relative w-full" data-carousel="slide">
               <!-- Carousel wrapper -->
               <div class="relative overflow-hidden rounded-lg h-72">
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                     <div class="flex flex-col items-center gap-6 max-w-xs sm:max-w-md mx-auto">
                        <div class="flex flex-col items-center">
                           <img class="w-14 h-14 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                           <h4 class="mt-4 font-medium text-slate-100">Muhammad Badrun</h4>
                           <p class=" text-xs text-slate-200 opacity-80">Cikijing - Majalengka</p>
                        </div>
                        <p class="text-center text-sm text-slate-100">Merupakan sebuah proses optimasi pada mesin pencari dalam mempopulerkan website di halaman pertama browser.</p>
                     </div>
                  </div>
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                     <div class="flex flex-col items-center gap-6 max-w-xs sm:max-w-md mx-auto">
                        <div class="flex flex-col items-center">
                           <img class="w-14 h-14 rounded-full" src="{{asset("/images/profil.jpg")}}" alt="Rounded avatar">
                           <h4 class="mt-4 font-medium text-slate-100">Muhammad Badrun</h4>
                           <p class=" text-xs text-slate-200 opacity-80">Cikijing - Majalengka</p>
                        </div>
                        <p class="text-center text-sm text-slate-100">Merupakan sebuah proses optimasi pada mesin pencari dalam mempopulerkan website di halaman pertama browser.</p>
                     </div>
                  </div>
               </div>
               <!-- Slider controls -->
               <button type="button" class="absolute top-0 left-1/2 -translate-x-[80px] z-30 flex items-end justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-800 group-hover:bg-slate-600 group-focus:outline-none">
                     <svg class="w-4 h-4 text-slate-100 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                     </svg>
                     <span class="sr-only">Previous</span>
                  </span>
               </button>
               <button type="button" class="absolute top-0 right-1/2 translate-x-[80px] z-30 flex items-end justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-800 group-hover:bg-slate-600 group-focus:outline-none">
                     <svg class="w-4 h-4 text-slate-100 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                     <span class="sr-only">Next</span>
                  </span>
               </button>
            </div>
         </div>
      </div>
   </section>
<x-pages.proyek/>
<x-tim/>
<x-pages.artikel/>
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto">
      <div class="px-4 flex items-center flex-col gap-4">
         <h1 class="text-2xl font-semibold text-center">FAQ</h1>
         <p class="text-center text-sm text-slate-700 dark:text-slate-400 max-w-lg">Ini adalah pertanyaan yang sering ditanyakan kepada kami.</p>
      </div>
      <div>
         <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100" data-inactive-classes="text-slate-1000 dark:text-slate-400">
            <h2 id="accordion-flush-heading-2">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
                  <span>Apakah sekali bayar atau ada perpanjangan?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Ada biaya perpanjangan per tahun, untuk melihat biaya perpanjangan per tahun cek daftar harga di menu Harga atau tanyakan lebih detail kepada customer service kami.</p>
               </div>
            </div>
            <h2 id="accordion-flush-heading-3">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                  <span>Proses pembayarannya bagaimana?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Pembayaran bisa melalui transfer Bank Mandiri atau DANA, OVO, ShopeePay, dll.
                     <br>
                     <br>
                     Pembayaran bisa minimum DP 50% di awal, setelah website selesai baru 50% untuk menyelesaikan pembayaran. Bisa juga dibayar langsung lunas melalui checkout. Silakan hubungi customer service kami jika ingin DP 50%..
                  </p>
               </div>
            </div>
            <h2 id="accordion-flush-heading-4">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                  <span>Berapa lama proses pengerjaannya?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Estimasi pengerjaanya website biasanya 1-2 bulan, tergantung dari banyaknya fitur dan kesiapan data yang diberikan oleh klien.</p>
               </div>
            </div>
            <h2 id="accordion-flush-heading-5">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                  <span>Bagaimana prosedur pembuatan websitenya?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Ada biaya perpanjangan per tahun, untuk melihat biaya perpanjangan per tahun cek daftar harga di menu Harga atau tanyakan lebih detail kepada customer service kami.</p>
               </div>
            </div>
            <h2 id="accordion-flush-heading-6">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-6" aria-expanded="true" aria-controls="accordion-flush-body-6">
                  <span>Apa saja data yang perlu dipersiapkan?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Ada biaya perpanjangan per tahun, untuk melihat biaya perpanjangan per tahun cek daftar harga di menu Harga atau tanyakan lebih detail kepada customer service kami.</p>
               </div>
            </div>
            <h2 id="accordion-flush-heading-7">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400" data-accordion-target="#accordion-flush-body-7" aria-expanded="true" aria-controls="accordion-flush-body-7">
                  <span>Apa saja maintenance yang diberikan?</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm px-2">
                  <p class="mb-2 text-slate-700 dark:text-slate-400">Ada biaya perpanjangan per tahun, untuk melihat biaya perpanjangan per tahun cek daftar harga di menu Harga atau tanyakan lebih detail kepada customer service kami.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
</x-guest-layout>