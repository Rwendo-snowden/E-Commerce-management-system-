<!DOCTYPE html>
<html lang="en">
  <head>
    @include('adminpage/form_css')
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
                    <strong>Update!</strong> {{session()->get('message')}}.
                  </div>
                
               
            </div>

            @endif
            <div class="div_center">
                <h2 class="h2_font"> Add products</h2>
                <div class="row">
                    <div class="col-75">
                      <div class="container">
                <form action="{{url('/add_products')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="inputs">
                        <label for="">
                            Product Name: </label>
                            <input type="text" class="input_text" name="title" id="" required>
                       
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            description </label>
                            <input type="text" class="input_text" name="description" id="" required>
                       
                    </div>
                    <div class="inputs">
                        <label for=" category">
                            choose category </label>
                            <select name="category" id="" class="input_text" required>
                                <option value="" selected> Add a category here</option>

                                @foreach( $category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                
                                @endforeach
                               </select>
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            Price </label>
                            <input type="text" class="input_text" name="discount_price" id="">
                        
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            quantity </label>
                            <input type="number" min="0" class="input_text" name="quantity" id="" required>
                        
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            image  </label>
                            <input type="file" class="input_text" name="image" id="" required>
                        
                    </div>
                    
            
                    <input type="submit" class="btn btn-primary" value="submit" >
                </form>
                      </div>
                    </div>
                </div>
            </div>

          
           
          
        </div>
       </div>
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('adminpage/scripts')
  </body>
</html>