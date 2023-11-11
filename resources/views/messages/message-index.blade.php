<x-app-layout>

<div>

<!-- Breadcrumb -->

<nav class="flex mb-8" aria-label="Breadcrumb">
  <ol class="list-none inline-flex items-center space-x-1 md:space-x-3">
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
        <a href="{{ route("messages.index")}}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2 dark:text-slate-400 dark:hover:text-white">Inbox</a>
      </div>
    </li>

  </ol>
</nav>

<div class="mb-8">
<h1 class="text-2xl font-medium">Tabel Inbox</h1>
</div>

  <div class="mb-2 flex items-center gap-2">
  
<form class="w-full" method="GET" action="{{ route("messages.index")}}">   
    <label for="search" class="mb-2 text-sm font-medium text-slate-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-slate-900 border border-slate-300 rounded-full bg-slate-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari nama" >
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
    </div>
</form>
</div>

<div class="mb-2 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
            <tr>
                            <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Dari
                </th>
                                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                                <th scope="col" class="px-6 py-3">
                    Pesan
                </th>
                                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
        @if(count($messages) > 0)
        @foreach($messages as $key => $message)
            <tr class="bg-white border-b dark:bg-slate-900 dark:border-slate-700">
             <td class="px-6 py-4">
                    {{ $key + 1 }}
                </td>
<th scope="row" class="flex items-center px-6 py-4 text-slate-900 whitespace-nowrap dark:text-white">

                        <p class="text-base font-semibold">{{$message->name}}</p>

                   
                </th>
                                <td class="px-6 py-4">
                                 {{ $message->email}}
                                 </td>
                                 
                                  <td class="px-6 py-4">
                                 {{ $message->messages}}
                                 </td>

             
                <td class="px-6 py-4">
                
<button id="dropdownMenuIconHorizontalButton-{{$message->id}}" data-dropdown-toggle="dropdownDotsHorizontal-{{$message->id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-slate-900 bg-white rounded-lg hover:bg-slate-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-slate-50 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus:ring-slate-600" type="button"> 
  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
  </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownDotsHorizontal-{{$message->id}}" class="z-10 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-700 dark:divide-slate-600 border border-e-slate-300 dark:border-slate-800">
    <ul class="list-none py-2 text-sm text-slate-700 dark:text-slate-200" aria-labelledby="dropdownMenuIconHorizontalButton-{{$message->id}}">
          <li>
        <a href="{{ route("messages.show", $message)}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

<span>Detail</span></a>
      </li>
      


                                   

                                    <button type="button"  data-modal-target="popup-modal-{{$message->id}}" data-modal-toggle="popup-modal-{{$message->id}}" class="w-full block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg>
<span>Hapus</span></button>
                        

      </li>
      
    </ul>

</div>
                </td>
            </tr>
            
            
                                    <div id="popup-modal-{{$message->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$message->id}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
           
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-3 text-lg font-normal text-gray-900 dark:text-gray-100">Apakah anda yakin ingin menghapus inbox {{$message->name}}?</h3>
                <div class="flex gap-2 items-center justify-center">
                         <form method="POST" action="{{ route('messages.destroy', $message) }}" >
                            @csrf
                                        @method('delete')
                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                </form>
                <button data-modal-hide="popup-modal-{{$message->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button></div>
            </div>
        </div>
    </div>
</div>
            @endforeach
            @else
            <tr class="bg-white border-b dark:bg-slate-900 dark:border-slate-700">
              <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-400" colspan="6">
              <p class="text-center">Belum ada data.</p>
              </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div>{{ $messages->links() }}</div>



</x-app-layout>


