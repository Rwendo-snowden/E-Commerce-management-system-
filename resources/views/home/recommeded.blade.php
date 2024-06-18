<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Recommended <span>products</span>
          </h2>
       </div>
       
       <div class="row">
          @foreach($recommendedproduct as $products)

          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                     {{$products->title}} details
                     </a>
                    
                     <br>

                     <form action="{{url('/add_to_cart',$products->id)}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" min="1" id="" style="width: 100px" value="1">
                              
                           </div >
                           <div class="col-md-4">
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
       <div class="btn-box">
          <a href="{{url('/allproducts')}}">
          View All products
          </a>
       </div>
    </div>
 </section>