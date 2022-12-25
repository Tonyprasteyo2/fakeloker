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
        <nav class="p-3 w-full justify-between items-center absolute z-50">
            <div class="flex justify-between w-11/12 mx-auto items-center">
                <div class="justify-between sm:py-0">
                    <p>judul</p>
                </div>
                <button class='text-blue-300 text-3xl sm:hidden block focus:outline-none block' id='navIcon'>
                    &#9776;
                </button>
                  <ul class="hidden sm:flex cursor-pointer justify-between" id="menu">
                    <li class="text-lg tracking-wide px-3 font-ubuntu text-base">
                        <a href="#">About</a>
                    </li>
                    <li class="text-lg tracking-wide px-3 font-ubuntu text-base">
                        <a href="#">Cek Kebenaran Loker</a>
                    </li>
                    <li class="text-lg tracking-wide px-3 font-ubuntu text-base">
                        <a href="#">drak mode</a>
                    </li>
                  </ul>
            </div>

           {{-- mobile menu --}}
           <div id="mobileMenu" class="hidden flex w-full mx-auto py-8 text-center md:hidden">
            <div class="flex flex-col justify-center items-center w-full">
            <a href="#" class="block text-gray-200 cursor-pointer py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Home</a>
            <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">About</a>
            <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Blog</a>
              <a href="#" class="block text-gray-200 cursor-pointer mt-1 py-3 transition duration-300 focus:outline-none focus:text-yellow-500 focus:underline hover:underline hover:text-yellow-500" style="text-underline-offset: 8px;">Contact</a>
              </div>
          </div>
        </nav>

        
        <header class="relative">
            <img src="{{ asset('assets/img/bg.png') }}" class="w-full"/>
            <div class="relatve absolute top-0 w-full flex items-center h-auto mt-14">
                <div class="grid grid-cols-1 gap-4 w-full md:grid-cols-2 content-center">
                    <div class="relative">
                        <header class="w-24 left-5 overflow-hidden mt-5 mb-1">
                            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-11 h-20 right-8 relative">
                        </header>
                        <div class="p-3 py-4 flex items-center h-60 mt-20 justify-center">
                           <h1 class="text-center text-2xl tracking-wide font-bebas leading-9">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque eligendi quam, unde reprehenderit distinctio ipsam est repellendus eius molestias perferendis architecto optio quasi ullam repudiandae officiis in odio ea. Praesentium!</h1>
                        </div>
                        <a href="#cek" class="bg-sky-400 cursor-pointer p-2 w-96 rounded h-11 text-center mx-auto block text-xl font-popin text-white">Cek Kebenaran Alamat lowongan kerja</a>
                        <header class="relative top-28 flex justify-end">
                            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-20">
                        </header>
                    </div>
                    <div class="flex justify-center p-2">
                        <img src="{{ asset('assets/img/fake.png') }}" alt="gambar" class="p-1 min-w-full pl-9 object-center object-cover" >
                    </div>
                  </div>
            </div>
        </header>
        
        <div class="p-4 relative ">
           <h1 class="w-4/12 text-center font-bold text-7xl p-2 font-ubuntu tracking-tight capitalize">kenali Lowongan Palsu</h1>
           <header class="absolute top-5 right-10 p-2 px-5">
            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-24">
           </header>
           <div class="grid grid-cols-2 gap-4 p-2">
            <div class="flex justify-center h-screen">
               <header class="flex items-center block">
                <img src="{{ asset('assets/img/kenali.png') }}" alt="gambar" class="w-9/12 relative left-20">
               </header>
            </div>
            <div class="inline relative top-1">
                <div class="flex justify-end mb-10 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                       <p class="capitalize text-xl font-roboto float-right text-white">penulisan yang buruk pada undangan</p>
                    </div>
                </div>
                <div class="flex justify-start mb-10 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3">
                       <p class="capitalize text-xl font-roboto float-left text-white">Domain perusahaan meragukan</p>
                    </div>
                </div>
                <div class="flex justify-end mb-10 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                       <p class="capitalize text-xl font-roboto float-right text-white">Nama dan alamat kantor tidak jelas</p>
                    </div>
                </div>
                <div class="flex justify-start mb-10 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3">
                       <p class="capitalize text-xl font-roboto float-left text-white">Sumber Tidak Valid</p>
                    </div>
                </div>
                <div class="flex justify-end mb-10 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-l-full mt-3">
                       <p class="capitalize text-xl font-roboto float-right text-white">Perusahaan mengirimkan email mencurigakan</p>
                    </div>
                </div>
                <div class="flex justify-start mb-5 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3 ">
                       <p class="capitalize text-xl font-roboto float-left text-white">perekrut meminta jumlah uang</p>
                    </div>
                </div>
                <div class="flex justify-end mb-5 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3 ">
                       <p class="capitalize text-xl font-roboto float-left text-white">perekrut meminta jumlah uang</p>
                    </div>
                </div>
                <div class="flex justify-start mb-5 block relative z-50">
                    <div class="p-3 px-3 bg-sky-400 w-auto rounded-r-full mt-3 ">
                       <p class="capitalize text-xl font-roboto float-left text-white">perekrut meminta jumlah uang</p>
                    </div>
                </div>
                <header class="h-auto flex justify-end top-0 p-1 px-3 absolute w-full">
                    <img src="{{asset('assets/img/orang.png')}}" alt="gambar" class="block w-11/12 blur-sm bg-no-repeat contrast-100">
                </header>
                <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="h-24 relative left-20 blue-sm">
            </div>
           </div>
        </div>

        <div class="relative mb-5 h-auto overflow-hidden">
            <img src="{{ asset('assets/img/5.png') }}" alt="gambar" class="bg-cover w-full bg-no-repeat">
            <div class="absolute top-0 w-full p-3 px-10">
                <div class="grid grid-cols-2 gap-2 flex items-center">
                    <div class="h-auto">
                        <h3 class="font-bebas text-2xl capitalize text-white leading-tight">Berikut beberapa tips dari Kami yang bisa kamu bisa lakukan agar bisa menjadi pelamar kerja yang cermat dan terhindar dari lowongan kerja palsu:</h3>
                        <ul class="mt-5 leading-tight block">
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Baca detail setiap informasi lowongan kerja</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Cek domain alamat email dan website </p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Waspada jika Dipungut Biaya</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Waspada jika Diminta Data Pribadi</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Cek kembali lowongan kerja</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Jangan tergiur dengan gaji yang besar dan masuk tanpa tes</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Cari Tahu Informasi Posisi Secara Spesifik</p>
                            </li>
                            <li class="p-1 mb-3">
                                <i class="fa fa-check bg-green-500 inline-block rounded-lg text-center p-1 text-white text-xl">
                                </i>
                                <p class="inline-block relative left-2 text-white font-roboto text-xl">Kunjungi Situs & Medsos Resmi Perusahaan</p>
                            </li>
                        </ul>
                    </div>
                    <div class="static inline-block h-auto">
                        <h1 class="text-6xl font-ubuntu text-center mt-12 capitalize w-9/12 block w-50 mx-auto text-white mb-5 font-bold">Menghindari lowongan palsu</h1>
                        <img src="{{ asset('assets/img/4.png') }}" alt="gambar3" class="w-full bg-cover block flex justify-center">
                        <header class="flex justify-end inline-block relative -top-28 px-5 p-2">
                            <img src="{{asset('assets/img/bulatindex.png')}}" alt="" class="mt-11 h-20 right-8 relative">
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="cek" class=" mt-5 h-auto p-3 bg-zinc-100">
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
                  <tbody class="flex-1 text-gray-700 sm:flex-none showalamat" id="showalamat">
                  </tbody>
                </table>
              </div>           
           </div>
        </div>
        <div class="mt-5 h-auto relative">
            <img src="{{ asset('assets/img/7.png') }}" alt="gambar" class="w-full">
            <div class="mx-auto absolute top-0 w-full p-2">
                <div class="w-11/12 mx-auto gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <img src="{{ asset('assets/img/6.png') }}" alt="gambar" class="w-8/12">
                            <h1 class="text-6xl font-ubuntu text-center mt-12 capitalize w-9/12 block w-50 mx-auto mb-5 font-bold ">Pengaduan</h1>
                            <p class="capitalize text-xl font-roboto relative right-0 block text-center w-8/12">Apabila Alamat yang anda cari tidak ada,silakan daftar formulir yang telah kami sediakan beserta laporan url apabila alamat tersebut hoax</p>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="bg-white rounded-lg p-3 w-10/12">
                                <form>
                                    <div class="mb-3">
                                        <label for="judul" class="font-roboto  ">Nama Perusahaan :</label>
                                        <input type="text" class="bg-white p-2 w-full rounded-md border border-slate-400 focus:outline-none focus:shadow-outline shadow appearance-none leading-tight text-base px-3 pr-3 h-12 drop-shadow-md" placeholder="masukan nama perusahan">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="mb-3">
                                            <label for="judul" class="font-roboto  ">Url Bukti:</label>
                                            <input type="text" class="bg-white p-2 w-full rounded-md border border-slate-400 focus:outline-none focus:shadow-outline shadow appearance-none leading-tight text-base px-3 pr-3 h-12 drop-shadow-md">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="font-roboto">Status :</label>
                                            <select class="bg-white p-2 w-full rounded-md border border-slate-400 focus:outline-none focus:shadow-outline shadow appearance-none">
                                                <option>Pilih</option>
                                                <option>Hoax</option>
                                                <option>Real</option>
                                                <option>Waspada/Hati-Hati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="font-roboto ">Alamat:</label>
                                        <textarea class="alamatptnew mb-3" name="alamatptnew"></textarea>
                                    </div>
                                    <button class="bg-sky-500 text-white rounded p-2 font-roboto text-sm w-28">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer class="bg-slate-200 text-zinc-700 font-xl tracking-widest leading-4 mt-3 text-center p-5 font-ubuntu">&copy;Wibunisme</footer>
    </div>
    <script src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
    CKEDITOR.replace('alamatptnew',{
        width:'100%',
        resize:true
    });
    </script>
    <script src="{{ asset('js/styles.js') }}"></script>
</body>
</html>