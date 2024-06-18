<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @include('adminpage/css')
  </head>
  <style>
    .title_deg{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 20px;
    }
  </style>
  <body>
    
      <!-- partial:partials/_sidebar.html -->
     @include('adminpage/sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('adminpage/navbar')
      
       <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_deg"> All orders </h1>

            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th >Name</th>
                        <th >Email</th>
                        <th >Address</th>
                        <th>phone</th>
                        <th >image</th>
                        <th >quantity</th>
                        <th >price</th>
                        <th >payment Status</th>
                        <th > delivery status</th>
                        <th >product_title</th>
                        <th >actions </th>
                    
                    </tr>
                    
                </thead>
                <tbody>

                   @foreach ($order as $product)      
                    
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->email}}</td>
                        <td>{{$product->address}}</td>
                        <td>{{$product->phone}}</td>
                        <td><img class="img_size" src="products/{{$product->image}}" alt=""></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->payment_status}}</td>
                        <td>{{$product->delivery_status}}</td>
                        <td>{{$product->product_title}}</td>

                       
                    <td>
                        @if($product->delivery_status=='processing')
                        <a href="{{url('delivered',$product->id)}}" class="btn btn-success" onclick="confirmation(event)"> deliver</a>
                        {{-- <a href="{{url('send',$product->id)}}" class="btn btn-primary"> send email</a> --}}
                        @else

                        <p style="color: green"> delivered</p>

                        @endif
                        
                    </td>
                        {{-- <a href="{{url('update_product',$product->id)}}" class="btn btn-primary"> edit</a> --}}
                 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('sweetalert::alert')

    @include('adminpage/scripts')
    
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to confrim delivery",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {                
                  window.location.href = urlToRedirect;
                 
              }  
  
          });   
      }
  </script>
  </body>
</html>