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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                  
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(session('status_msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('status_msg')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    
                   
                    
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead >
                            <tr >
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category id</th>
                                <th>Product Short Description</th>
                                <th>Price</th>
                                <th>Product Image</th>
                                <th>Creation Date</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                          </tr>     
                        </thead>
                        <tbody>
                           
                            @foreach($products as $product)
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$product->product_name}}</td>
                              <td>{{$product->category_id}}</td>
                              <td>{{$product->product_short_description}}</td>
                              <td>{{$product->price}}</td>
                              <td>
                                  <img src="{{asset('uploads/product_images')}}/{{$product->product_image}}" class="img-fluid">
                              </td>
                              <td>{{$product->created_at}}</td>
                              <td>{{$product->publication_status==1 ? 'published':'unpublished'}}</td>
                              <td class="d-flex justify-content-center">
                                 @if($product->publication_status==1)
                                    <a href="{{route('unpublish_product',['product_id'=>$product->id])}}" type="button" class="btn btn-outline-primary">Unpublish</a>&nbsp;
                                @else
                                    <a href="{{route('publish_product',['product_id'=>$product->id])}}" type="button" class="btn btn-outline-secondary">Publish</a>&nbsp;
                                @endif
                                <a href="{{route('product_edit',['product_id'=>$product->id])}}" type="button" class="btn btn-outline-success">Edit</a> &nbsp;
                                <a  href="{{route('product_delete',['product_id'=>$product->id])}}"  type="button" class="btn btn-outline-danger">Delete</a>
                              </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $products->links() }}
                 

                </div>
                <!-- /.container-fluid -->

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
