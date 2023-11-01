<x-app-layout>
<div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium mb-2 block text-2xl">Hello, Selamat datang {{Auth::user()->name}}</span>
    
    @if(!$isComplate)
    <span class="block mb-4">Profil kamu belum lengkap, Silahkan lengkapi profil untuk mendapatkan pengalaman yang lebih baik.</span>
    
    <a href="{{route("profile.edit")}}" class="w-max bg-slate-800 dark:bg-slate-100 dark:text-slate-800 px-4 py-1 text-xs rounded-full text-slate-100 flex items-center gap-2 font-medium focus:ring-2 focus:ring-slate-500 dark:focus:ring-slate-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950"> <span>Edit Profil</span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
</svg>
</a>
@endif
  </div>
</div>
</x-app-layout>
