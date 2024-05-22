@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'orders')
@section('content')
  
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Order</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Order Form</h6>
                
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">

                    <!-- {{-- form --}} -->
                <div class="card-border-1 m-3 pt-3">
                    <form action="{{ route('orders.update', $orders) }}" method="POST" id="frmOrder">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ms-3 me-3">
                            <label for="customer_id" class="form-label">Customer Id</label>
                            <br>
                            <select class="form-control" name="customer_id" id="customer_id">
                            <option value="">
                                @foreach ($customer as $c)
                                    @if($orders->customer == $c)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                    @else
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="order_date" class="form-label">Order Date</label>
                            <input type="datetime-local" rows="5" name="order_date" id="order_date" class="form-control" placeholder="Enter Your Order Date" aria-label="order_date" value="{{ $orders->order_date }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="text" rows="5" name="total_amount" id="total_amount" class="form-control" placeholder="Enter Your Total Amount" aria-label="total_amount" value="{{ $orders->total_amount }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" rows="5" name="status" id="status" class="form-control" placeholder="Enter Your Status" aria-label="status" value="{{ $orders->status }}">
                        </div>
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('orders.index') }}" type="button" class="btn btn-danger">Cancel</a>
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