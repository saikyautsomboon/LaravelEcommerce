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
        <a href="{{ route('subcategories.index') }}"> <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form method='post' action='{{ route('subcategories.update', $subcategory->id) }}'
                            enctype='multipart/form-data'>

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name='name' id="names" type="text"
                                    value="{{ $subcategory->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Category</label>


                                <select class="custom-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($subcategory->category_id == $category->id) selected="selected"@endif>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>


                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
