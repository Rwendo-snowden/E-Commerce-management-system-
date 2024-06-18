<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        label{
            display: inline-block;
            width: 200px
        }
    </style>
    <base href="/public">
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
       <div class="main-panel">
        <div class="content-wrapper">

            <h1 style="text-align: center; font-size:25px"> Send Email to {{$order->email}}</h1>

            <form action="">
            <div style=" padding-left:35%; padding-top: 30px">
            <label for=""> Email Greating :</label>
            <input type="text" name="greeting">
            </div>

            <div style=" padding-left:35%; padding-top: 30px">
                <label for=""> Email Head :</label>
                <input type="text" name="head">
                </div>

                <div style=" padding-left:35%; padding-top: 30px">
                    <label for=""> Email body :</label>
                    <input type="text" name="body">
                    </div>

                    <div style=" padding-left:35%; padding-top: 30px">
                        <label for=""> Email button :</label>
                        <input type="text" name="button">
                        </div>

                        <div style=" padding-left:35%; padding-top: 30px">
                            <label for=""> Email url :</label>
                            <input type="text" name="url">
                            </div>

                            <div style=" padding-left:35%; padding-top: 30px">
                                <label for=""> Email last line :</label>
                                <input type="text" name="last">
                                </div>

                                
                            <div style=" padding-left:45%; padding-top: 30px">
                            <input type="submit" value="send Email" class="btn btn-primary">  
                            </div>  
        </form>
        </div>
       </div>

      
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('adminpage/scripts')
  </body>
</html>