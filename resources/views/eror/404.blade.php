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
    <title>404 Not Found</title>
</head>
<body>
  <div class="p-5 py-3 h-screen flex items-center">
    <div class="w-8/12 mx-auto p-2 py-3">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="rounded bg-tranparent">
                <img src="{{asset("assets/img/404not.png")}}" alt="404">
            </div>
            <div class="flex items-center p-1 relative justify-center">
               <h3 class="capitalize text-xl text-center tracking-wider font-roboto block absolute md:text-xl sm:text-xl lg:text-xl 2xl:text-4xl">maaf,halaman yang anda cari tidak ada</h3>
               <a href="{{route('/')}}" class="bg-green-600 text-white p-2 rounded text-2xl font-bebas capitalize tracking-wider leading-6 mt-36 ">kembali</a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>