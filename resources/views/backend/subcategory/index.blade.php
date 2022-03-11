@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> SubCategories List</h1>
        </div>

        <a href="{{ route('subcategories.create') }}">
            <button class="btn btn-primary">Add New</button>
            {{-- <i class="fa fa-plus-circle fa-3x color-success" aria-hidden="true"></i> --}}
        </a>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Category id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category_id }}</td>
                                        <td>

                                            <form action="{{ route('subcategories.destroy', $brand->id) }}" method='POSt'>
                                                @csrf
                                                <a class="btn btn-warning"
                                                    href="{{ route('subcategories.edit', $brand->id) }}">Edit</a>
                                                @method('DELETE')
                                                <button type='submit' class="btn btn-danger">Delete</button>


                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
