@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Items List</h1>
        </div>

        <a href="{{ route('items.create') }}">
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
                                    <th>Code No</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>price</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->codeno }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->photo) }}" width="100rem" height="100rem">
                                        </td>
                                        <td>{{ $item->price }}</td>

                                        <td>

                                            <form action="{{ route('items.destroy', $item->id) }}" method='POST'>
                                                @csrf
                                                <a class="btn btn-primary" href="{{route('items.show', $item->id) }}">Detail</a>
                                                <a class="btn btn-warning"
                                                    href="{{ route('items.edit', $item->id) }}">Edit</a>

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
