@extends('admin.master')


@section('content')
 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Tables</h1>
 <p class="mb-4">@if(Session::has('message'))
<p style="color:black" id="alert_message" class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    @if(Session::has('failedMessage'))
        <p style="color:black" id="alert_message" class="alert alert-danger">{{Session::get('failedMessage')}}</p>
    @endif
</p>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">View Product</h6>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered table-hover"  width="" cellspacing="0">
           <tr>
               <th>Product Id</th>
               <th>{{$viewdata->id}}</th>
           </tr>
           <tr>
                <th>Product Name</th>
                <th>{{$viewdata->productName}}</th>
            </tr>
            <tr>
                <th>Category Name</th>
                <th>{{$viewdata->categoryName}}</th>
            </tr>
            <tr>
                <th>Manufacture Name</th>
                <th>{{$viewdata->manufacturerName}}</th>
            </tr>
            <tr>
                <th>Product Price</th>
                <th>{{$viewdata->productPrice}} Tk</th>
            </tr>
            <tr>
                <th>Product Quantity</th>
                <th>{{$viewdata->productQuantity}}</th>
            </tr>
            <tr>
                <th>Product ShortDescription</th>
                <th>{{$viewdata->productShortDescription}}</th>
            </tr>
            <tr>
                <th>Product LongDescription</th>
                <th>{{$viewdata->productLongDescription}}</th>
            </tr>
            <tr>
                <th>Publication Status</th>
                <th>{{$viewdata->publicationStatus ==1 ? 'Published':'UnPublished'}}</th>
            </tr>
            <tr>
                <th>Product Image</th>
                <th ><img style="height:200px;" src="{{asset('attendance_file/'.$viewdata->productImage)}}" alt="{{asset('attendance_file/'.$viewdata->productImage)}}" class="img-fluid"></th>
            </tr>


       </table>
     </div>
   </div>
 </div>


@endsection

