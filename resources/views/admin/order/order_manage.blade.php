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
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered table-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer Name </th>
                                        <th>Total Price</th>
                                        <th>Payment Type </th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->OrderCustomer->first_name.' '.$order->OrderCustomer->last_name}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>{{$order->payment_type}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{$order->order_status}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="{{route('order_details',['order_id'=>$order->id])}}" title="view Order details"><i class="fas fa-info"></i></a>
                                                    <a class="btn btn-success" href="{{route('order_invoice',['invoice_id'=>$order->id])}}" title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                                    <a class="btn btn-primary" href="{{route('order_invoice_download',['invoice_id'=>$order->id])}}" title="Order Invoice Download"><i class="fas fa-file-download"></i></a>
                                                    <a class="btn btn-danger" href="" title=" Order Delete"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-warning" href="" title=" Order Edit"><i class="far fa-edit"></i></a>
                                                </div>
                                            </td>
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
