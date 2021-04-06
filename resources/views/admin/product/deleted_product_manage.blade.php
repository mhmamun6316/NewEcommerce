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
                    
                   
                    <h2 class="d-flex justify-content-center">Deleted Products</h2>
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead >
                            <tr >
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category id</th>
                                <th>Product Short Description</th>
                                <th>Price</th>
                                <th>Creation Date</th>
                                <th>Product Image</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                          </tr>     
                        </thead>
                        <tbody>
                           
                            @foreach($softdeletedproducts as $softdeletedproduct)
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$softdeletedproduct->product_name}}</td>
                              <td>{{$softdeletedproduct->category_id}}</td>
                              <td>{{$softdeletedproduct->product_short_description}}</td>
                              <td>{{$softdeletedproduct->price}}</td>
                              <td>{{$softdeletedproduct->created_at}}</td>
                              <td>
                                  <img src="{{asset('uploads/product_images')}}/{{$softdeletedproduct->product_image}}" class="img-fluid">
                              </td>
                              <td>{{$softdeletedproduct->publication_status==1 ? 'published':'unpublished'}}</td>
                              <td class="d-flex justify-content-center">
                                 
                                <a href="{{route('restore_delete',['product_id'=>$softdeletedproduct->id])}}" type="button" class="btn btn-outline-success">Restore</a> &nbsp;
                                <a  href="{{route('parmanent_delete',['product_id'=>$softdeletedproduct->id])}}"  type="button" class="btn btn-outline-danger">Force Delete</a>
                                  
                              </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $softdeletedproducts->links() }}
                 

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
