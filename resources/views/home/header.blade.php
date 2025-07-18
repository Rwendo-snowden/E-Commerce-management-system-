<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}" style="color: red; font-size:25px"> stationary</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               {{-- <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="{{url('/')}}">About</a></li>
                      <li><a href="{{url('/')}}">Testimonial</a></li>
                      
                   </ul>
                </li> --}}
                <li class="nav-item">
                   <a class="nav-link" href="{{url('/')}}">Products</a>
                </li>
             
                <li class="nav-item">
                   <a class="nav-link" href= "{{url('/contactUs')}}">Contact</a>
                </li>

               
                
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

                <li class="nav-item">
                  <a class="btn btn-primary" id="logincss" href= "{{route('login')}}">login</a>
               </li>

               <li class="nav-item">
                  <a class="btn btn-success" href= "{{route('register')}}">Register</a>
               </li>
              
             </ul>
          </div>
          @if (Route::has('login'))
          @auth
          <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
           {{-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="{{url('/')}}">About</a></li>
                  <li><a href="{{url('/')}}">Testimonial</a></li>
                  
               </ul>
            </li> --}}
            <li class="nav-item">
               <a class="nav-link" href="{{url('/allproducts')}}">Products</a>
            </li>
            
            <li class="nav-item">
               <a class="nav-link" href= "{{url('/contactUs')}}">Contact</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href= "{{url('/showcart')}}">Cart</a>
            </li>
            <form class="form-inline">
               <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
               <i class="fa fa-search" aria-hidden="true"></i>
               </button>
            </form>
          
         </ul>

          <x-app-layout> 
          </x-app-layout>
          @endauth
          @endif
       </nav>
       
    </div>
 </header>