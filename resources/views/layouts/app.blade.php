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


        
     <script src="https://cdn.tailwindcss.com"></script>  
             <script> 
         tailwind.config = { 
           darkMode: 'class' 
         } 
       </script> 
      
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
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-slate-800">
      <ul class="space-y-2">
         <li>
            <a href="{{route("dashboard")}}" class="flex items-center p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 group hover:text-slate-900 dark:hover:text-slate-100 {{ Request()->routeIs("dashboard") ? "bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100" : "text-slate-600 dark:text-slate-400"}}">
               <svg class="w-5 h-5 text-slate-600 transition duration-75 group-hover:text-slate-900 dark:group-hover:text-slate-100 {{ Request()->routeIs("dashboard") ? "text-slate-900 dark:text-slate-100" : ""}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
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
   {{ $slot }}
</main>
        
        
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script> 
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
