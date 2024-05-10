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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
       @include('home/header')
         <!-- end header section -->
         {{-- products div here --}}

         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                     Our <span>products</span>
                  </h2>
               </div>
               
               <div class="row">
                  @foreach($product as $products)
        
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                       <div class="option_container">
                          <div class="options">
                             <a href="{{url('product_details',$products->id)}}" class="option1">
                             {{$products->title}} details
                             </a>
                             <form action="{{url('/add_to_cart',$products->id)}}" method="POST">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" min="1" id="" style="width: 100px" value="1">
      
                                 </div class="col-md-4">
                                 <div>
                                    <input type="submit" value="add to cart">
                                 </div>
      
                              </div>
                              
                           </form>
                          </div>
                       </div>
                       <div class="img-box">
                          <img src="products/{{$products->image}}" alt="">
                       </div>
                       <div class="detail-box">
                          <h5>
                             {{$products->title}}
                          </h5>
                          <h6>
                             Tzs {{$products->discount_price}} /=
                          </h6>
                       </div>
                    </div>
                 </div>
                  @endforeach
               </div>
               
            </div>
         </section>
         {{-- end of products div --}}
      </div>
      <!-- footer start -->
      @include('home/footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="">Group 6</a><br>
         
            Distributed By <a href="" target="_blank">nmttech</a>
         
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