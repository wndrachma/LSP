@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'payment')
@section('content')

<!-- Begin Page Content -->
             <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Payments</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- {{-- Awal Table --}} -->
<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
<div class="card mb-4">
<div class="card-header pb-0">

<h6>Payment Form</h6>

</div>
<div class="card-body px-0 pt-0 pb-2">
<div class="table-responsive p-3">

<!-- {{-- form --}} -->
<div class="card-border-1 m-3 pt-3">
<form action="{{ route('payment.update', $payment) }}" method="POST" id="frmPayment">
@method('PUT')
@csrf
<div class="mb-3 ms-3 me-3">
<label for="order_id" class="form-label">Order Id</label>
<br>
        <select class="form-control" name="order_id" id="order_id">
        <option value="">
            @foreach ($order as $o)
                @if($payment->order == $o)
                <option value="{{ $o->id }}" selected>{{ $o->id }}</option>
                @else
                <option value="{{ $o->id }}">{{ $o->id }}</option>
                @endif
            @endforeach
        </option>
        </select>
    </div>
    <div class="mb-3 ms-3 me-3">
        <label for="payment_date" class="form-label">Payment Date</label>
        <input type="datetime-local" rows="5" name="payment_date" id="payment_date" class="form-control" placeholder="Enter Your Payment Date" aria-label="payment_date" value="{{ $payment->payment_date }}">
    </div>
    <div class="mb-3 ms-3 me-3">
        <label for="payment_method" class="form-label">Payment Method</label>
        <input type="text" rows="5" name="payment_method" id="payment_method" class="form-control" placeholder="Enter Your Payment Method" aria-label="payment_method" value="{{ $payment->payment_method }}">
    </div>
    <div class="mb-3 ms-3 me-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="text" rows="5" name="amount" id="amount" class="form-control" placeholder="Enter Your Amount" aria-label="amount" value="{{ $payment->amount }}">
    </div>
    <div class="row ms-3 me-3 justify-content-end">
        <div class="col-3">
            <a href="{{ route('payment.index') }}" type="button" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary" id="save">Save</button>
        </div>
    </div>
</form>
</div>
<!-- {{-- end form --}} -->
</div>
</div>
</div>
</div>
</div>

@endsection