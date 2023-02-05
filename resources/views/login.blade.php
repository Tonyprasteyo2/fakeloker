<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/kenali.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
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
                <div id="resetpas" class="hidden"></div>
                <div id="carialamat" class="hidden"></div>
                <div id="mode" class="hidden"></div>
                <div class="p-2 d-block">
                    <div class="h-full flex items-center">
                        <div class="w-full p-5">
                            <h2 class="text-4xl mb-5">Login,</h2>
                            <div id="alert"></div>
                            <div class="mb-3 sign">
                                <form class="login">
                                    <div class="mb-4">
                                        <label class="block text-lg font-bold mb-2" for="email">Email</label>
                                        <input type="text" name="email" class="email shadow w-full border rounded px-3 appearance-none leading-tight focus:shadow-outline focus:outline-none py-2" placeholder="Masukan Email Anda" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-lg font-bold mb-2">Password</label>
                                        <input id="password" type="password" name="password" class="password shadow w-full border rounded px-3 leading-tight focus:shadow-outline focus:outline-none py-2 appearance-none" placeholder="Masukan Password Anda" required />
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onclick="show()">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Show Password</label>
                                    </div>
                                    <button type="submit" class="login capitalize bg-cyan-500 p-2 w-auto text-white rounded leading-4 text-base font-ubuntu">Login</button>
                                    <a class="capitalize bg-lime-500 p-2 w-auto text-white rounded leading-4 text-base font-ubuntu" href="{{route("reset")}}">reset password</a>
                                </form>
                            </div>
                            <img class="py-1 px-2 w-20 bg-cover right-0 absolute bulatlogin" src="{{ asset('assets/img/bulatindex.png') }}" />
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