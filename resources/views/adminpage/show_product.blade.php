<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
            margin-bottom: 60px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_text{
            color: black;
        }

        .t_head{
            font: bold;
            font-size: 30px
        }
        .inputs{
            padding-bottom: 15px;
        }
        label{
            display: inline-block;
            width: 200px
        }
        .img_size{
            height: 250px;
            width: 250px
        }
    </style>
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

           
                <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr >
                        <th >name</th>
                        <th >description</th>
                        <th >category</th>
                        <th>price</th>
                        <th >image</th>
                        <th >actions </th>
                    
                    </tr>
                    
                </thead>
                <tbody>

                   @foreach ($products as $product)      
                    
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td><img class="img_size" src="products/{{$product->image}}" alt=""></td>
                    <td> <a href="{{url('delete_product',$product->id)}}" class="btn btn-danger"> delete</a> <a href="{{url('update_product',$product->id)}}" class="btn btn-primary"> edit</a></td>
                 
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