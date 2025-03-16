<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel App - Laravel</title>

    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" crossorigin="anonymous"></script>

    <livewire:styles>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.5.0/dist/alpine.min.js" defer></script>

</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" alt="logo" class="w-32"></a>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ url('/') }}" class="hover:text-gray-300"><i class="fas fa-book-open"></i> Comics</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ url('/characters') }}" class="hover:text-gray-300"><i class="fas fa-users"></i> Characters</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ url('/series') }}" class="hover:text-gray-300"><i class="fas fa-book"></i> Series</a>
                </li>

            </ul>

            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown />
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="{{ url('img/avatar.png') }}" alt="avatar" class="rounded-full w-8 h-8 ">
                    </a>
                </div>
            </div>
            
        </div>
    </nav>

    @yield('content')

    <div class="w-full bg-blue-900">
        <div class="flex flex-wrap text-center text-white">
          <div class="w-full p-3 text-left">
            <p class="p-3 text-gray-400">
                Developed by <a href="https://github.com/Saul-Lara" class="p-1 bg-gray-900 text-white"><i class="fab fa-github"></i> Saul Lara</a>
            </p>
            <p class="p-3 text-gray-400">
                Data provided by <a href="https://marvel.com" class="p-1 bg-red-700 text-white font-bold">Marvel</a>. ©{{ date('Y') }} Marvel
            </p>
          </div>
        </div>
      </div>

    <livewire:scripts>

    @yield('scripts')

</body>
</html>