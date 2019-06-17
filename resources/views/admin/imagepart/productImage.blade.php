@extends('admin.master')


@section('content')
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product Image</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center">
        <div class="col-md-6 mt-4 mb-4">
                @if(Session::has('message'))
                <p style="color:black" id="alert_message" class="alert alert-success">{{Session::get('message')}}</p>
                @endif
                @if(Session::has('failedMessage'))
                    <p style="color:black" id="alert_message" class="alert alert-danger">{{Session::get('failedMessage')}}</p>
                @endif

            <div class="categoryadd_body">
                    <form action="{{route('admin.product.storeImageUpload')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="productimageTitle">Image Title:</label>
                            <input type="text" class="form-control" id="productimageTitle" name="productimageTitle" required>
                            <span class="text-danger">{{$errors->has('productimageTitle') ? $errors->first('productimageTitle'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="productimageupload">Image Upload:</label>
                            <input type="file" class="form-control" id="productimageupload" name="productimageupload" required >
                            <span class="text-danger">{{$errors->has('productimageupload') ? $errors->first('productimageupload'):''}}</span>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>

                    </form>
            </div>

        </div>
    </div>


@endsection

