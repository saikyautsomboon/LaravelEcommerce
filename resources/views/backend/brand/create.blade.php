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
            <h1><i class="fa fa-th-list"></i> Create New Brands</h1>
        </div>
        <a href="{{ route('brands.index') }}"> <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form method='POST' action='{{ route('brands.store') }}' enctype='multipart/form-data'>

                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name='name' id="names" type="text" placeholder="Enter Your Brand Name">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input class="form-control-file @error('photo') is-invalid @enderror" name='photo' id="photos" type="file" aria-describedby="fileHelp">
                                @error('photo')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
