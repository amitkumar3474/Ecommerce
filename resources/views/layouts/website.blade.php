<!DOCTYPE html>
<html lang="en">
@include('include_web.head')
<body>
   @include('include_web.header')

   @include('include_web.menu')

    @yield('section_data')

    @include('include_web.footer')
</body>
</html>