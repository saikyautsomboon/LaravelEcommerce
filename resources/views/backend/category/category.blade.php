@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Categories</h1>
            <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Categories</a></li>
        </ul>
    </div>
        <table class='table table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src='{{ $category->photo }}'></td>
                    <td>
                        <a class="btn btn-warning">Edit</a>
                        <a class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</main>
@endsection
