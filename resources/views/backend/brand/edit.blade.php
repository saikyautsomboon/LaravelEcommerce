@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')

    @if ($errors->any())
        <div class="alert alert-dange">
            <strong>Whoops!</strong>
            There were some problems with your input.<br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Brand Update Table</h1>
        </div>
        <a href="{{ route('brands.index') }}"> <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form method='post' action='{{ route('brands.update', $brand->id) }}' enctype='multipart/form-data'>

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name='name' id="names" type="text"
                                    value="{{ $brand->name }}">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="oldphoto-tab" data-toggle="tab" href="#oldphoto" role="tab"
                                            aria-controls="oldphoto" aria-selected="true">Old Photo</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="newphoto-tab" data-toggle="tab" href="#newphoto"
                                            role="tab" aria-controls="newphoto" aria-selected="false">New Photo</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent" >
                                    <div class="tab-pane fade show active my-3" id="oldphoto" role="tabpanel"
                                        aria-labelledby="oldphoto-tab">
                                        <img src="{{ asset($brand->photo) }}" class="img-responsive img-fluid " width="20%">
                                    </div>
                                    <div class="tab-pane fade my-3" id="newphoto" role="tabpanel" aria-labelledby="newphoto-tab">
                                        <input class="form-control-file" name='photo' id="photos" type="file"
                                            aria-describedby="fileHelp">
                                    </div>

                                </div>


                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
