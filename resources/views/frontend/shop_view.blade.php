@extends('layouts/frontend_master')


@section('content')

 <!-- Page Title area start -->
    <div class="page-tile-area py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Title area start -->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- widget with Number start -->
                    <div class="widget-area ">
                        @include('frontend.includes.shop_widget')
                    </div>
                    <!-- widget Number End  -->

                </div> <!-- Col-3  end-->
                <div class="col-lg-9">
                    <!-- Banner area start  -->
                    <div class="banner-area">
                        <img src="img/banner-img/banner2.jpg" alt="" class="img-fluid">
                    </div>
                    <!-- Banner area  End-->
                    <!-- List view and grid view tab start-->
                    <div class="shop-layout-area py-5">
                        <div class="shop-layout-bar clearfix ">
                            <ul class="nav shop-tap" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active " data-toggle="tab" href="#grid-view" role="tab">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#list-view" role="tab">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="filter-section">
                                <select name="" id="">
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                    <option value="#">Default short</option>
                                </select>
                            </div>
                            <div class="showing-result">
                                <span>Showing 1-12 of 30 relults</span>
                            </div>

                        </div>
                        <!-- tab content-->
                        <div class="tab-content pt-4">
                            <!-- tab grid content-->
                            <div class="tab-pane fade active show" id="grid-view" role="tabpanel">
                                <div class="row">
                                    @foreach($allproduct as $allproducts)
                                    <div class="col-md-4">
                                        <!--Single product start-->
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{route('product_details',['id'=>$allproducts->id])}}"> <img src="{{asset('uploads/product_images')}}/{{$allproducts->product_image}}" alt=""></a>
                                                <span>hot</span>
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
                                        <!--Single product End-->
                                    </div>
                                         @endforeach
                                    
                                </div>
                                {{$allproduct->links()}}
                            </div>
                            <!-- tab list content-->
                            <div class="tab-pane fade  " id="list-view" role="tabpanel">
                                <!--Single product start-->
                                 @foreach($allproduct as $allproducts)
                                <div class="row pb-4">
                                    <div class="col-md-4">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{route('product_details',['id'=>$allproducts->id])}}"> <img src="{{asset('uploads/product_images')}}/{{$allproducts->product_image}}" alt=""></a>
                                                <span>hot</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content-list">
                                            <h3>{{$allproducts->product_name}}</h3>
                                            <p>{{$allproducts->product_short_description}}</p>
                                            <div class="rating-list">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <span>3 Reating(s) | Add Your Reating(s)</span>
                                            </div>
                                            <div class="price-list">
                                                <span>$ {{$allproducts->price}} </span>
                                            </div>
                                            <div class="cart-and-action">
                                                <div class="cart-btn-list">
                                                    <a href="{{route('product_details',['id'=>$allproducts->id])}}">Add to cart</a>
                                                </div>
                                                <div class="product-action-list">
                                                    <a href="#"><i class="far fa-eye"></i></a>
                                                    <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                    <a href="#"><i class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                                {{$allproduct->links()}}
                                <!--Single product End-->
                            </div>
                        </div>
                    </div>
                    <!-- List view and grid view tab End-->
                </div>
            </div>
        </div>
    </div>

@endsection