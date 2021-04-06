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
                    
                    @if(session('status_msg'))
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

                <form action="{{route('product_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                        <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                          <input type="text" value="{{$products->product_name}}" class="form-control" id="product_name" placehol
                                 der="product_name..." name="product_name">
                          <input type="hidden" value="{{$products->id}}" class="form-control" id="product_id" placeholder="product_name..." name="product_id">

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                         <select id="category_id" name="category_id" class="form-control">
                             
                             @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->Category_Name}}</option> 
                             @endforeach
                             
                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="product_short_description" class="col-sm-3 col-form-label">Product short Description</label>
                        <div class="col-sm-9">
                              <textarea class="form-control" id="product_short_description" placeholder="product_short_description" name="product_short_description">{{$products->product_short_description}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="ckeditor" class="col-sm-3 col-form-label">Product long Description</label>
                        <div class="col-sm-9">
                              <textarea class="form-control" id="ckeditor" placeholder="product_long_description" name="product_long_description">{{$products->product_long_description}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="price" placeholder="price..." name="price" value="{{$products->price}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="product_image" class="col-sm-3 col-form-label">Product Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="product_image" placeholder="" name="product_image">
                        </div>
                      </div>
                     <div class="form-group row">
                       <label for="" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <img src="{{asset('uploads/product_images')}}/{{$products->product_image}}" class="img-fluid">
                        </div>
                      </div>
                      <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-3 pt-0">Publication Status</legend>
                          <div class="col-sm-9">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="publication_status" id="gridRadios1" value="1" {{$products->publication_status == 1 ? 'checked':''}}>
                              <label class="form-check-label" for="gridRadios1" >
                               Published
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="publication_status" id="gridRadios2" value="0" {{$products->publication_status == 0 ? 'checked':''}}>
                              <label class="form-check-label" for="gridRadios2">
                                Unpublished
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      
                      
                      <div class="form-group row">
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary">Update Product</button>
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

    <script>
        document.forms['product_form'].elements['category_id'].value={{old('$products->category_id')}};
    </script>
     @include('admin.includes.footer')
