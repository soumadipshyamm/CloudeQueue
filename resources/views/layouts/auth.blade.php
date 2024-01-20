<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.header')

<body>

    <section class="login-sec">
        @include('layouts.flash')
        <div class="container-fluid p-0">
            @yield('content')
        </div>
    </section>
</body>

@include('layouts.partials._footer')

</html>
