<!DOCTYPE html>
<html lang="en">
  <head>
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
                        <a href="{{url('delivered',$product->id)}}" class="btn btn-success"> deliver</a>
                        <a href="{{url('send_email',$product->id)}}" class="btn btn-primary"> send email</a>
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
    @include('adminpage/scripts')
  </body>
</html>