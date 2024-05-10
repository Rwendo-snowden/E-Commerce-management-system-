<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
            <div class=" alert  alert-success">
         
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Update!</strong> {{session()->get('message')}}.
                  </div>
               
            </div>

            @endif

            
            <div class="div_center">
                <h2 class="h2_font"> update products</h2>

                <div class="row">
                    <div class="col-75">
                      <div class="container">
                <form action="{{url('updated_products',$product->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="inputs">
                        <label for="">
                            Product Name: </label>
                            <input type="text" class="input_text" name="title" id="" value="{{$product->title}}">
                       
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            description </label>
                            <input type="text" class="input_text" name="description" id="" value="{{$product->description}}" >
                       
                    </div>
                    <div class="inputs">
                        <label for=" category">
                            choose category </label>
                            <select name="category" id="" class="input_text" >
                                <option value="" selected> {{$product->category}}</option>

                                @foreach( $category as $category) 
                                <option value="{{$category->category_name}}"> {{$category->category_name}}</option> 
                                @endforeach
                               </select>
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            price </label>
                            <input type="text" class="input_text" name="discount_price" value="{{$product->discount_price}}" id="">
                        
                    </div>
                    
                    <div class="inputs">
                        <label for="">
                            quantity </label>
                            <input type="number" min="0" class="input_text" name="quantity" id="" value="{{$product->quantity}}">
                        
                    </div>
                    
                    <center>
                        <div class="inputs">
                            <label for="">
                             The Current image:  </label>
                                
                             <img src="products/{{$product->image}}" height="250" width="200" alt="">
                            
                        </div>
                    </center>
                  <br>
                  <br>

                    <div class="inputs">
                        <label for="">
                         change image : </label>
                            <input type="file" class="input_text" name="image" id="" >
                        
                    </div>
                    
            
                    <input type="submit" class="btn btn-primary" value="Update" >
                </form>
                      </div>
                    </div>
                </div>
            


       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('adminpage/scripts')
  </body>
</html>