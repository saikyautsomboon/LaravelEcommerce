@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Categories List</h1>
        </div>

        <a href="{{ route('categories.create') }}">
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
                                    <th>Photo</th>
                                    <th>Item Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{-- <input type="text" value="{{ asset($category->photo) }}"> --}}
                                            <img src="{{ asset($category->photo) }}" width="100rem" height="100rem">
                                        </td>
                                        <td>{{ count($category->items) }}</td>
                                        <td>

                                            <form action="{{ route('categories.destroy', $category->id) }}" method='POST'>
                                                @csrf
                                                <a class="btn btn-warning"
                                                    href="{{ route('categories.edit', $category->id) }}">Edit</a>
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
