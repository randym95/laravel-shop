@extends('layouts.global')
@section('title')
    Edit Order
@endsection
@section('pageTitle')
    Edit Order {{ $order->user->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <form action=" {{ route('orders.update', ['id' => $order->id]) }} " method="POST" class="shadow-sm bg-white p-3">
                @csrf
                @method('PUT')
    
                <label for="invoice_number">Invoice number</label>
                <br>
                <input type="text" class="form-control" value=" {{ $order->invoice_number }} " disabled>
                <br>
                
                <label for="">Buyer</label>
                <br>
                <input type="text" class="form-control" value=" {{ $order->user->name }} " disabled>
                <br>
    
                <label for="created_at">Order Date</label>
                <br>
                <input type="text" class="form-control" value=" {{ $order->created_at }} " disabled>
                <br>
    
                <label for="">Books ({{ $order->totalQuantity }})</label>
                <br>
                <ul>
                    @foreach ($order->books as $book)
                        <li>{{ $book->title }} <b>{{ $book->pivot->quantity }}</b></li>
                    @endforeach
                </ul>
    
                <label for="">Total price</label>
                <br>
                <input type="text" class="form-control" value=" {{ $order->total_price }} " disabled>
                <br>
    
                <label for="status">Status</label>
                <br>
                <select name="status" id="status" class="form-control">
                    <option value="SUBMIT" {{ $order->status == "SUBMIT" ? "selected" : "" }}>
                        SUBMIT
                    </option>
                    <option value="PROCESS" {{ $order->status == "PROCESS" ? "selected" : "" }}>
                        PROCESS
                    </option>
                    <option value="FINISH" {{ $order->status == "FINISH" ? "selected" : "" }}>
                        FINISH
                    </option>
                    <option value="CANCEL" {{ $order->status == "CANCEL" ? "selected" : "" }}>
                        CANCEL
                    </option>
                </select>
                <br>
    
                <input type="submit" class="btn btn-primary" value="update">
            </form>
        </div>
    </div>
@endsection