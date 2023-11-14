@props(["data" => []])
@if(count($data) > 0)
 <section class="py-16 flex flex-col gap-8" data-aos="fade-up"> 
      <div class="flex flex-col items-center gap-4 max-w-4xl mx-auto px-4">
        <img src="{{ asset("images/icon/price.png") }}" alt="about" class="w-12 h-12 mx-auto"/>
         <h1 class="text-2xl font-semibold text-center">Daftar Harga Paket Website</h1>
         <span class="text-center text-sm text-slate-700 dark:text-slate-400 max-w-lg leading-6">Pilih paket pembuatan website yang sesuai dengan kebutuhan anda.</span>
      </div>
      <div>
         <div class="mb-4 border-b border-slate-200 dark:border-slate-700 max-w-4xl mx-auto px-4">
            <ul class="hide-scroll flex flex-nowrap -mb-px text-sm font-medium text-center overflow-x-scroll list-none" style="padding: 0 !important" id="daftar-harga" data-tabs-toggle="#daftar-harga-tabs" role="tablist">
             
               @foreach($data as $index => $v)
                              <li class="mr-2" role="daftar-harga">
                  <button class="w-max inline-block p-4 border-b-2 rounded-t-lg hover:tex-slate-600 hover:border-blue-600 dark:hover:text-slate-300" id="daftar-harga-{{Str::slug($index)}}-tab" data-tabs-target="#daftar-harga-{{Str::slug($index)}}" type="button" role="tab" aria-controls="daftar-harga-{{Str::slug($index)}}" aria-selected="false">{{$index}}</button>
               </li>
               @endforeach
            </ul>
         </div>
         <div id="daftar-harga-tabs">
                           @foreach($data as $index2 => $v2)
            <div class="hidden" id="daftar-harga-{{Str::slug($index2)}}" role="tabpanel" aria-labelledby="daftar-harga-{{Str::slug($index2)}}-tab">
     <div class="flex flex-nowrap xl:justify-center gap-4 overflow-x-auto snap-x px-4 pb-4">
              @foreach($v2 as $item)
              @php
              $discount = $item->discount ? $item->discount : 0;
              $price = $item->price;
             
              $finalPrice = $price - ($price * $discount / 100);
              
              @endphp
                  <div @class([
                  'snap-start flex-none scroll-mx-4 w-full max-w-sm pb-4 pt-6 px-8 rounded-lg shadow relative',
                  'border-2 border-blue-500 dark:border-slate-700 bg-blue-100 text-slate-900' => $item->banner == "terlaris",
                  'border bg-white  border-slate-200 dark:border-slate-700 dark:bg-slate-800' => $item->banner != "terlaris"
                  ])>
                  
                  @if($item->banner == "terlaris")
                  <div class="mb-4 flex items-center justify-center">
                   <p class="text-base py-1.5 px-6 text-slate-100 rounded-full bg-teal-500 uppercase flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
</svg>
 <span>Paling Laris!</span></p>
                  </div>
                  @endif
                  
                     <h5 @class([
                     "mb-4 text-xl font-semibold uppercase text-center",
                     "dark:text-slate-900" => $item->banner == "terlaris"
                     ])>{{$item->packet->name}}</h5>
                     <p @class(["mb-4 text-sm text-center", "text-slate-700 dark:text-slate-400" => $item->banner != "terlaris", "text-slate-700" => $item->banner == "terlaris" ])>{{$item->packet->desc}}</p>
                     @if($item->discount)
                     <div class="flex items-center justify-center gap-6 mb-4 text-sm">
                      <p class=" px-2 py-1 rounded-full bg-blue-200 text-blue-800 text-xs font-medium">Diskon {{$item->discount}}%</p>
                      <div class="flex items-center gap-1  "><p class="line-through">Rp @currency($price)</p></div>
                     </div>
                     @endif
                     <div class="mb-6 flex items-center justify-center items-baseline">
                        <span class="text-3xl font-medium">Rp</span>
                        <span class="text-5xl font-semibold tracking-tight">@currency($finalPrice)</span>
                     </div>
                     <a href="https://api.whatsapp.com/send?phone=6285721557240&text=Halo%20Duos%20Dev,%20Saya%20Mau%20order%20jasa%20pembuatan%20web%20{{$item->service->name}}%20dengan%20{{$item->packet->name}}.%20Mohon%20infonya%20lebih%20lanjut." target="_blank" class="mb-2 text-slate-100 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Info Lebih Lanjut</a>
                     <ul role="list" class="space-y-5 my-7 list-none" style="padding: 0 !important">
                      
                      @foreach($item->features as $feature)
                        
                        @if($feature->pivot->is_checked)
                        <li class="flex space-x-3 items-center justify-between">
                         <div class="flex space-x-3 items-center">
                           <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                           </svg>
                           <span class="text-base font-normal leading-tight">{{$feature->name}}</span>
                           </div>
                       
                        @if($feature->desc)
                                                   <button data-tooltip-target="tooltip-right-{{$feature->id}}-{{Str::slug($index2)}}" data-tooltip-placement="right" type="button" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
</svg>
</button>
<div id="tooltip-right-{{$feature->id}}-{{Str::slug($index2)}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    {{$feature->desc}}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
                        @endif
                        </li>
                        @else
                                                <li class="flex space-x-3 line-through decoration-slate-1000 justify-between">
                                                                          <div class="flex space-x-3 items-center">
                           <svg class="flex-shrink-0 w-4 h-4 text-slate-400 dark:text-slate-1000" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                           </svg>
                           <span class="text-base font-normal leading-tight">{{$feature->name}} </span></div>
                                                  @if($feature->desc)
                                                   <button data-tooltip-target="tooltip-right-{{$feature->id}}-{{Str::slug($index2)}}" data-tooltip-placement="right" type="button" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
</svg>
</button>
<div id="tooltip-right-{{$feature->id}}-{{Str::slug($index2)}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    {{$feature->desc}}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
                        @endif
                        </li>
                        @endif
                        @endforeach
                     </ul>
                  </div>
                  @endforeach
                  
                
                  </div>
                 
                 @if(count($v2) > 1)
                                   <div class="flex lg:hidden items-center justify-center gap-1 mt-8 text-slate-700 dark:text-slate-400">
                                       <span class="text-sm ">Geser untuk melihat paket lainya
</span>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
</svg>
                  </div>
                  @endif

            </div>
            @endforeach
         </div>
      </div>
   </section>
   @endif