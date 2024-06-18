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

       <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="title_deg"> All orders </h1>

            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th >Name</th>
                        <th >Email</th>
                        <th >Message</th>
                        
                        <th >actions </th>
                    
                    </tr>
                    
                </thead>
                <tbody>

                   @foreach ($sms as $product)      
                    
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->email}}</td>
                        <td>{{$product->message}}</td>
                       

                       
                    <td>
                        @if($product->delivery_status=='processing')
                        <a href="{{url('smsdelivered',$product->id)}}" class="btn btn-success" > deliver</a>
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
    @include('adminpage/scripts')
    @include('sweetalert::alert')
  </body>
</html>