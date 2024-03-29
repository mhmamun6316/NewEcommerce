 @include('admin.includes.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.includes.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.includes.topbar')
                <!-- End of Topbar -->

                
                

            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto mb-4">
                            <h2 class="text-center">Order info for this order</h2>
                        <table class="table table-hover table-bordered ">
                                <tr>
                                    <th>Order No</th>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <th>Ordet Total </th>
                                    <td>{{$order->total_price}}</td>
                                </tr>
                                <tr>
                                    <th>Order Status  </th>
                                    <td>{{$order->order_status}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status  </th>
                                    <td>{{$order->payment_status}}</td>
                                </tr>
                                <tr>
                                    <th>Payment type  </th>
                                    <td>{{$order->payment_type}}</td>
                                </tr>
                                <tr>
                                    <th>Order Date </th>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mx-auto mb-4">
                            <h2 class="text-center">Customer info for this order</h2>
                        <table class="table table-hover table-bordered ">
                                <tr>
                                    <th>Customer Name </th>
                                    <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number </th>
                                    <td>{{$customer->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th>Email Address </th>
                                    <td>{{$customer->email_address}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$customer->address}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mx-auto mb-4">
                            <h2 class="text-center">Shipping info for this order</h2>
                        <table class="table table-hover table-bordered ">
                                <tr>
                                    <th>Full Name </th>
                                    <td>{{$shipping->full_name}}</td>	
                                </tr>
                                <tr>
                                    <th>Phone Number </th>
                                    <td>{{$shipping->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th>Email Address </th>
                                    <td>{{$shipping->email_address}}l</td>
                                </tr>
                                <tr>
                                    <th>Address </th>
                                    <td>{{$shipping->address}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12 mb-5">
                                <h2 class="text-center">Product info for this order</h2>
                            <table class="table table-hover table-bordered table-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th>SN.</th>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_details as $order_detail)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$order_detail->product_id}}</td>
                                            <td>{{$order_detail->product_name}}</td>
                                            <td>
                                                <img src="{{asset('uploads/product_images')}}/{{$order_detail->product_image}}" class="img-fluid">
                                            </td>
                                            <td>${{$order_detail->product_price}}</td>
                                            <td>{{$order_detail->product_quantity}}</td>
                                            <td>${{$order_detail->product_quantity*$order_detail->product_price}}</td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


     @include('admin.includes.footer')
