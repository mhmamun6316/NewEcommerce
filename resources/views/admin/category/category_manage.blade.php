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
                    
                    @if(session('category_add_msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('category_add_msg')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    
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
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Creation Date</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                          </tr>     
                        </thead>
                        <tbody>
                           <?php $sn=1; ?>
                            @foreach($categories as $category)
                            <tr>
                              <td>{{$sn++}}</td>
                              <td>{{$category->Category_Name}}</td>
                              <td>{{$category->Category_Description}}</td>
                              <td>{{$category->created_at}}</td>
                              <td>{{$category->Publication_Status==1 ? 'published':'unpublished'}}</td>
                              <td class="d-flex justify-content-center">
                                  
                                @if($category->Publication_Status==1)
                                    <a href="{{route('unpublish_category',['cat_id'=>$category->id])}}" type="button" class="btn btn-outline-primary">Unpublish</a>&nbsp;
                                @else
                                    <a href="{{route('publish_category',['cat_id'=>$category->id])}}" type="button" class="btn btn-outline-secondary">Publish</a>&nbsp;
                                @endif
                                  
                                <a href="{{route('category_edit',['cat_id'=>$category->id])}}" type="button" class="btn btn-outline-success">Edit</a> &nbsp;
                                <a  href="{{route('category_delete',['cat_id'=>$category->id])}}"  type="button" class="btn btn-outline-danger">Delete</a>
                       
                              </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $categories->links() }}
                 

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
