<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

            <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


        
{{--      <script src="https://cdn.tailwindcss.com"></script>   --}}
{{--              <script>  --}}
{{--          tailwind.config = {  --}}
{{--            darkMode: 'class'  --}}
{{--          }  --}}
{{--        </script>  --}}
      
              <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
            <script>
         // On page load or when changing themes, best to add inline in `head` to avoid FOUC
         if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
             document.documentElement.classList.add('dark');
         } else {
             document.documentElement.classList.remove('dark')
         }
      </script>
      
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      @stack("head")
    </head>
    <body class="bg-white dark:bg-slate-950 text-slate-950 dark:text-slate-50 antialiased overflow-x-hidden">
       
       
       
<nav class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 dark:bg-slate-800 dark:border-slate-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start gap-3">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg sm:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
<x-logo />
      </div>
      <div class="flex items-center gap-1">
         <button id="theme-toggle" type="button" class=" text-slate-950 dark:text-slate-50 rounded-lg text-sm">
               <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
               </svg>
               <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
               </svg>
            </button>
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-slate-800 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
{{--                 <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo"> --}}
<div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-slate-100 rounded shadow dark:bg-slate-700 dark:divide-slate-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-slate-900 dark:text-white" role="none">
                  {{ Auth::user()->name }}
                </p>
                <p class="text-sm font-medium text-slate-900 truncate dark:text-slate-300" role="none">
                  {{Auth::user()->email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="{{ route("profile.edit") }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white" role="menuitem">Profil Saya</a>
                </li>
                <li>
                       <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white">Keluar</a></form>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-slate-200 sm:translate-x-0 dark:bg-slate-800 dark:border-slate-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-20 overflow-y-scroll bg-white dark:bg-slate-800">
      <ul class="space-y-2">
         <li>
            <a href="{{route("dashboard")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("dashboard") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("dashboard") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
  <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
</svg>

               <span class="ml-3">Dashboard</span>
            </a>
         </li>
                  <li>
            <a href="{{route("users.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("users.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
               <svg class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("users.index") ? "text-slate-900 dark:text-slate-100" : ""}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
            </li>
            </ul>
                     <div class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
         <span class="text-xs tracking-wider uppercase text-slate-500 dark:text-slate-500">Content Management</span>
         <ul class="space-y-2">
                              <li>
            <a href="{{route("testimonis.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("testimonis.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
              
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("testimonis.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 01-.533-.074.75.75 0 01-.44-1.223 3.73 3.73 0 00.814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 01-4.246.997z" clip-rule="evenodd" />
</svg>

               <span class="flex-1 ml-3 whitespace-nowrap">Testimoni</span>
            </a>
            </li>
                                          <li>
            <a href="{{route("faqs.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("faqs.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("faqs.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
</svg>

               <span class="flex-1 ml-3 whitespace-nowrap">Faq</span>
            </a>
            </li>
                                                      <li>
            <a href="{{route("benefits.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("benefits.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("benefits.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68zM3 10.5a.75.75 0 01.75-.75H6a.75.75 0 010 1.5H3.75A.75.75 0 013 10.5zm14.25 0a.75.75 0 01.75-.75h2.25a.75.75 0 010 1.5H18a.75.75 0 01-.75-.75zm-8.962 3.712a.75.75 0 010 1.061l-1.591 1.591a.75.75 0 11-1.061-1.06l1.591-1.592a.75.75 0 011.06 0z" clip-rule="evenodd" />
</svg>

               <span class="flex-1 ml-3 whitespace-nowrap">Why</span>
            </a>
            </li>
                                                                  <li>
            <a href="{{route("teams.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("teams.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("teams.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
  <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
</svg>


               <span class="flex-1 ml-3 whitespace-nowrap">Tim Kami</span>
            </a>
            </li>
      </ul>
      </div>
         <div class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
         <span class="text-xs tracking-wider uppercase text-slate-500 dark:text-slate-500">Layanan</span>
         <ul class="space-y-2">
         <li>
                     <a href="{{route("services.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("services.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
               <svg class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("services.index") ? "text-slate-900 dark:text-slate-100" : ""}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ml-3">Jenis Layanan</span>
            </a>
         </li>
                  <li>
                     <a href="{{route("packets.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("packets.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("packets.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
  <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
</svg>

               <span class="ml-3">Daftar Paket</span>
            </a>
         </li>
                           <li>
                     <a href="{{route("features.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("features.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("features.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
  <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" />
</svg>

               <span class="ml-3">Daftar Fitur</span>
            </a>
         </li>
           <li>
                     <a href="{{route("products.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("products.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("products.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 007.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 004.902-5.652l-1.3-1.299a1.875 1.875 0 00-1.325-.549H5.223z" />
  <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 009.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 002.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3zm3-6a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3zm8.25-.75a.75.75 0 00-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-5.25a.75.75 0 00-.75-.75h-3z" clip-rule="evenodd" />
</svg>

               <span class="ml-3">Daftar Produk</span>
            </a>
         </li>
         </ul>
         </div>
         
         <div class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
         <span class="text-xs tracking-wider uppercase text-slate-500 dark:text-slate-500">Artikel</span>
         <ul class="space-y-2">
         <li>
                           <a href="{{route("products.index")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("products.index") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">

               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("products.index") ? "text-slate-900 dark:text-slate-100" : ""}}">
  <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 007.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 004.902-5.652l-1.3-1.299a1.875 1.875 0 00-1.325-.549H5.223z" />
  <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 009.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 002.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3zm3-6a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3zm8.25-.75a.75.75 0 00-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-5.25a.75.75 0 00-.75-.75h-3z" clip-rule="evenodd" />
</svg>

               <span class="ml-3">Daftar Artikel</span>
            </a>
          </li>
          </ul>
          
          </div>
      <ul class="pt-2 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
      <li>
                  <a href="{{route("profile.edit")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group  hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("profile.edit") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100  {{ Request()->routeIs("profile.edit") ? "text-slate-900 dark:text-slate-100" : ""}}" aria-hidden="true">
                     <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                  </svg>

               <span class="flex-1 ml-3 whitespace-nowrap">Profil Saya</span>
            </a>
      </li>
         <li>
                  <li>
         
                                             <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex items-center p-2 text-slate-600 rounded-lg dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 group">
                                                                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-slate-600 transition duration-75 dark:text-slate-600 group-hover:text-slate-900 dark:group-hover:text-white" aria-hidden="true">
                     <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                  </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Keluar</span>
            </a>
            </form>
         </li>
         </ul>
   </div>
</aside>

<main class="min-h-screen sm:ml-64 px-4 pb-4  pt-[84px] sm:pt-[78px]">
@if(session()->has("error"))
<div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
      {{session()->get("error")}}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
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
   {{ $slot }}
</main>
        
              <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>  --}}
 @stack("script")
      <script> 
         var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
         var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
         
         // Change the icons inside the button based on previous settings
         if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
         themeToggleLightIcon.classList.remove('hidden');
         } else {
         themeToggleDarkIcon.classList.remove('hidden');
         }
         
         var themeToggleBtn = document.getElementById('theme-toggle');
         
         themeToggleBtn.addEventListener('click', function() {
         
         // toggle icons inside button
         themeToggleDarkIcon.classList.toggle('hidden');
         themeToggleLightIcon.classList.toggle('hidden');
         
         // if set via local storage previously
         if (localStorage.getItem('color-theme')) {
           if (localStorage.getItem('color-theme') === 'light') {
               document.documentElement.classList.add('dark');
               localStorage.setItem('color-theme', 'dark');
           } else {
               document.documentElement.classList.remove('dark');
               localStorage.setItem('color-theme', 'light');
           }
         
         // if NOT set via local storage previously
         } else {
           if (document.documentElement.classList.contains('dark')) {
               document.documentElement.classList.remove('dark');
               localStorage.setItem('color-theme', 'light');
           } else {
               document.documentElement.classList.add('dark');
               localStorage.setItem('color-theme', 'dark');
           }
         }
         
         });
      </script>
    </body>
</html>
