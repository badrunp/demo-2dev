<x-guest-layout>
   <section class="relative min-h-screen sm:h-[700px] sm:min-h-0 w-full flex items-center justify-center flex-col px-6 overflow-hidden bg-blue-700 dark:bg-transparent" id="jumbotron">
      <div class="hidden dark:block w-[500px] md:w-[600px] lg:w-[800px] h-[500px] md:h-[800px] lg:w-[1000px] rounded-full bg-gradient-to-bl from-blue-600 to-transparent absolute top-0 -right-[200px] -z-10 blur-3xl opacity-20"></div>
      <div class="flex flex-col justify-center items-center gap-6 sm:max-w-md md:max-w-lg">
         <h1 id="jumbotron-title" class="text-4xl font-semibold text-center text-slate-100">Kami Siap Membuat Website</span> Impian Anda</h1>
         <p class="text-slate-200 dark:text-slate-400 text-center opacity-80 dark:opacity-100">Kami hadir untuk membantu mewujudkan website impian Anda yang siap Go-Digital dari lokal hingga internasional</p>
         <a href="{{route("harga")}}" class="w-max mt-2 text-slate-900 dark:text-slate-100 bg-slate-100 dark:bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 dark:hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-slate-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm leading-6  px-10 py-3 text-center flex items-center gap-2 font-medium">
            <span>Lihat Harga</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
         </a>
      </div>
   </section>
   <section class="px-4 py-16" id="tentang-kami">
      <div class=" flex flex-col gap-4 max-w-4xl mx-auto">
         <h1 class="tentang-kami-title text-2xl font-semibold text-center">Tentang Kami</h1>
         <p class="text-sm leading-6  text-slate-700 dark:text-slate-400 leading-6">Duos Dev adalah brand usaha kami di bidang IT yang berlokasi di Cikijing - Majalengka dan memberikan layanan profesional dibekali tenaga ahli yang berpengalaman. Dengan bermodal pengetahuan dan jam terbang yang kami miliki, kami siap menjawab kebutuhan masyarakat terlebih untuk perusahaan dalam pembuatan website untuk kemajuan usahanya.</p>
         <a href="{{route("tentang-kami")}}" class="mt-2 w-max ml-auto md:ml-0 text-sm leading-6  font-medium text-blue-600 flex items-center gap-2 focus:underline hover:underline">
            <span>Selengkapnya</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
         </a>
      </div>
   </section>
   
   @if(count($products) > 0)
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto" id="layanan-kami">
      <div class="flex flex-col items-start gap-4">
         <h1 class="text-2xl font-semibold">Layanan Kami</h1>
         <span class="text-sm leading-6  text-slate-700 dark:text-slate-400 leading-6">Mau membuat website apa? Duos Dev solusi lengkap dalam pembuatan website untuk perusahaan atau perorangan, dengan tampilan yang responsive, serta layanan marketing untuk website Anda.</span>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
       @foreach($products as $service)
         <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l rounded-lg">
            @if(false)
                    <image src="{{asset("storage/" . $service[0]->service->photo)}}" alt="{{$service[0]->service->name}}" class="w-8 h-8 rounded-full mb-2" />
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mb-2 text-slate-100">
  <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
</svg>

                    @endif
        </dd>
            
               <h5 class="mb-1 text-base font-medium tracking-tight text-slate-100">{{$service[0]->service->name}}</h5>
            
            <p class="text-sm leading-6  mb-3 font-normal text-slate-100">{{$service[0]->service->desc}}</p>
         </div>
         @endforeach
      </div>
   </section>
   @endif
  <x-pages.harga :data="$products" />
   <section class=" bg-blue-700" id="quote">
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
            <p class="text-sm leading-6  mt-2 sm:mt-4 text-slate-200">
               Proses pembuatan website yang cepat dengan kualitas tinggi karena
               menggunakan teknologi dan framework terupdate yang banyak digunakan
               oleh pengembang aplikasi di seluruh dunia.
            </p>
         </div>
      </div>
   </section>
   @if(count($benefits) > 0)
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto" id="benefit">
      <h1 class="text-2xl font-semibold text-center">Kenapa Menggunakan <br/> Jasa Duos Dev</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
       @foreach($benefits as $benefit)
         <div class="block p-6  bg-white border border-slate-200 rounded-lg shadow  dark:bg-slate-800 dark:border-slate-700 flex flex-col items-center gap-2">
            {!! $benefit->icon !!}
            <h5 class="text-base font-semibold tracking-tight">{{$benefit->title}}</h5>
            <p class="text-sm leading-6  text-center font-normal text-slate-700 dark:text-slate-400">{{$benefit->desc}}</p>
         </div>
         @endforeach
      </div>
   </section>
   @endif
   
   @if(count($testimonis) >= 2)
   <section class=" bg-blue-700" id="testimoni">
      <div class="px-4 py-16 flex flex-col gap-12 max-w-4xl mx-auto">
         <div class="flex items-center flex-col gap-4">
            <h1 class="text-2xl font-semibold text-center text-slate-100">Testimoni Dari Klien</h1>
            <p class="text-center text-sm leading-6  text-slate-200 max-w-lg opacity-80">Beberapa testimoni dari klien yang sudah menggunakan jasa kami.</p>
         </div>
         <div>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
               <!-- Carousel wrapper -->
               <div class="relative overflow-hidden rounded-lg h-72">
                @foreach($testimonis as $testimoni)
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                     <div class="flex flex-col items-center gap-6 max-w-xs sm:max-w-md mx-auto">
                        <div class="flex flex-col items-center">
                         @if(false)
                           <img class="w-14 h-14 rounded-full" src="{{asset('storage/' . $testimoni->photo)}}" alt="{{$testimoni->name}}">
                           @else
                           <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full ">
    <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
                           @endif
                           <h4 class="mt-4 font-medium text-slate-100">{{ $testimoni->name }}</h4>
                           @if($testimoni->pekerjaan)
                           <p class=" text-xs text-slate-200 opacity-80">{{ $testimoni->pekerjaan}}</p>
                           @endif
                        </div>
                        <p class="text-center text-sm leading-6  text-slate-100">{{$testimoni->message}}</p>
                     </div>
                  </div>
                 @endforeach
                  
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
   @endif
<x-pages.proyek :data="$projects"/>
<x-tim :data="$teams"/>
<x-pages.artikel :data="$articles"/>
@if(count($faqs) > 0)
   <section class="px-4 py-16 flex flex-col gap-8 max-w-4xl mx-auto" id="faq">
      <div class="px-4 flex items-center flex-col gap-4">
         <h1 class="text-2xl font-semibold text-center">FAQ</h1>
         <p class="text-center text-sm leading-6  text-slate-700 dark:text-slate-400 max-w-lg">Ini adalah pertanyaan yang sering ditanyakan kepada kami.</p>
      </div>
      <div>
         <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100" data-inactive-classes="text-slate-1000 dark:text-slate-400">
          @foreach($faqs as $key => $faq)
          
            <h2 id="accordion-flush-heading-{{$key}} ">
               <button type="button" class="flex items-center justify-between w-full py-5 text-left text-slate-700 border-b border-slate-200 dark:border-slate-700 dark:text-slate-400 px-2" data-accordion-target="#accordion-flush-body-{{$key}}" aria-expanded="{{ $key == 0 ? 'true' : 'false'}}" aria-controls="accordion-flush-body-{{$key}}">
                  <span class="text-base">{{$faq->pertanyaan}}</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
               </button>
            </h2>
            <div id="accordion-flush-body-{{$key}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$key}}">
               <div class="py-5 border-b border-slate-200 dark:border-slate-700 text-sm leading-6  px-2">
                  <div class="mb-2 text-slate-700 dark:text-slate-400 space-y-4">{!!$faq->jawaban!!}</div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   @endif
    @push("head")
 <style>
  ul,ol {
   padding: 0 1.5rem !important;
  }
 </style>
 @endpush
</x-guest-layout>