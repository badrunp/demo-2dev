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
           
{{--             <script src="https://cdn.tailwindcss.com"></script>              --}}
{{--              <script>            --}}
{{--                tailwind.config = {            --}}
{{--                  darkMode: 'class'                           }           --}}
{{--                  </script>          --}}
              @stack("head")
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
   <body class=" bg-white dark:bg-slate-950 text-slate-950 dark:text-slate-50 antialiased overflow-x-hidden">
      <header class="navbar w-full fixed top-0 left-0  z-50 flex items-center justify-center border-slate-200 dark:border-slate-800 {{ Request()->routeIs("home") ? "text-slate-100 pt-2 px-1" : ""}}">
      <div class="w-full max-w-4xl 0 flex items-center justify-between px-4 py-3 sm:py-4">
         <a href="/" class="flex items-center gap-2 shrink">
            <image src="{{ asset('/images/duosdev.png')}}" width="44" height="44" />
            <div class="flex flex-col justify-center items-start">
               <p class="text-xl font-semibold tracking-wide">Duos Dev</p>
               <span class="text-[9px] -mt-1 italic">Tech and Solution</span>
            </div>
         </a>
         <div class="flex items-center gap-5 sm:gap-2 md:gap-4">
            <nav class="relative hidden sm:block dark:text-slate-400">
               <ul class="flex items-center gap-1 list-none">
                  <li><a href="/proyek" class="py-2 px-1 md:px-2  rounded text-sm leading-6  xl:text-base"><span>Proyek</span></a></li>
                  <li><a href="/harga" class="py-2 px-1 md:px-2 rounded text-sm leading-6  xl:text-base"><span>Harga</span></a></li>
                  <li><a href="/tentang-kami" class="py-2 px-1 md:px-2 rounded text-sm leading-6  xl:text-base"><span>Tentang Kami</span></a></li>
                  <li><a href="/artikel" class="p-2 rounded text-sm leading-6  xl:text-base hidden lg:block"><span>Artikel</span></a></li>
                  <li><a href="/kontak-kami" class="p-2 rounded text-sm leading-6  xl:text-base hidden lg:block"><span>Kontak Kami</span></a></li>
                  <li>
                     <button id="dropdownDividerButton" class="hidden sm:block lg:hidden" data-dropdown-toggle="dropdownDivider" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                     </button>
                     <!-- Dropdown menu -->
                     <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-800 dark:divide-slate-700">
                        <ul class="py-2 text-sm leading-6  text-slate-700 dark:text-slate-200 list-none" aria-labelledby="dropdownDividerButton" style="padding: 0 !important;">
                           <li>
                              <a href="/artikel" class="block px-4 py-2 text-slate-700 dark:text-slate-400">Artikel</a>
                           </li>
                           <li>
                              <a href="/kontak-kami" class="block px-4 py-2 text-slate-700 dark:text-slate-400">Kontak Kami</a>
                           </li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </nav>
            
            
            @auth
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex sm:hidden items-center text-sm leading-6  font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 dark:text-white" type="button">
    <span class="sr-only">Open user menu</span>

<div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>

</button>
            @endauth
            
            
            <button id="theme-toggle" type="button" class="  rounded-lg text-sm leading-6 ">
               <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
               </svg>
               <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
               </svg>
            </button>
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center text-sm leading-6   rounded-lg sm:hidden focus:outline-none">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-7 h-7" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
            @if(Auth::check())
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="hidden sm:flex items-center text-sm leading-6  font-medium rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 dark:text-white" type="button">
    <span class="sr-only">Open user menu</span>
<div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 mr-2">
    <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
</div>
    <span>{{Auth::user()->name}}</span>
    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm leading-6  text-gray-900 dark:text-white">
      <div class="font-medium ">{{Auth::user()->name}}</div>
      <div class="truncate">{{ Auth::user()->email}}</div>
    </div>
    <ul class="py-2 text-sm leading-6  text-gray-700 dark:text-gray-200 list-none" style="padding: 0 !important;" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
      <li>
        <a href="{{ route("dashboard")}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
      </li>
      <li>
        <a href="{{ route("profile.edit") }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil Saya</a>
      </li>
    </ul>
    <div class="py-2">
     <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="block px-4 py-2 text-sm leading-6  text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a></form>
      
    </div>
</div>

            @else
            <div class="truncate hidden sm:flex items-center gap-1 md:gap-2">
               <a href="{{route("login")}}" class="flex text-slate-100 dark:text-slate-700 bg-slate-800  dark:bg-slate-100 focus:outline-none font-medium text-xs px-3 py-2 text-center items-center justify-center rounded-full gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                     <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                  </svg>
                  <span>Login</span>
               </a>
               @if(Route::has("register"))
               <a href="{{route("register")}}" class="py-2 px-3 text-xs font-medium text-slate-900 focus:outline-none bg-white rounded-full border border-slate-200 hover:bg-slate-100 hover:text-blue-700 focus:z-10 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-600 dark:hover:text-white dark:hover:bg-slate-700 text-center flex items-center justify-center  gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                     <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                  </svg>
                  <span>Daftar</span>
               </a>
               @endif
            </div>
            @endif
         </div>
         <aside id="logo-sidebar" class="bg-white fixed sm:hidden top-0 left-0 z-[100] w-72 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <button type="button" data-drawer-hide="logo-sidebar" aria-controls="drawer-navigation" class="text-slate-700 dark:text-slate-400 rounded text-sm leading-6  absolute top-2.5 right-2.5 inline-flex items-center p-1.5 rounded" >
               <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
               </svg>
               <span class="sr-only">Close menu</span>
            </button>
            <div class=" h-full px-3 py-4 overflow-y-auto bg-slate-50 dark:bg-slate-950">
               <a href="/" class="flex items-center gap-2 shrink py-2">
                  <image src="{{ asset('/images/duosdev.png')}}" width="44" height="44" />
                  <div class="flex flex-col justify-center items-start text-slate-950 dark:text-slate-100">
                     <p class="text-xl font-semibold tracking-wide">Duos Dev</p>
                     <span class="text-[9px] -mt-1 italic">Tech and Solution</span>
                  </div>
               </a>
               <ul class="space-y-2 font-medium list-none" style="padding: 1rem 0 !important;">
                  @php
                  $sideMenus = [
                  [
                  "label" => "Proyek",
                  "url" => route("proyek"),
                  "icon" => '
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z" />
                  </svg>
                  '
                  ],
                                    [
                  "label" => "Harga",
                  "url" => "/harga",
                  "icon" => ' 
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                     <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z" clip-rule="evenodd" />
                  </svg>
                  '
                  ],
                                [
                  "label" => "Artikel",
                  "url" => "/artikel",
                  "icon" => '
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                  </svg>
                  '
                  ],
                  [
                  "label" => "Tentang Kami",
                  "url" => "/tentang-kami",
                  "icon" => '                    
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" />
                     <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" />
                     <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                  </svg>
                  '
                  ],
                  [
                  "label" => "Kontak Kami",
                  "url" => "/kontak-kami",
                  "icon" => '       
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
</svg>


                  '
                  ]
                  ];
                  
                  @endphp
                  @foreach($sideMenus as $key => $value)
                  <li>
                     <a href="{{$value["url"]}}" class="flex items-center p-2 text-slate-700 rounded-lg dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 group font-normal {{ Request()->routeIs(\Str::slug($value["label"])) ? 'bg-slate-200 dark:bg-slate-800' : ''}}">
                     {!!$value["icon"]!!}
                     <span class="ml-3">{{ $value["label"] }}</span>
                     </a>
                  </li>
                 
                  @endforeach
                  </ul>

                  @php
                  $sideMenusAuth = [
                  [
                  "label" => "Dashboard",
                  "url" => "/dashboard",
                  "icon" => '
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                     <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                  </svg>
                  '
                  ],
                  [
                  "label" => "Profil Saya",
                  "url" => route("profile.edit"),
                  "icon" => '
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                  </svg>
                  '
                  ],
                  ];
                  @endphp
                  @if(Auth::check())
                  <ul class="pt-4 font-medium border-t border-slate-200 dark:border-slate-700 flex flex-col gap-2 list-none" style="padding: 1rem 0 !important;">
                     @foreach($sideMenusAuth as $key => $value)
                     <li>
                        <a href="{{$value["url"]}}" class="flex items-center p-2 text-slate-700 rounded-lg dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 group font-normal">
                        {!!$value["icon"]!!}
                        <span class="ml-3">{{ $value["label"] }}</span>
                        </a>
                     </li>
                     @endforeach
                     <li>
                                             <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex items-center p-2 text-slate-700 rounded-lg dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 group font-normal ">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                  </svg>
                                <span class="ml-3">Keluar</span>
                            </a>
                        </form>
                     </li>
                  </ul>
               </ul>
               @else
               <ul class="py-6 space-y-2 font-medium border-t border-slate-200 dark:border-slate-700 flex flex-col gap-2 list-none" style="padding: 1rem 0 !important">
                  <li>
                     <a href="{{route("login")}}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium text-sm leading-6  px-5 py-2.5 text-center flex items-center justify-center rounded-full gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                           <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                        <span>Login</span>
                     </a>
                  </li>
                                 @if(Route::has("register"))
                  <li>
                     <a href="{{route("register")}}" class="py-2.5 px-5 text-sm leading-6  font-medium text-slate-900 focus:outline-none bg-white rounded-full border border-slate-200 hover:bg-slate-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-slate-200 dark:focus:ring-slate-700 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-600 dark:hover:text-white dark:hover:bg-slate-700 text-center flex items-center justify-center rounded-full gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                           <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                        </svg>
                        <span>Daftar</span>
                     </a>
                  </li>
                  @endif
               </ul>
               @endif
                            <ul class="py-6 space-y-2 font-medium border-t border-slate-200 dark:border-slate-700 flex flex-col gap-2 list-none" style="padding: 1rem 0 !important">
                           <li class="w-full flex items-center flex-wrap gap-4 mt-4 px-2 justify-center">
                <a href="mailto:duosdevofficial@gmail.com" class="p-2 rounded-full bg-blue-700 hover:bg-blue-800" class="rounded-full">
                 <img src="{{ asset("images/icon/email-d2.png") }}" alt="facebook" class="w-5 h-5"/>
                </a>
                                
                                <a href="https://www.github.com/duosdev" class="p-2 rounded-full bg-blue-700 hover:bg-blue-800">
                 <img src="{{ asset("images/icon/github-d2.png") }}" alt="facebook" class="w-5 h-5"/>
                </a>
                                <a href="https://instagram.com/duos_dev?igshid=OGQ5ZDc2ODk2ZA==" class="p-2 rounded-full bg-blue-700 hover:bg-blue-800">
                 <img src="{{ asset("images/icon/instagram-d2.png") }}" alt="facebook" class="w-5 h-5"/>
                </a>
                                <a href="https://facebook.com/profile.php?id=100088171750481" class="p-2 rounded-full bg-blue-700 hover:bg-blue-800">
                 <img src="{{ asset("images/icon/facebook-d2.png") }}" alt="facebook" class="w-5 h-5"/>
                </a>
<a href="https://api.whatsapp.com/send?phone=6285721557240&text=Halo%20Duos%20Dev" class="p-2 rounded-full bg-blue-700 hover:bg-blue-800">
                 <img src="{{ asset("images/icon/wa-d2.png") }}" alt="facebook" class="w-5 h-5"/>
                </a>
               </li>
               </ul>
         </div>
         </aside>
         </div>
      </header>
      {{ $slot }}
      @if(!Request()->routeIs("kontak-kami"))
     <section class="relative bg-blue-700 pt-10 md:pt-24 lg:pt-28">
<x-water-effect/>
      <div class="flex items-center flex-col justify-center gap-8 py-8 px-6">
         <div class="flex flex-col items-center justify-center text-slate-100 gap-1">
           <img src="{{ asset("images/icon/contact.png") }}" alt="about" class="w-12 h-12 mx-auto"/>
            <h1 class="text-2xl font-bold text-slate-100">Butuh Bantuan?</h1>
            <p class="text-center text-sm leading-6  text-slate-200 tracking-wide">Jangan ragu untuk menghubungi kami setiap hari 24 jam.</p>
         </div>
         <a href="{{route("kontak-kami")}}" class="text-teal-800 bg-teal-400 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full px-8 py-3 text-center mr-2 mb-2 text-xs flex items-center gap-2"><span>Hubungi Kami</span>            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
               <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg></a>
      </div>
   </section>
   @endif
      <footer @class(["relative border-blue-800 dark:border-slate-700 overflow-hidden bg-blue-800 dark:bg-transparent text-white", "pt-10 md:pt-24 lg:pt-28" => Request()->routeIs("kontak-kami"), "border-t" => !Request()->routeIs("kontak-kami")]) >
       @if(Request()->routeIs("kontak-kami"))
       <x-water-effect/>
       @endif
      <div class="px-4 py-16 flex flex-col gap-16 max-w-4xl mx-auto ">
         <div class="flex flex-col md:flex-row gap-6">
            <div class="flex flex-col gap-3 max-w-sm">
               <a href="{{route("home")}}" class="flex items-center gap-2 shrink py-2">
                  <image src="{{ asset('/images/duosdev.png')}}" width="44" height="44" />
                  <div class="flex flex-col justify-center items-start">
                     <p class="text-xl font-semibold tracking-wide">Duos Dev</p>
                     <span class="text-[9px] -mt-1 italic">Tech and Solution</span>
                  </div>
               </a>
               <p class="text-sm leading-6 tracking-wide text-slate-200 dark:text-slate-400">Duos Dev adalah brand usaha kami di bidang IT yang berlokasi di Cikijing - Majalengka dan memberikan layanan profesional dibekali tenaga ahli yang berpengalaman.</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 grow">
               <div class="flex flex-col gap-1.5">
                  <p class="text-sm leading-6  font-medium">Menu</p>
                  <ul class="list-none tracking-wide" style="padding: 0 !important;">
                     <li>
                        <a href="{{route("proyek")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Proyek</a>
                     </li>
                     <li>
                        <a href="{{route("harga")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Harga</a>
                     </li>
                     
                     <li>
                     <a href="{{route("tentang-kami")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Tentang Kami</a>
                     </li>
<li>
                     <a href="{{route("artikel")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Artikel</a>
                     </li>
                     <li>
                        <a href="{{route("kontak-kami")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Kontak Kami</a>
                     </li>
                  </ul>
               </div>
               <div class="flex flex-col gap-1.5">
                  <p class="text-sm leading-6  font-medium">Kontak</p>
                  <ul class="list-none tracking-wide" style="padding: 0 !important;">
                     <li>
                        <a href="mailto:duosdevofficial@gmail.com" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Email</a>
                     </li>
                     <li>
                        <a href="https://www.github.com/duosdev" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Github</a>
                     </li>
                     <li>
                        <a href="https://instagram.com/duos_dev?igshid=OGQ5ZDc2ODk2ZA==" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Instagram</a>
                     </li>
                     <li>
                        <a href="https://facebook.com/profile.php?id=100088171750481" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Facebook</a>
                     </li>
                     </li>
                     <a href="https://api.whatsapp.com/send?phone=6285721557240&text=Halo%20Duos%20Dev" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">WhatsApp</a>
                     </li>
                  </ul>
               </div>
               <div class="flex flex-col gap-1.5">
                  <p class="text-sm leading-6  font-medium">Legal</p>
                  <ul class="list-none tracking-wide" style="padding: 0 !important;">
                     <li>
                        <a href="{{route("kebijakan-privasi")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Kebijakan Privasi</a>
                     </li>
                     <li>
                        <a href="{{route("penggunaan-cookies")}}" class="text-slate-200 dark:text-slate-400 text-sm leading-6  ">Penggunaan Cookies</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <p class="text-center tracking-wide text-xs text-slate-200 dark:text-slate-400">© 2023 Duos Dev. All Rights Reserved</p>
         <div class="hidden dark:block bg-gradient-to-tr from-blue-600 via-transparent to-transparent w-[800px] h-[800px] absolute -bottom-[200px] -left-[200px] rounded-full -z-10 blur-3xl opacity-50">
         </div>
         <div class="hidden dark:block bg-blue-600  w-[200px] h-[200px] absolute bottom-[50px] -right-[50px] rounded-full -z-10 blur-3xl opacity-10">
         </div>

      </footer>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>     --}}
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
      <script>
         // keep track of previous scroll position
         let prevScrollPos = window.pageYOffset;
         
         window.addEventListener('scroll', function() {
         // current scroll position
         const currentScrollPos = window.pageYOffset;
         let navbar = document.querySelector('.navbar')
         
         
         if(currentScrollPos < 40){
          navbar.classList.remove('border-b'); 
         navbar.classList.remove('bg-white/80');
         navbar.classList.remove('dark:bg-slate-950/80');
         navbar.classList.remove('backdrop-blur-sm');
         
         @if(Request()->routeIs("home"))
         navbar.classList.add("text-slate-100", "pt-2", "px-1")
         @endif
         
       
         }else if(prevScrollPos < currentScrollPos) {
         // user has scrolled up
         navbar.classList.add("hidden")
         
         
         } else {
         // user has scrolled down

         navbar.classList.remove("hidden")
         navbar.classList.add('border-b');
         navbar.classList.add('bg-white/80');
         navbar.classList.add('dark:bg-slate-950/80');
         navbar.classList.add('backdrop-blur-sm');
         navbar.classList.remove('text-slate-100', "pt-2", "px-1")
         }
         
         // update previous scroll position
         prevScrollPos = currentScrollPos;
         });
      </script>
   </body>
</html>