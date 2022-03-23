@extends('backend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Order Details</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->user->name }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: {{ $order->orderdate }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">From
                            <address><strong>{{ Auth::user()->name }}</strong><br>
                                518 Akshar Avenue<br>
                                Gandhi Marg<br>
                                New Delhi<br>
                                Email: {{ Auth::user()->email }}
                            </address>
                        </div>
                        <div class="col-4">To
                            <address><strong>{{ $order->user->name }}</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA
                                94107<br>
                                Phone: (555) 539-1037<br>
                                Email: {{ $order->user->email }}
                            </address>
                        </div>
                        <div class="col-4">
                            <b>Invoice #007612</b><br><br>
                            <b>Order ID:</b> {{ $order->orderno }}<br>
                            <b>Account:</b>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($order->items as $item)
                                @php
                                    $qty = $item->pivot->qty;
                                    $subtotal = ($item->price - $item->discount) * $qty;
                                    $total += $subtotal;
                                @endphp
                            @endforeach
                            {{ number_format($total) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($order->items as $item)
                                        @php
                                            // pivot ထုတ်တာ
                                            $qty = $item->pivot->qty;
                                            $subtotal = ($item->price - $item->discount) * $qty;
                                        @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>{{ number_format($item->discount) }}</td>
                                            <td>{{ number_format($subtotal) }}</td>
                                            <td>

                                                <form action="{{ route('orders.destroy', $item->id) }}" method='POST'>
                                                    @csrf
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
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"
                                target="_blank">Confirm</a></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
