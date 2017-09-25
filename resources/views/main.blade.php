<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  @include('_head')

  <body>

    @include('_nav')

      {{-- {{ Auth::check() ? "Status: Logged In" : "Status: Logged Out" }} --}}

    <div class="container">

      @include('_messages')


      @yield('content')

      @include('_footer')
       
    </div> <!-- end of .container -->


    @include('_javascript')

  </body>
</html>
