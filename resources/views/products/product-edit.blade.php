<x-app-layout>
   <div>
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
               <a href="{{ route("products.edit", $product)}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Edit</a>
            </div>
         </li>
      </ol>
   </nav>
   <div class="mb-8">
      <h1 class="mb-2 text-2xl font-medium">Edit Daftar Produk</h1>
   </div>
   <form class="mb-8" method="POST" action="{{ route('products.update', $product) }}">
      @csrf
      @method("patch")
      <div class="mb-4">
         <x-input-label class="mb-1" for="service_id" :value="__('Jenis Layanan')" />
         <select id="service_id" name="service_id" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("service_id", $product->service->id) ? "selected" : ""}}>Pilih Jenis Layanan</option>
         @foreach($services as $service)
         <option {{ old("service_id", $product->service->id) == $service->id ? "selected" : ""}} value="{{$service->id}}">{{$service->name}}</option>
         @endforeach
         </select>
         <x-input-error :messages="$errors->get('service_id')" class="mt-2" />
      </div>
      <div class="mb-4">
         <x-input-label class="mb-1" for="packet_id" :value="__('Paket')" />
         <select id="packet_id" name="packet_id" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5" >
          @if(session()->has("packet") || $product->packet->id)
          <option value="{{session()->has("packet") ? session()->get("packet")->id : $product->packet->id}}" selected>{{session()->has("packet") ? session()->get("packet")->name : $product->packet->name}}</option>
          @endif
         </select>
         <x-input-error :messages="$errors->get('packet_id')" class="mt-2" />
      </div>
      <div class="mb-4 grid grid-cols-2 gap-2">
         <div>
            <x-input-label for="price" :value="__('Harga')" />
            
            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $product->price)" 
               />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
         </div>
         <div>
            <x-input-label for="discount" :value="__('Diskon')" />
            <x-text-input id="discount" class="block mt-1 w-full" type="number" name="discount" :value="old('discount', $product->discount)" placeholder="0" min="0" max="100"/>
            <x-input-error :messages="$errors->get('discount')" class="mt-2" />
         </div>
      </div>
      <div class="mb-4">
         <x-input-label class="mb-1" for="status" :value="__('Status')" />
         <select id="status" name="status" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("status", $product->status) ? "selected" : ""}}>Pilih Status</option>
         <option {{ old("status", $product->status) == "published" ? "selected" : ""}} value="published">Published</option>
         <option  {{ old("status", $product->status) == "unpublished" ? "selected" : ""}} value="unpublished">Unpublished</option>
         </select>
         <x-input-error :messages="$errors->get('status')" class="mt-2" />
      </div>
      <div class="mb-4">
         <x-input-label class="mb-1" for="banner" :value="__('Banner(Opsional)')" />
         <select id="banner" name="banner" class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5">
         <option value="" {{!old("banner", $product->banner) ? "selected" : ""}}>Pilih Banner</option>
         <option {{ old("banner", $product->banner) == "terlaris" ? "selected" : ""}} value="terlaris">Terlaris</option>
         </select>
         <x-input-error :messages="$errors->get('banner')" class="mt-2" />
      </div>
      <div class="mb-4">
         <x-input-label class="mb-2" for="banner" :value="__('Daftar Fitur')" />
         <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400" id="feature-list-table">
               <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
                  <tr>
                     <th scope="col" class="px-4 py-3 text-center">
                        Fitur
                     </th>
                     <th scope="col" class="px-4 py-3 text-center">
                        Ceklis
                     </th>
                     <th scope="col" class="px-4 py-3 text-center">
                        Aksi
                     </th>
                  </tr>
               </thead>
               <tbody>
                @if(session()->has("features"))
                @foreach(session()->get("features") as $value)
                <tr class="bg-white dark:bg-slate-800">
   <td width="250px" class="px-4 pt-4">
      <select id="select_feature_{{$value['no_feature']}}" class="w-full border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5 feature-select" name="features[]" data-select2-id="{{$value['no_feature']}}">
       <option selected value="{{$value["value"]}}">{{$value["text"]}}</option>
      </select>
   </td>
   <td class="py-2 px-4 text-center"><input name="features_check[]" id="checked-checkbox" type="checkbox" value="{{$value['no_feature']}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($value["checked"]) checked @endif></td>
   <td class="py-2 px-4 text-center">
      <button type="button" id="delete_row_features">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
         </svg>
      </button>
   </td>
</tr>
                @endforeach
                @else
                 @foreach($product->features as $key => $value)
                                 <tr class="bg-white dark:bg-slate-800">
   <td width="250px" class="px-4 pt-4">
      <select id="select_feature_{{$key}}" class="w-full border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5 feature-select" name="features[]" data-select2-id="{{$key}}">
       <option selected value="{{$value["id"] . "_" . $key. "_" . $value["name"]}}">{{$value["name"]}}</option>
      </select>
   </td>
   <td class="py-2 px-4 text-center"><input name="features_check[]" id="checked-checkbox" type="checkbox" value="{{$key}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($value->pivot->is_checked) checked @endif></td>
   <td class="py-2 px-4 text-center">
      <button type="button" id="delete_row_features">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
         </svg>
      </button>
   </td>
</tr>
                 @endforeach
                @endif
               </tbody>
               <tfoot>
                  <tr>
                     <td class="py-4 px-2" colspan="3">
                        <button onclick="addRowFeatur()" type="button" class="mt-1 w-max text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded-full text-xs px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 flex items-center gap-1">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                           </svg>
                           <span>Tambah Fitur</span>
                        </button>
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
                  <x-input-error :messages="$errors->get('features')" class="mt-2" />
      </div>
      <div class="flex items-center gap-2">
         <a href="{{route("products.index")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 dark:focus:ring-yellow-900 flex justify-items-center gap-2">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
         </svg>
         <span>Kembali</span></a>
         <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
               <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            <span>Simpan</span>
         </button>
      </div>
   </form>
   @push("script")
   <script>
      $(document).ready(function() {
          $('#packet_id').select2({
           placeholder: "Pilih Paket",
           ajax: {
            url: "{{route("api.packets.findAll")}}",
            dataType: 'json',
            delay: 250,
            processResults: function(data){
             return {
              results: data
             }
            }
           }
          })
      });
       
      let no_feature = {{ session()->has("no_features") ? session()->get("no_features") : count($product->features)  }};
      function addRowFeatur(){
        
        $("#feature-list-table").find("tbody")
          .append(`<tr class="bg-white dark:bg-slate-800">
   <td width="250px" class="px-4 pt-4">
      <select id="select_feature_${no_feature}" class="w-full border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm block w-full p-2.5 feature-select" name="features[]" data-select2-id="${no_feature}"></select>
   </td>
   <td class="py-2 px-4 text-center"><input name="features_check[]" id="checked-checkbox" type="checkbox" value="${no_feature}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></td>
   <td class="py-2 px-4 text-center">
      <button type="button" id="delete_row_features">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
         </svg>
      </button>
   </td>
</tr>`)
          select2FeatureList(`#select_feature_${no_feature}`)
          no_feature++
      
          
       }
                       @if(session()->has("features"))
                @foreach(session()->get("features") as $value)
                select2FeatureList("#select_feature_{{$value["no_feature"]}}")
                @endforeach
                @else
                @foreach($product->features as $key => $value)
                select2FeatureList("#select_feature_{{$key}}")
                @endforeach
                @endif
                
       function select2FeatureList(id){
        let ids = id.split("_")[id.split("_").length - 1]
         $(id).select2({
          placeholder: "Pilih Fitur",
          ajax: {
            url: "{{route("api.features.findAll")}}",
            dataType: 'json',
            delay: 250,
            processResults: function(data){
             return {
              results: $.map(data, function (item) {
                  
                  return { 
                    text: item.text,
                    id: item.id + "_" + ids + "_" + item.text
                  }
                })
             }
            }
           }
         })
       }
       
       $("#feature-list-table").on("click", "#delete_row_features", function(){
         $(this).parent().parent().remove()
       })
      
   </script>
   @endpush
</x-app-layout>