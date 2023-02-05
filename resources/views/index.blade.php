<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/img/kenali.png') }}" type="image/x-icon">
    <title>{{$title}}</title>
</head>
<body class="dark:bg-stone-900 ">
    <div id="wrapper">
        <nav class="p-5 w-full z-50 bg-transparent md:p-1 p-5 drop-shadow-lg md:flex md:justify-between absolute top-0 ">
            <div class="flex justify-between items-center">
                <span class="text-2xl font-[Poppins] cursor-pointer">
                   <a href="{{ route('/')}}">
                     <img class="h-10 object-fill w-01 block h-02 py-2"
                      src="{{asset('assets/img/logo.png')}}">
                   </a>
                  </span>
                  <span class="text-3xl cursor-pointer mx-2 md:hidden block z-50">
                    <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
                  </span>
            </div>
            <ul class="md:flex p-5 md:items-center absolute  md:w-auto w-full left-0 py-6 md:z-auto drop-shadow-lg top-0 md:opacity-100 bg-white md:bg-transparent md:static  md:py-0 py-4 md:pl-0 pl-7 opacity-0">
                <li class="text-lg tracking-wide  font-ubuntu text-base mx-4 my-6 md:my-0">
                    <a href="#lapor">Lapor</a>
                </li>
                <li class="text-lg tracking-wide font-ubuntu text-base mx-4 my-6 md:my-0">
                    <a href="#cek">Cek Kebenaran Loker</a>
                </li>
                <li class="text-lg tracking-wide  font-ubuntu text-base mx-4 my-6 md:my-0">
                   <button class="cursor-pointer" id="mode" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sun">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                      </svg> 
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden mon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                      </svg>
                                                  
                   </button>
                </li>
              </ul>
        </nav>

        <div class="mb-10 md:mb-2 min-h-screen relative dark:bg-stone-900  dark:text-white">
           <div class="relative inline-block">
                <header>
                    <img src="{{ asset('assets/img/8.png') }}" class="max-w-full h-auto"/>
                </header>
               <div class="top-10 w-full absolute ">
                    <div class="grid grid-cols-1 gap-4 w-full md:grid-cols-2 content-center">
                        <div class="relative">
                            <header class="w-24 left-5 overflow-hidden mt-5 mb-1">
                                <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-11 h-20 right-8 relative">
                            </header>
                            <div class="p-2 h-auto">
                                <img src="{{ asset('assets/img/fake.png') }}" alt="gambar" class="p-1 w-full pl-9 object-center object-cover block md:hidden " >
                                <header class="relative top-[-96px] md:top-0">
                                    <div class=" block md:flex items-center h-96">
                                        <h1 class="text-center tracking-wide font-roboto leading-9 text-sm 2xl:text-2xl xl:text-xl md:text-xl uppercase">kebenaran lowongan kerja adalah untuk mengecek atau validasi sebuah alamat perusahaan yang sedang membuka lowongan kerja.</h1>
                                        <div class="absolute w-full overflow-hidden top-44 md:top-56 lg:top-56 sm:top-44">
                                            <a href="#cek" class="bg-sky-400 cursor-pointer p-2 w-80 rounded h-11 text-center mx-auto block md:text-xl text-base font-popin text-white mt-10">Cek Kebenaran Alamat Loker</a>
                                        </div>
                                    </div>
                                    <header class="flex justify-end relative top-[-50px] lg:top-24  sm:top-[-200px] mb-10">
                                        <img src="{{asset('assets/img/bulatindex.png')}}" alt="gambar" class="h-20 block 2xl:block lg:hidden md:hidden">
                                    </header>
                                </header>
                            </div>
                        </div>
                        <div class="hidden md:block flex justify-center block">
                            <img src="{{ asset('assets/img/fake.png') }}" alt="gambar" class="p-1 min-w-full pl-9 object-center object-cover fakewal" >
                        </div>
                    </div>
               </div>
           </div>
        </div>

        <div class="mb-5 relative top-20 p-4 dark:bg-stone-900 dark:text-whte">
            <h1 class="w-4/12 text-center font-bold text-5xl p-2 font-ubuntu tracking-tight capitalize md:text-7xl z-50 relative dark:text-white">kenali Lowongan Palsu</h1>
            <header class="absolute top-5 md:right-10 p-2 px-5 left-5">
                <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-24">
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-2">
                <div class="md:flex md:justify-center items-center">
                    <img src="{{ asset('assets/img/kenali.png') }}" alt="gambar" class="h-3/4 object-cover">
                 </div>
                <div class="relative overflow-hidden">
                    <div class="flex justify-end mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-right text-white">penulisan yang buruk pada undangan</p>
                        </div>
                    </div>
                    <div class="flex justify-start mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-left text-white">Domain perusahaan meragukan</p>
                        </div>
                    </div>
                    <div class="flex justify-end mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-right text-white">Nama dan alamat kantor tidak jelas</p>
                        </div>
                    </div>
                    <div class="flex justify-start mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-left text-white">Perusahaan mengirimkan email mencurigakan</p>
                        </div>
                    </div>
                    <div class="flex justify-end mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-right text-white">perekrut meminta jumlah uang</p>
                        </div>
                    </div>
                    <div class="flex justify-start mb-10 block relative z-50">
                        <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3">
                           <p class="capitalize text-sm md:text-xl font-roboto float-left text-white">Domain perusahaan meragukan</p>
                        </div>
                    </div>
                    <header class="h-auto flex justify-end top-0 p-1 px-3 absolute w-full ">
                        <img src="{{asset('assets/img/orang.png')}}" alt="gambar" class="block w-auto blur-sm bg-no-repeat contrast-100 orangkenal">
                    </header>
                    <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-24 relative left-20 blue-sm">
                </div>
            </div>
        </div>
        <div class="relative mb-5 top-20">
            <img src="{{ asset('assets/img/5.png') }}" alt="gambar" class="bg-cover h-full bg-no-repeat min-h-screen mb-28">
            <div class="absolute top-0 w-full p-3 px-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap- flex items-center">
                    <div class="static block h-auto block md:hidden ">
                        <h1 class="text-4xl md:text-6xl font-ubuntu text-center capitalize w-8/12 block w-50 mx-auto text-black md:mb-5 font-bold">Menghindari lowongan palsu</h1>
                        <img src="{{ asset('assets/img/4.png') }}" alt="gambar3" class="w-full bg-cover block flex justify-center relative z-50">
                        <header class="flex justify-end inline-block relative -top-20 px-5 p-2">
                            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-10 h-20 right-8 relative">
                        </header>
                    </div>
                    <div class="h-auto relative md:top-0 -top-36 md:p-0 p-2 ">
                        <h3 class="font-bebas text-base md:text-2xl capitalize text-white leading-tight">Berikut beberapa tips dari Kami yang bisa kamu bisa lakukan agar bisa menjadi pelamar kerja yang cermat dan terhindar dari lowongan kerja palsu:</h3>
                        <ul class="mt-5 leading-tight ">
                            <li class="p-1 mb-1 md:mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Baca detail setiap informasi lowongan kerja</p>
                            </li>
                            <li class="p-1 mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Cek domain alamat email dan website</p>
                            </li>
                            <li class="p-1 mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Waspada jika Dipungut Biaya</p>
                            </li>
                            <li class="p-1 mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Waspada jika Diminta Data Pribadi</p>
                            </li>
                            <li class="p-1 mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Cek kembali lowongan kerja</p>
                            </li>
                            <li class="p-1 mb-3 flex md:block">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-base md:text-xl h-7">
                                </i>
                                <p class="md:inline-block inline relative left-2 text-white font-roboto text-base md:text-xl ">Kunjungi Situs & Medsos Resmi Perusahaana</p>
                            </li>
                        </ul>
                    </div>
                    <div class="static inline-block h-auto hidden md:block">
                        <h1 class="text-5xl md:text-6xl font-ubuntu text-center mt-12 capitalize w-9/12 block w-50 mx-auto text-white mb-5 font-bold">Menghindari lowongan palsu</h1>
                        <img src="{{ asset('assets/img/4.png') }}" alt="gambar3" class="w-full bg-cover block flex justify-center">
                        <header class="flex justify-end inline-block relative -top-28 px-5 p-2">
                            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-11 h-20 right-8 relative">
                        </header>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-5 p-3 bg-zinc-100 dark:bg-stone-900" id="cek">
            <h1 class="capitalize text-center leading-10 tracking-tight text-4xl font-bold font-ubuntu mb-5 dark:text-white">Cek kebenaran alamat<br> lowongan kerja</h1>
            <div class="relative w-4/6 mx-auto p-1 block mb-10">
            <label for="cekalamat" class="font-roboto text-xl tracking-widest block mb-3">Cek Alamat : </label>
            <input id="carialamat" placeholder="Cari Kebenaran Alamat Lowongan Kerja..." type="search" class="bg-white p-2 w-full rounded-md border border-slate-400 focus:outline-none focus:shadow-outline shadow appearance-none leading-tight text-base px-3 pr-3 h-12 drop-shadow-md" name="carialamat" required>
            </div>
            <div class="w-11/12 mx-auto p-1 px-2 alamatshow hidden">
                <div class="bg-white shadow-lg hover:shadow-xl rounded-md overflow-hidden">
                   <div class="x-4 sm:px-4 sm:py-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <header id="load" class="flex justify-center">
                            <img src="{{asset('assets/img/load.gif')}}" alt="load" class="w-20">
                        </header>
                        <table class="min-w-full leading-normal w-full p-2">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bebas text-gray-700 uppercase tracking-wider">Nama Perusahaan</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bebas text-gray-700 uppercase tracking-wider">alamat</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bebas text-gray-700 uppercase tracking-wider">status kebenaran</th>
                                </tr>
                            </thead>
                            <tbody id="showalamat" class="p-3"></tbody>
                        </table>
                    </div>
                   </div>
                </div>           
            </div>
        </div>
        
        <div class="mb-5 relative bg-gray-50 p-2 dark:bg-stone-900 dark:text-white" id="lapor">
            <div class="w-11/12 mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/img/6.png') }}" alt="gambar" class="w-8/12">                 
                    </div>
                    <div class="p-2">
                        <h1 class="text-4xl md:text-6xl font-ubuntu text-center capitalize  mb-2 font-bold ">Pengaduan</h1>
                        <p class="capitalize text-xl font-roboto text-center ">Apabila Alamat yang anda cari tidak ada,silakan daftar formulir yang telah kami sediakan beserta laporan url apabila alamat tersebut hoax</p>
                        <div class="flex justify-center mt-5">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap ">
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Status</label>
                                      <select class="w-full h-10 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 lg:h-12 leading-8 transition-colors duration-200 ease-in-out dark:bg-white">
                                        <option>Pilih Status</option>
                                        <option>Hoax</option>
                                        <option>Real</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="message" class="leading-7 text-sm text-gray-600 dark:text-white">Alamat</label>
                                      <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out lg:w-full dark:bg-white"></textarea>
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <button class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Kirim</button>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden" id="resetpas"></div>
        </div>
        <hr>
        <footer class="bg-slate-200 text-zinc-700 font-xl tracking-widest leading-4 mt-3 text-center p-5 font-ubuntu dark:text-white dark:bg-stone-900">&copy;Kebenaran</footer>
    </div>
    <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js')}}"></script>
    
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    <script src="{{asset('js/animasi.min.js')}}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script type="text/javascript">
    anime({
        targets: '.orangkenal',
        translateX: 150,
        direction: 'alternate',
        loop: true,
        easing: 'linear'
    });
    anime({
        targets: '.fakewal',
        translateY: 150,
        direction: 'alternate',
        loop: true,
        easing: 'linear'
    });
    </script>
</body>
</html>