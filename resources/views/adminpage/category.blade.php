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
    </style>
    @include('adminpage/css')
    @include('adminpage/arlert_css')
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

            @if(session()->has('message'))
            <div class=" 'alert  alert-success">
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>{{session()->get('message')}}.</strong> 
                  </div>
                
               
            </div>

            @endif
            <div class="div_center">
                <h2 class="h2_font"> Add category</h2>

                <form action="{{url('/add_categories')}}" method="post" autocomplete="off">
                    @csrf
                    <input type="text" class="input_text" name="name" id="" autocomplete="off">
                    <input type="submit" class="btn btn-primary" value="submit">
                </form>
            </div>

          
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr ><th >name</th>
                        <th >actions </th></tr>
                    
                </thead>
                <tbody>

                   @foreach ($table as $data)      
                    
                    <tr>
                        <td>{{$data->category_name}}</td>
                    <td> <a href="{{url('delete_category',$data->id)}}" class="btn btn-danger"> delete</a></td>
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