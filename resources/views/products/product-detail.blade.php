<x-app-layout>


<!-- Breadcrumb -->

<nav class="flex mb-8" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="{{ route("dashboard")}}" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-blue-600 dark:text-slate-400 dark:hover:text-white">
        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Dashboard
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("products.index")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Daftar Produk</a>
      </div>
    </li>
        <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-slate-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route("products.show", $product)}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Detail</a>
      </div>
    </li>

  </ol>
</nav>

<div class="mb-8">
<h1 class="text-2xl font-medium">Detail Produk {{$product->service->name}}</h1>
</div>


<dl class="mb-6 max-w-md text-slate-900 divide-y divide-slate-200 dark:text-white dark:divide-slate-700">
    <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Jenis Layanan</dt>
        <dd class="text-base font-semibold">{{$product->service->name}}</dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Nama Paket</dt>
        <dd class="text-base font-semibold">{{$product->packet->name}}</dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Harga</dt>
        <dd class="text-base font-semibold">{{$product->price}}</dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Diskon</dt>
        <dd class="text-base font-semibold">{{$product->discount ? $product->discount : "0"}}%</dd>
    </div>
     <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Status</dt>
        <dd class="text-base font-semibold">
         
                         @if($product->status == "published")
                 <span class="text-green-600">Published</span>
                @else
                 <span class="text-red-600">Unpublished</span>
                @endif
        </dd>
    </div>
            <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Banner</dt>
        <dd class="text-base font-semibold">{{$product->banner ? $product->banner : "-"}}</dd>
    </div>
        <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Dibuat Pada</dt>
        <dd class="text-base font-semibold">{{$product->created_at ? $product->created_at : "-"}}</dd>
    </div>
    
            <div class="flex flex-col pb-3">
        <dt class="mb-1 text-slate-500 text-sm mt-3 dark:text-slate-400">Daftar Fitur</dt>
        <dd>
         
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Fitur
                </th>
                <th scope="col" class="px-6 py-3">
                    Ceklis
                </th>
            </tr>
        </thead>
        <tbody>
         @foreach($product->features as $key => $value)
            <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700">
                <td class="px-6 py-4">
                    {{$key + 1}}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-white">
                    {{$value->name}}
                </th>

                <td class="px-6 py-4">

                    
                    @if($value->pivot->is_checked)
                                        <input id="checked-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-slate-100 border-slate-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-slate-800 focus:ring-2 dark:bg-slate-700 dark:border-slate-600" checked onclick="return false">
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
</svg>

                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </dd>
    </div>
</dl>

        <a href="{{route("products.index")}}" class="w-max focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
</svg>
<span>Kembali</span></a>


</x-app-layout>