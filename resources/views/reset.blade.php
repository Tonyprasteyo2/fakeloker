<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/kenali.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Reset Password</title>
</head>
<body>
    <div class="h-screen flex items-center">
        <div class="bg-white w-3/4 mx-auto rounded drop-shadow-2xl">
            <div class="grid grid-cols-1 gap-1 md:grid-cols-2 h-auto">
                <div class="logo_wallpaper p-1 relative">
                    <div class="w-11">
                        <a href="/"><img src="{{ asset('assets/img/back.png')}}" class="w-11 px-1 relative" /></a>
                    </div>
                    <header>
                        <img src="{{ asset('assets/img/icon_login.png') }}" class="w-100 relative bg-cover mx-auto" />
                    </header>
                    <img class="absolute top-20 right-0 py-1 px-2 w-20 bg-cover " src="{{ asset('assets/img/bulatindex.png') }}" />
                    <h1 class="text-center p-3 text-6xl tracking-tighter " style="margin-top:-35px;">Welcome Back</h1>
                    <p class="text-center p-3 text-xl font-sans tracking-tighter " style="margin-top: -10px;">Nice to see again</p>
                </div>
                <div id="carialamat" class="hidden"></div>
                <div id="mode" class="hidden"></div>
                <div class="p-2 d-block">
                    <div class="h-full flex items-center">
                        <div class="w-full p-5">
                            <h2 class="text-4xl mb-5 font-bebas leading-tight ">Reset password,</h2>
                            <form id="resetpas">
                                <label class="capitalize text-lg font-bold mb-3" for="email">email</label>
                                <input type="email" placeholder="masukan email" class="w-full p-3 rounded bg-gray-100 focus:outline-none shadow border focus:shadow-outline leading-tight mt-2 mb-4 resemail">
                                <button class="capitalize bg-cyan-500 p-2 w-auto text-white rounded leading-4 text-base font-ubuntu" type="submit
                                ">reset password</button>
                            </form>
                            <div class="mt-2 relative ">
                                <p class="capitalize text-base tracking-wider font-ubuntu">sudah punya akun ? <a href="{{route('login')}}" class="relative before:bg-cyan-500 before:absolute before:w-11 before:h-1 before:rounded before:top-5">login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetaalert.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>