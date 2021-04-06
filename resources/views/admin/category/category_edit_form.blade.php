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

                <form action="{{route('update_category')}}" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                          <input value="{{$categories->Category_Name}}" type="text" class="form-control" id="category_name" placeholder="category_name..." name="category_name">
                            
                           <input value="{{$categories->id}}" type="hidden"  name="category_id">

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category_description" class="col-sm-2 col-form-label">Category Description</label>
                        <div class="col-sm-10">
                              <textarea class="form-control" id="category_description" placeholder="category_description" name="category_description">{{$categories->Category_Description}}</textarea>
                        </div>
                      </div>
                      <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="publication_status" id="gridRadios1" value="1"  {{$categories->Publication_Status == 1 ? 'checked':''}} >
                              <label class="form-check-label" for="gridRadios1">
                               Published
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="publication_status" id="gridRadios2" value="0" {{$categories->Publication_Status == 0 ? 'checked':''}}>
                              <label class="form-check-label" for="gridRadios2">
                                Unpublished
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      
                      <div class="form-group row">
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary">Update Catgory</button>
                        </div>
                      </div>
                    </form>
                 

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
