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
     <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>categoryName</th>
             <th>categoryDescription</th>
             <th>publicationStatus</th>
             <th class="text-center">Action</th>

           </tr>
         </thead>

         <tbody>

            @php
                $i=0;
            @endphp
            @foreach ($manageData as $item)
                <tr>
                    <td>{{++$i}}</td>
                    <td class="text-center">{{$item->categoryName}}</td>
                    <td>{{$item->categoryDescription}}</td>
                    <td class="text-center">{{$item->publicationStatus==1 ? 'Published':'Unpublished'}}</td>
                    <td class="d-flex">
                        <a href="{{route('admin.category.editCategory',$item->id)}}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                        <a href="{{route('admin.category.deleteCategory',$item->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>


                </tr>
            @endforeach

         </tbody>
       </table>
     </div>
   </div>
 </div>


@endsection

