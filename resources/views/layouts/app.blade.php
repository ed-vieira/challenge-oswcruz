<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')

<body>
    <div class="flex-center position-ref full-height">
        @include('layouts.app-nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @auth
    <script>
        sessionStorage.setItem('api_key', '{{Auth::user()->api_token}}');
        sessionStorage.setItem('user_id', '{{Auth::user()->id}}');
    </script>
    @endauth

</body>

</html>
