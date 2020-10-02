<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        {{-- <link rel="canonical" href="{{ $page->getUrl() }}"> --}}

        {{-- <meta name="description" content="{{ $page->description }}"> --}}

        <title>Tracibility System</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        @include('includes.head')
    </head>
    <body>
        {{-- x-data="{ sidebarOpen: false }" --}}
        <div id="app"  class="flex h-screen bg-gray-200 font-roboto">
            @include('includes.sidebar')

            <div class="flex-1 flex flex-col overflow-hidden">
                @include('includes.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        {{-- @include('includes.flash') --}}
                        @yield('body')
                    </div>
                </main>
            </div>

            {{-- <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash> --}}

        </div>
        <!-- Scripts -->
        @include('includes.scripts')
        @include('includes.messages')
    </body>
</html>






