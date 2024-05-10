<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
      <title>Stationary </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 30%;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-bottom: 50px
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.vitu{
  padding: 15px
}
.vt{
  font: bolder;
  font-size: 20px;
  text-align: left
}
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
       @include('home/header')
         <!-- end header section -->
        {{-- </div> --}}

        <h2 style="text-align:center; font-size:30px ;font-family:Bold">{{$product->title}}</h2>
        <br>

<div class="card">
  <img src="products/{{$product->image}}"  alt="Denim Jeans" style="width:100%">
  <h1 class="vitu"> <span class="vt"> Product Name:</span> {{$product->title}}</h1>
  <p class="price"><span class="vt">Price:</span> Tzs {{$product->discount_price}} /=</p>
  <p class="vitu"><span class="vt">Category:</span> {{$product->category}}</p>
  <p class="vitu"><span class="vt">Available:</span> {{$product->quantity}}</p>
  <p class="vitu"><span class="vt">Description:</span> {{ $product->description}}</p>
 
  <p class="vitu"><form action="{{url('/add_to_cart',$product->id)}}" method="POST">
    @csrf
    <div class="row">
       <div class="col-md-4">
          <input type="number" name="quantity" min="1" id="" style="width: 100px" value="1">
          
       </div >
       <div class="col-md-4">
          <input type="submit" value="add to cart">
       </div>

   
    </div>
    
 </form></p>
</div>
     
      <!-- footer start -->
      @include('home/footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All R class="vitu"ights Reserved By <a href="">Group 6</a><br>
         
          
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>