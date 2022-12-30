<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>{{$title}}</title>
</head>
<body>
    <div id="wrapper">
        <nav class="p-5 w-full z-50 bg-transparent md:p-1 p-5 drop-shadow-lg md:flex md:justify-between absolute top-0">
            <div class="flex justify-between items-center">
                <span class="text-2xl font-[Poppins] cursor-pointer">
                    <img class="h-10 inline"
                      src="">
                    Kebenaran
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
                    <a href="#">drak mode</a>
                </li>
              </ul>
        </nav>

        <div class="mb-10 md:mb-2 min-h-screen relative ">
           <div class="relative inline">
                <header>
                    <img src="{{ asset('assets/img/8.png') }}" class="max-w-full h-auto"/>
                </header>
               <div class="absolute top-10 w-full">
                    <div class="grid grid-cols-1 gap-4 w-full md:grid-cols-2 content-center">
                        <div class="block">
                            <header class="w-24 left-5 overflow-hidden mt-5 mb-1">
                                <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-11 h-20 right-8 relative">
                            </header>
                            <div class="p-2 h-auto">
                                <img src="{{ asset('assets/img/fake.png') }}" alt="gambar" class="p-1 w-full pl-9 object-center object-cover block md:hidden" >
                                <header class="relative top-[-96px] md:top-0">
                                    <div class=" block md:flex items-center h-96">
                                        <h1 class="text-center tracking-wide font-bebas leading-9 text-sm md:text-2xl">aLorem ipsum dolor sit amet consectetur adipisicing elit. Atque eligendi quam, unde reprehenderit distinctio ipsam est repellendus eius molestias perferendis architecto optio quasi ullam repudiandae officiis in odio ea. Praesentium!</h1>
                                        <div class="absolute w-full overflow-hidden top-44 md:top-56 lg:top-72 sm:top-24">
                                            <a href="#cek" class="bg-sky-400 cursor-pointer p-2 w-80 rounded h-11 text-center mx-auto block md:text-xl text-base font-popin text-white mt-10">Cek Kebenaran Alamat Loker</a>
                                        </div>
                                    </div>
                                    <header class="flex justify-end relative top-[-50px] lg:top-24  sm:top-[-200px] mb-10">
                                        <img src="{{asset('assets/img/bulatindex.png')}}" alt="gambar" class="h-20">
                                    </header>
                                </header>
                            </div>
                        </div>
                        <div class="hidden md:block flex justify-center block">
                            <img src="{{ asset('assets/img/fake.png') }}" alt="gambar" class="p-1 min-w-full pl-9 object-center object-cover" >
                        </div>
                    </div>
               </div>
           </div>
        </div>

        <div class="mb-5 relative top-20 p-4 ">
            <h1 class="w-4/12 text-center font-bold text-5xl p-2 font-ubuntu tracking-tight capitalize md:text-7xl z-50 relative">kenali Lowongan Palsu</h1>
            <header class="absolute top-5 md:right-10 p-2 px-5 left-5">
                <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-24">
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-2">
                <div class="md:flex md:justify-center block">
                    <img src="{{ asset('assets/img/kenali.png') }}" alt="gambar" class="w-screen relative left-0 md:max-w-md md:w-full bg-cover">
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
                        <img src="{{asset('assets/img/orang.png')}}" alt="gambar" class="block w-auto blur-sm bg-no-repeat contrast-100">
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

        <div class="mb-5 p-3 bg-zinc-100" id="cek">
            <h1 class="capitalize text-center leading-10 tracking-tight text-4xl font-bold font-ubuntu mb-5">Cek kebenaran alamat<br> lowongan kerja</h1>
            <div class="relative w-4/6 mx-auto p-1 block mb-10">
            <label for="cekalamat" class="font-roboto text-xl tracking-widest block mb-3">Cek Alamat : </label>
            <input id="carialamat" placeholder="Cari Kebenaran Alamat Lowongan Kerja..." type="search" class="bg-white p-2 w-full rounded-md border border-slate-400 focus:outline-none focus:shadow-outline shadow appearance-none leading-tight text-base px-3 pr-3 h-12 drop-shadow-md" name="carialamat" required>
            </div>
            <div class="w-11/12 mx-auto p-1 px-2 alamatshow hidden">
                <div class="bg-white shadow-lg hover:shadow-xl rounded-md overflow-hidden">
                    <table class="table flex table-auto w-full leading-normal">
                        <thead class="uppercase text-gray-600 text-xs font-semibold bg-gray-200">
                            <tr class="hidden md:table-row">
                            <th class="text-left p-3">
                                <p>Nama Perusahaan</p>
                            </th>
                            <th class="text-left p-3">
                                <p>Alamat</p>
                            </th>
                            <th class="text-right p-3">
                                <p>Status</p>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 text-gray-700 sm:flex-none showalamat p-2" id="showalamat">
                        </tbody>
                    </table>
                </div>           
            </div>
        </div>

        <div class="mb-5 relative bg-gray-50 p-2" id="lapor">
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
                                  <div class="p-2 w-1/2 ">
                                    <div class="relative">
                                      <label for="name" class="leading-7 text-sm text-gray-600">Nama Perusahaan</label>
                                      <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2">
                                    <div class="relative">
                                      <label for="email" class="leading-7 text-sm text-gray-600">Status</label>
                                      <select class="w-full h-10 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 lg:h-12 leading-8 transition-colors duration-200 ease-in-out ">
                                        <option>Pilih Status</option>
                                        <option>Hoax</option>
                                        <option>Real</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="message" class="leading-7 text-sm text-gray-600">Url</label>
                                        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="message" class="leading-7 text-sm text-gray-600">Alamat</label>
                                      <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out lg:w-full"></textarea>
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <button class="flex  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Kirim</button>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer class="bg-slate-200 text-zinc-700 font-xl tracking-widest leading-4 mt-3 text-center p-5 font-ubuntu">&copy;Kebenaran</footer>
    </div>
    <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js')}}"></script>
    
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    
    <script src="{{ asset('js/styles.js') }}"></script>
</body>
</html>