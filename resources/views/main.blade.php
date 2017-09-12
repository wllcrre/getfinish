<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  @include('_head')

  <body>

    @include('_nav')

    <div class="container">

      @yield('content')

      @include('_footer')
       
    </div> <!-- end of .container -->


    @include('_javascript')

  </body>
</html>
