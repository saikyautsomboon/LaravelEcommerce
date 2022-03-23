@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Order List</h1>
        </div>

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
                                    <th>Order Date</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Order No</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $order->orderdate }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ number_format($order->total) }}</td>
                                        <td>{{ $order->orderno }}</td>
                                        <td>{{ $order->location }}</td>
                                        <td>

                                            <form action="{{ route('orders.destroy', $order->id) }}" method='POST'>
                                                @csrf
                                                <a class="btn btn-warning"
                                                    href="{{ route('orders.show', $order->id) }}">Detail</a>
                                                {{-- <a class="btn btn-success" --}}
                                                {{-- href="{{ route('orders.update', $order->id) }}">Confirm</a> --}}
                                                @method('DELETE')
                                                <button type='submit' class="btn btn-danger">Cancel</button>


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
