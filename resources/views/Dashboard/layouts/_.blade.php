<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layouts._head')
</head>

<body>
    <div class="container-scroller">

        @include('dashboard.layouts._sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('dashboard.layouts._navbar')

            <div class="main-panel">
                @yield('content')
            </div>

        </div>

    </div>

    @include('dashboard.layouts._footer')

    @include('dashboard.layouts._js')


</body>

</html>
