@extends('admin.master')


@section('content')
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                    <form action="{{route('admin.manufacturer.savemanufacturer')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="manufacturerName">manufacturer Name:</label>
                            <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" required>
                            <span class="text-danger">{{$errors->has('manufacturerName') ? $errors->first('manufacturerName'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="manufacturerDescription">manufacturer Description:</label>
                            <textarea class="form-control" rows="3" id="manufacturerDescription" name="manufacturerDescription" required></textarea>
                            <span class="text-danger">{{$errors->has('manufacturerDescription') ? $errors->first('manufacturerDescription'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Publication Status:</label>
                            <select class="form-control" id="publicationStatus" name="publicationStatus" required>
                                <option value="" >Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>

                            </select>
                            {{-- <span class="text-danger">{{$errors->has('publicationStatus') ? $errors->first('publicationStatus'):''}}</span> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>

                    </form>
            </div>

        </div>
    </div>


@endsection

