<x-guest-layout>
<div class="mt-[60px]">

 <section class="relative max-w-4xl w-full mx-auto px-4 py-16">
  
  @if(session()->has("success"))
<div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
      {{ session()->get("success")}}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
 <div class="flex flex-col">
  <h1 class="text-2xl font-semibold mb-8">Kontak Kami</h1>
  
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-12">

  
    <div class="flex items-center gap-4">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
</svg>


  <div class="flex flex-col">
  <h4 class="font-medium">Email</h4>
  <a href="mailto:duosdevofficial@gmail.com" class="text-sm text-slate-700 dark:text-slate-400">duosdevofficial@gmail.com</a>
  </div>
  </div>
    <div class="flex items-center gap-4">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
</svg>


  <div class="flex flex-col">
  <h4 class="font-medium">WhatsApp</h4>
  <a href="https://api.whatsapp.com/send?phone=6285721557240&text=Halo%20Duos%20Dev" class="text-sm text-slate-700 dark:text-slate-400">+6285721557240</a>
  </div>
  </div>
  
    <div class="flex items-center gap-4">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
</svg>

  <div class="flex flex-col">
  <h4 class="font-medium">Lokasi</h4>
  <a href="https://maps.app.goo.gl/tR1cQrvCqfyMCEhC8" class="text-sm text-slate-700 dark:text-slate-400">
Cikijing, Majalengka Jawa Barat, 45466</a>
  </div>
  </div>
  
  </div>
  
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
  
<form method="post" action="{{route('messages.store')}}">
 @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Kamu" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email Kamu">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div> 
    <div class="mb-6">
    
<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
<textarea id="message" rows="4" name="messages" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pesan Kamu..."></textarea>
            <x-input-error :messages="$errors->get('messages')" class="mt-2" />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center justify-center gap-2"><span>Kirim</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
</svg>
</button>
</form>
<iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15839.780770871996!2d108.36766967642916!3d-7.015728368915539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f3ef9252b56bd%3A0x17d2097f9f225a8c!2sCidulang%2C%20Kec.%20Cikijing%2C%20Kabupaten%20Majalengka%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1669953061338!5m2!1sid!2sid"
              class="w-full h-[420px] sm:h-[400px]"
            ></iframe>
  </div>
 </div>
 </section>

</div>
</x-guest-layout>