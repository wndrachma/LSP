@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'wishlist')
@section('content')
  
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Product Review</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Product Review Form</h6>
                
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">

                    <!-- {{-- form --}} -->
                <div class="card-border-1 m-3 pt-3">
                    <form action="{{ route('wishlist.update', $wishlist) }}" method="POST" id="frmwish">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ms-3 me-3">
                            <label for="customer_id" class="form-label">Customer Id</label>
                            <br>
                            <select class="form-control" name="customer_id" id="customer_id">
                            <option value="">
                                @foreach ($customer as $c)
                                    @if($wishlist->customer == $c)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                    @else
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="product_id" class="form-label">Product Id</label>
                            <select class="form-control" name="product_id" id="product_id" value="{{$wishlist->product_id ?? old ('product_id')}}">
                            <option value="">
                                @foreach ($product_name as $p)
                                    @if($wishlist->product_name == $p)
                                    <option value="{{ $p->id }}" selected>{{ $p->product_name }}</option>
                                    @else
                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                    @endif
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('wishlist.index') }}" type="button" class="btn btn-danger">Cancel</a>
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