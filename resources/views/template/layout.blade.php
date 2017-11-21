<!DOCTYPE html>
<html>
    <head>
        @include('template.components.head')
    </head>

    <body>
        <div class="wrapper">
            @include('template.components.sidebar')

            <div class="main-panel">
                @include('template.components.navbar')
                @yield('page-content')
                @include('template.components.footer')
            </div>
        </div>

        @include('template.components.delete-modal')
        @include('template.components.javascripts')
    </body>
</html>
