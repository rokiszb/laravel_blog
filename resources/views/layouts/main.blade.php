<!doctype html>
<html lang="en">

    @include('layouts/header')

    <body>

    @include('layouts/navbar')

    <main role="main" class="container">
        @yield('contents')
    </main><!-- /.container -->

    @include ('layouts/footer')


    </body>


</html>
