<!DOCTYPE html>
<html lang="en">

<head>
    <x-header />

    @include('layouts.style')
</head>

<body>
    <div class="wrapper">
        <!--
    Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->
        <div class="main-header" data-background-color="purple">

            <x-logo-navbar />

            <x-navbar />

        </div>

        @include('components.sidebar')

        <div class="main-panel">
            <div class="content">
                @yield('konten')
            </div>

        </div>

    </div>
    @include('layouts.script')

</body>

</html>
