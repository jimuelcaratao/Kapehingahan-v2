<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

        {{-- tailwind cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">


    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
                <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
                    <div class="max-w-md text-center">
                        <h2 class="mb-8 font-extrabold text-9xl text-gray-900">
                            @yield('code')
                        </h2>
                        <div class="container px-10 py-5 mx-auto flex flex-wrap items-center justify-center">
                            <img src={{ asset('img/error-svg.svg') }} alt="ads">
                        </div>
                        <p class="text-2xl font-semibold md:text-3xl">
                            @yield('message')
                        </p>
                        <p class="mt-4 mb-8">
                            @yield('message1')
                        </p>
                        <a href="{{ route('home') }}" class="px-8 py-3 font-semibold rounded bg-gray-900 text-white">Back to homepage</a>
                    </div>
                </div>
        </div>
    </body>
</html>
