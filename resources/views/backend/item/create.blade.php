@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')

    @if ($errors->any())
        <div class="alert alert-dange">
            <strong class="text text-danger">Whoops!</strong>
            There were some problems with your input.<br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Create New Items</h1>
        </div>
        <a href="{{ route('items.index') }}"> <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form method='POST' action='{{ route('items.store') }}' enctype='multipart/form-data'>

                            @csrf
                            <div class="form-group">
                                <label for="code">Code No</label>
                                <input class="form-control" name='codeno' id="code" type="text"
                                    placeholder="Enter Your Item Code">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name='name' id="names" type="text"
                                    placeholder="Enter Your Item Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <input class="form-control-file @error('photo') is-invalid @enderror" name='photo' id="photos" type="file" aria-describedby="fileHelp">
                                @error('photo')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prices">Price</label>
                                <input class="form-control" name='price' id="prics" type="text"
                                    placeholder="Enter Your Item Price">
                            </div>
                            <div class="form-group">
                                <label for="discounts">Discount</label>
                                <input class="form-control" name='discount' id="discounts" type="text"
                                    placeholder="Enter Your Item Discount">
                            </div>
                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" id="descriptions" name="description" placeholder="Enter Your Item Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Brand</label>
                                <select class="custom-select" name="brand_id">

                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">SubCategory</label>
                                <select class="custom-select" name="subcategory_id">

                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
