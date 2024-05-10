<!DOCTYPE html>
<html lang="en">
  <head>
    @include('adminpage/css')
  </head>
  <body>
    
      <!-- partial:partials/_sidebar.html -->
     @include('adminpage/sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('adminpage/navbar')
      
       {{-- body --}}

       @include('adminpage/body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('adminpage/scripts')
  </body>
</html>