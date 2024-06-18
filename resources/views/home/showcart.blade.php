<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      {{-- <link rel="shortcut icon" href="images/favicon.png" type=""> --}}
      <title>stationary</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      {{--  data tables  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
   </head>
   <style>
      .img_size{
            height: 250px;
            width: 250px
        }
   </style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
       @include('home/header')
         <!-- end header section -->

         @if(session()->has('message'))
         <div class=" 'alert  alert-success">
      
             <div class="alert">
                 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                 <strong>Update!</strong> {{session()->get('message')}}.
               </div>
             
            
         </div>

         @endif

             <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th >name</th>
                        <th >quantity</th>
                        <th >price</th>
                        <th >image</th>
                        <th >actions </th>
                    
                    </tr>
                    
                </thead>
                <tbody>

                   @foreach ($cart as $cart)      
                    
                    <tr>
                        <td>{{$cart->product_title}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->price}}</td>
                        
                        <td><img class="img_size" src="products/{{$cart->image}}" alt=""></td>
                    <td> <a href="{{url('delete_cart',$cart->id)}}" class="btn btn-danger"> Remove</a> 
                 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <center>
               <div style="padding-bottom:25px">
                  <h1 style="padding-bottom: 10px;font-size:25px"> Proceed to order</h1>
                  <a href="{{(url('cash_order'))}}" class="btn btn-danger"> Cash on delivary</a>
                  <a href="" class="btn btn-success"> pay using card </a>
               </div>
            </center>

           
      
     
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  </script>
   </body>
</html>