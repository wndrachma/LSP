@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'orderDetail')
@section('content')
 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Order Details Form</h6>
                
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">

                    <!-- {{-- form --}} -->
                <div class="card-border-1 m-3 pt-3">
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error}}</p>
                        @endforeach
                    @endif
                    <form action="/OD" method="POST" id="frmOD">
                    @csrf
                        <div class="mb-3 ms-3 me-3">
                            <label for="product_id" class="form-label">Product Id</label>
                            <br>
                            <select class="form-control" name="product_id" id="product_id">
                            <option value="">
                                @foreach ($product_name as $p)
                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="order_id" class="form-label">Order Id</label>
                            <br>
                            <select class="form-control" name="order_id" id="order_id">
                            <option value="">
                                @foreach ($orders as $o)
                                    <option value="{{ $o->id }}">{{ $o->id }}</option>
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" rows="5" name="quantity" id="quantity" class="form-control" placeholder="Enter Your Quantity" aria-label="quantity">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="subtotal" class="form-label">Subtotal</label>
                            <input type="number" rows="5" name="subtotal" id="subtotal" class="form-control" placeholder="Enter Your Subtotal" aria-label="subtotal">
                        </div>
    
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('orderDetail.index') }}" type="button" class="btn btn-danger">Cancel</a>
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