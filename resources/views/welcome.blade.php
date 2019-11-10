<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')

<body>
    <div class="flex-center position-ref full-height">

        @include('layouts.home-nav')

        <main class="content">
            <div id='app'> </div>
        </main>

    </div>
</body>

</html>
