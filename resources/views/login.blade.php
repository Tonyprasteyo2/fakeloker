<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="h-screen flex items-center">
        <div class="bg-white w-3/4 mx-auto rounded drop-shadow-2xl">
            <div class="grid grid-cols-1 gap-1 md:grid-cols-2 h-auto">
                <div class="logo_wallpaper p-1 relative">
                    <div class="w-11">
                        <a href="/"><img src="{{ asset('assets/img/back.png')}}" class="w-11 px-1 relative"/></a>
                    </div>
                    <header>
                        <img src="{{ asset('assets/img/icon_login.png') }}" class="w-100 relative bg-cover mx-auto"/>
                    </header>
                    <img class="absolute top-20 right-0 py-1 px-2 w-20 bg-cover " src="{{ asset('assets/img/bulat.png') }}"/>
                    <h1 class="text-center p-3 text-6xl tracking-tighter " style="margin-top:-35px;">Welcome Back</h1>
                    <p class="text-center p-3 text-xl font-sans tracking-tighter " style="margin-top: -10px;">Nice to see again</p>
                </div>
                <div class="p-2 d-block">
                    <div class="h-full flex items-center">
                        <div class="w-full p-5">
                            <h2 class="text-4xl mb-5">Login,</h2>
                            <div id="alert"></div>
                            <form method="POST" class="login">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-lg font-bold mb-2" for="username">Email</label>
                                    <input type="text" name="email" class="email shadow w-full border rounded px-3 appearance-none leading-tight focus:shadow-outline focus:outline-none py-2" placeholder="Masukan Email Anda"/>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-lg font-bold mb-2">Password</label>
                                    <input type="text" name="password" class="password shadow w-full border rounded px-3 leading-tight focus:shadow-outline focus:outline-none py-2 appearance-none" placeholder="Masukan Password Anda"/>
                                </div>
                                <button type="submit" class="login rounded bg-cyan-500 py-3 w-20 mt-1 text-xl tracking-wide leading-4 text-white">Login</button>
                            </form>
                            <img class="py-1 px-2 w-20 bg-cover right-0 absolute" src="{{ asset('assets/img/bulat.png') }}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- jquery library --}}
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
    <script  src="{{ asset('js/style.js') }}"></script>
</body>
</html>