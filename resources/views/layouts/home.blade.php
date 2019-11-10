<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')

<body>

    <div class="flex-center position-ref full-height">
        @include('layouts.home-nav')

        <main class="content">
            @yield('content')
        </main>
    </div>

    @auth
    <script>
        sessionStorage.setItem('api_key', '{{Auth::user()->api_token}}');
        sessionStorage.setItem('user_id', '{{Auth::user()->id}}');
        sessionStorage.setItem('carrinho_id', '{{Auth::user()->carrinho->id}}');
    </script>
    @endauth

</body>

</html>
