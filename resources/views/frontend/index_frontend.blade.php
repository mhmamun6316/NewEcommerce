 @extends('layouts/frontend_master')


@section('content')


    <!-- Carosel Area start-->
    <section class="carousel-section pb-5">
        <div class="container">
            <div class="slider-active">
                <div class="slider-single-item">
                    <img src="{{asset('frontend')}}/img/slider-img2.jpg" class="img-fluid" alt="no image">
                    <div class="slider-text">
                        <h2>Cherner <span>Armchair</span></h2>
                        <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                        <a href="#">View now</a>
                    </div>
                </div>
                <div class="slider-single-item">
                    <img src="{{asset('frontend')}}/img/slider-img2.jpg"  class="img-fluid" alt="">
                    <div class="slider-text">
                        <h2>Cherner <span>Armchair</span></h2>
                        <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                        <a href="#">View now</a>
                    </div>
                </div>
                <div class="slider-single-item">
                    <img src="{{asset('frontend')}}/img/slider-img3.jpg" class="img-fluid" alt="">
                    <div class="slider-text">
                        <h2>Cherner <span>Armchair</span></h2>
                        <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                        <a href="#">View now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <!-- Carosel Area end-->
    
    <!-- Latest product area -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12"><h3>Latest Product</h3></div>
			</div>
			<div class="row">
                <!--Single product start-->
                @foreach($product as $products)
				<div class="col-md-3">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product_details',['id'=>$products->id])}}"> <img src="{{asset('uploads/product_images')}}/{{$products->product_image}}" alt=""></a>
                                            <span>hot</span>
                                            <div class="product-action">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="{{route('product_details',['id'=>$products->id])}}">{{$products->product_name}}</a></h3>
                                            <div class="rating">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <span>$ {{$products->price}} </span>
                                                <span><del>$239.9</del></span>
                                            </div>
                                            

                                            <div class="cart-btn">
                                                <form action="{{route('add_to_cart')}}" method="POST" class="cart-and-action">
                                                    @csrf
													<div class="">
														<div class="float-left">
															<input type="hidden" name="product_quantity" value="1">
															<input type="hidden" name="product_id"  value="{{$products->id}}">
														</div>
													</div>
													<div class="cart-pro">
														<button class="btn btn-outline-dark btn-lg " type="submit">Add to cart</button>
													</div>
												</form>
                                            </div>
                                        </div>
                                    </div>   
				   </div>
                @endforeach
                     <!--Single product End-->	
		</div>
		</div>
	</section>
 
  
 

    
   <!--Category Product Area-->
    <section class="product-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product-tab cat_product">
                        <ul class="nav" role="tablist">
                            <li class="nav-item  pb-5">
                                <a class="nav-link active" id="l1" data-toggle="tab" href="#allproduct"
                                    role="tab">All</a>
                            </li>
                            @foreach($category as $categorys)
                            <li class="nav-item pb-5">
                                <a class="nav-link" data-toggle="tab" id="l2" href="#cat{{$categorys->id}}" role="tab">{{$categorys->Category_Name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane fade show active" id="allproduct" role="tabpanel" aria-labelledby="l1">
                                <div class="product-active owl-carousel nav-style">
                                   @foreach($allproduct as $allproducts) 
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product_details',['id'=>$allproducts->id])}}"> <img src="{{asset('uploads/product_images')}}/{{$allproducts->product_image}}" alt=""></a>
<!--
                                            <a href="#"> <img class="secondary-img" src="img/product-img/product2.jpg"
                                                    alt=""></a>
-->
                                            <div class="product-action">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="{{route('product_details',['id'=>$allproducts->id])}}">{{$allproducts->product_name}}</a></h3>
                                            <div class="rating">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <span>$ {{$allproducts->price}} </span>
                                                <span><del>$239.9</del></span>
                                            </div>
                                            <div class="cart-btn">
                                                <form action="{{route('add_to_cart')}}" method="POST" class="cart-and-action">
                                                    @csrf
													<div class="">
														<div class="float-left">
															<input type="hidden" name="product_quantity" value="1">
															<input type="hidden" name="product_id"  value="{{$allproducts->id}}">
														</div>
													</div>
													<div class="cart-pro">
														<button class="btn btn-outline-dark btn-lg " type="submit">Add to cart</button>
													</div>
												</form>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                            @foreach($category as $categorys)
                            <div class="tab-pane fade" id="cat{{$categorys->id}}" role="tabpanel" aria-labelledby="l1">
                                <div class="product-active owl-carousel nav-style">
                                   @foreach($allproduct as $allproducts) 
                                    @if($categorys->id==$allproducts->category_id)
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product_details',['id'=>$allproducts->id])}}"> <img src="{{asset('uploads/product_images')}}/{{$allproducts->product_image}}" alt=""></a>
                                            
                                            <div class="product-action">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="{{route('product_details',['id'=>$allproducts->id])}}">{{$allproducts->product_name}}</a></h3>
                                            <div class="rating">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <span>$ {{$allproducts->price}} </span>
                                                <span><del>$239.9</del></span>
                                            </div>
                                            <div class="cart-btn">
                                                <form action="{{route('add_to_cart')}}" method="POST" class="cart-and-action">
                                                    @csrf
													<div class="">
														<div class="float-left">
															<input type="hidden" name="product_quantity" value="1">
															<input type="hidden" name="product_id"  value="{{$allproducts->id}}">
														</div>
													</div>
													<div class="cart-pro">
														<button class="btn btn-outline-dark btn-lg " type="submit">Add to cart</button>
													</div>
												</form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                   @endforeach
                                </div>
                            </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!--Banner Area-->
    <div class="banner-area pb-5">
        <div class="container">
            <div class="banner-img">
                <a href="#"><img class="img-fluid" src="{{asset('frontend')}}/img/banner-img/banner.jpg" alt=""></a>
            </div>
        </div>
    </div>

    <!--Subcribe-section start-->
    <section class="subscribe-section  ">
        <div class="container">
            <div class="subscribe text-center py-5">
                <div class="rwo py-5">
                    <div class="col-12 ">
                        <h2>KEEP UPDATED</h2>
                        <p>Sign up for our newletter to recevie updates an exlusive offers</p>
                    </div>
                    <div class="col-12 ">
                        <div class="input-group w-50  mx-auto pt-4">
                            <input type="text" placeholder="Enter Your Email" aria-label="Recipient's "
                                aria-describedby="my-addon">
                            <div class="input-group-append">
                                <span class="subscribe-text" id="my-addon">Subscribe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Subcribe-section End-->
    <!--Brand-section start-->
    <div class="brand-section">
        <div class="container ">
            <div class="row">
                <div class="brand-active owl-carousel ">
                    <div class="single-brand"><a href=""><img src="{{asset('frontend')}}/img/brand/brand1.jpg" alt="" class=""></a></div>
                    <div class="single-brand"><a href=""><img src="{{asset('frontend')}}/img/brand/brand1.jpg" alt="" class=""></a></div>
                    <div class="single-brand"><a href=""><img src="{{asset('frontend')}}/img/brand/brand1.jpg" alt="" class=""></a></div>
                    <div class="single-brand"><a href=""><img src="{{asset('frontend')}}/img/brand/brand1.jpg" alt="" class=""></a></div>
                    <div class="single-brand"><a href=""><img src="{{asset('frontend')}}/img/brand/brand1.jpg" alt="" class=""></a></div>
                </div>
            </div>
        </div>
    </div>
    <!--Brand-section End-->
    

@endsection