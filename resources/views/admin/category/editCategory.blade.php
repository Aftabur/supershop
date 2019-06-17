@extends('admin.master')


@section('content')
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
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
                    <form action="{{route('admin.category.updateCategory')}}" method="POST" class="edit_form" name="editCategoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" class="form-control" value="{{$editdata->categoryName}}" id="categoryName" name="categoryName" required>
                            <input type="text" hidden class="form-control" value="{{$editdata->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Category Description:</label>
                            <textarea class="form-control" rows="3" id="categoryDescription" name="categoryDescription" required>{{$editdata->categoryDescription}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Publication Status:</label>
                            <select class="form-control" id="publicationStatus" name="publicationStatus" class="publicationStatus" required>

                                {{-- <option value="{{$editdata->publicationStatus}}">{{$editdata->publicationStatus == 1? 'published':'unpublished'}}</option> --}}
                                {{-- <option >Select</option> --}}

                                <option @if ($editdata->publicationStatus==1) selected @endif value="1">Published</option>
                                <option @if ($editdata->publicationStatus==0) selected @endif value="0">UnPublished</option>
                                    
                            
                                

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>

                    </form>
            </div>

        </div>
    </div>

    <script>
        
    </script>

@endsection

