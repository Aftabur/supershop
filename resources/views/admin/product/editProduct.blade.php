@extends('admin.master')


@section('content')
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
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
                    <form action="{{route('admin.product.updateProduct')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Product Name:</label>
                            <input type="text" class="form-control" value="{{$selectData->productName}}"id="productName" name="productName" required>
                            <input type="text" hidden class="form-control" value="{{$selectData->id}}" name="id">
                            <span class="text-danger">{{$errors->has('productName') ? $errors->first('productName'):''}}</span>
                        </div>


                        <div class="form-group">
                            <label for="sel1">Category Name:</label>
                            <select class="form-control" id="categoryId" name="categoryId" required>
                                {{-- <option >Select Category Name</option> --}}
                                @foreach ($categories as $item)
                                    <option {{$item->id===$selectData->categoryId ? 'selected':''}}  value="{{$item->id}}">{{ $item->categoryName}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Manufacturer Name:</label>
                            <select class="form-control" id="manufacturerId" name="manufacturerId" required>

                                @foreach ($manufacturers as $items)
                                    <option {{$items->id===$selectData->manufacturerId ? 'selected':''}}  value="{{$items->id}}">{{ $items->manufacturerName}}</option>
                                @endforeach
                                {{-- @foreach ($manufacturers as $manufacturer)
                                    <option 1==1 selecte value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                                @endforeach --}}


                            </select>

                        </div>
                        <div class="form-group">
                            <label for="productPrice">Product Price:</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" value="{{$selectData->productPrice}}" required>
                            <span class="text-danger">{{$errors->has('productPrice') ? $errors->first('productPrice'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="productQuantity">Product Quantity:</label>
                            <input type="number" class="form-control" id="productQuantity" name="productQuantity"  value="{{$selectData->productQuantity}}" required>
                            <span class="text-danger">{{$errors->has('productQuantity') ? $errors->first('productQuantity'):''}}</span>
                        </div>


                        <div class="form-group">
                            <label for="categoryDescription">product Short Description:</label>
                            <textarea class="form-control" rows="4" id="productShortDescription" name="productShortDescription" required>{{$selectData->productShortDescription}}</textarea>
                            <span class="text-danger">{{$errors->has('productShortDescription') ? $errors->first('productShortDescription'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="productLongDescription">product Long Description:</label>
                            <textarea class="form-control" rows="5" id="productLongDescription" name="productLongDescription" required> {{$selectData->productLongDescription}}</textarea>
                            <span class="text-danger">{{$errors->has('productLongDescription') ? $errors->first('productLongDescription'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Publication Status:</label>
                            <select class="form-control" id="publicationStatus" name="publicationStatus" required>

                                <option @if ($selectData->publicationStatus==1) selected @endif  value="1">Published</option>
                                <option @if ($selectData->publicationStatus==0) selected @endif  value="0">UnPublished</option>


                            </select>
                            {{-- <span class="text-danger">{{$errors->has('publicationStatus') ? $errors->first('publicationStatus'):''}}</span> --}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>

                    </form>
            </div>

        </div>
    </div>


@endsection

