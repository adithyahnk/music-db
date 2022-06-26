<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Music Database</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @yield('css')

    <livewire:styles/>

</head>

<body class="overflow-x-hidden">

<nav class="bg-green-100 border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                 class="h-6 sm:h-9 fill-current text-[#1DB954] mt-2" fill-rule="evenodd" clip-rule="evenodd">
                <path
                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0 3c-3.866 0-7 3.134-7 7s3.134 7 7 7 7-3.134 7-7-3.134-7-7-7zm3.21 10.096c-.125.207-.394.271-.6.146-1.643-1.005-3.712-1.232-6.149-.675-.235.053-.469-.094-.522-.328-.054-.235.092-.469.328-.523 2.666-.609 4.954-.347 6.799.78.205.126.27.395.144.6zm.857-1.906c-.158.257-.494.338-.751.18-1.881-1.156-4.75-1.491-6.975-.816-.289.088-.594-.075-.681-.363-.087-.289.076-.593.364-.681 2.542-.771 5.703-.398 7.863.93.257.158.338.494.18.75zm.074-1.984c-2.257-1.34-5.979-1.464-8.133-.81-.345.105-.711-.09-.816-.436-.105-.346.09-.712.436-.817 2.473-.75 6.583-.605 9.181.937.311.184.413.586.229.897-.185.311-.587.413-.897.229z"/>
            </svg>
        </a>
        <div class="flex md:order-2 md:hidden">
            <button data-collapse-toggle="mobile-menu-3" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100
                     focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="mobile-menu-3" aria-expanded="false">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-3">
            <div class="relative mt-3 md:hidden">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="search-navbar"
                       class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300
                       sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search...">
            </div>
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="/"
                       class="block py-2 pr-4 pl-3 text-white bg-blue-600 rounded md:bg-transparent md:text-blue-700
                        md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{secure_url('songs')}}"
                       class="block py-2 pr-4 pl-3 text-gray-600 border-b border-gray-100 hover:bg-gray-50
                        md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Songs</a>
                </li>
                <li>
                    <a href="{{secure_url('artists')}}"
                       class="block py-2 pr-4 pl-3 text-gray-600 border-b border-gray-100 hover:bg-gray-50
                        md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Artists</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-green-100 border-gray-200 px-2 sm:px-4 py-5 rounded">
    <p class="text-gray-500 text-sm text-center">Music Database</p>
</footer>

<livewire:scripts/>

@yield('js')

</body>

</html>
