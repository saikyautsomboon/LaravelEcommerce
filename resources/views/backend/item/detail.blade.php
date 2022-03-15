@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Item Details</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a href="{{ route('items.index') }}"> <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $item->name }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date : {{ $item->created_at }}</h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td rowspan="7">
                                            <img src={{ asset($item->photo) }}>
                                        </td>
                                        <td>Code No :</td>
                                        <td>{{ $item->codeno }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{ $item->name }}</td>

                                    </tr>
                                    <tr>

                                        <td>Price :</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                    <tr>

                                        <td>Discount :</td>
                                        <td>{{ $item->discount }}</td>
                                    </tr>
                                    <tr>

                                        <td>Description :</td>
                                        <td>{{ $item->description }}</td>
                                    </tr>
                                    <tr>

                                        <td>Brand :</td>
                                        <td>{{ $item->brand_id }}</td>
                                    </tr>
                                    <tr>

                                        <td>SubCategory :</td>
                                        <td>{{ $item->subcategory_id }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </section>
            </div>
        </div>
    </div>
@endsection
