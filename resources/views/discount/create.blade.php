@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'discount')
@section('content')     
 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Discount</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Discount Form</h6>
                
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
                    <form action="/discount" method="POST" id="frmDscn">
                    @csrf
                        <div class="mb-3 ms-3 me-3">
                            <label for="category_discount_id" class="form-label">Discount Category Id</label>
                            <select class="form-control" name="category_discount_id" id="category_discount_id">
                            <option value="">
                                @foreach ($category_name as $d)
                                    <option value="{{ $d->id }}">{{ $d->category_name }}</option>
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="product_id" class="form-label">Product Id</label>
                            <select class="form-control" name="product_id" id="product_id">
                            <option value="">
                                @foreach ($product_name as $p)
                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="datetime-local" rows="5" name="start_date" id="start_date" class="form-control" placeholder="Enter Your Start Date" aria-label="start_date">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="datetime-local" rows="5" name="end_date" id="end_date" class="form-control" placeholder="Enter Your End Date" aria-label="end_date">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="percentage" class="form-label">Percentage</label>
                            <input type="number" rows="5" name="percentage" id="percentage" class="form-control" placeholder="Enter Your Percentage" aria-label="percentage">
                        </div>
    
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('discount.index') }}" type="button" class="btn btn-danger">Cancel</a>
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