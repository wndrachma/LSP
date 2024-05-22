@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'customer')
@section('content')     

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Customer Form</h6>
                
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">

                    <!-- {{-- form --}} -->
                <div class="card-border-1 m-3 pt-3">
                    <form action="{{ route('customer.update', $customer) }}" method="POST" id="frmCustomer">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ms-3 me-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-label="name" value="{{ $customer->name }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" rows="5" name="email" id="email" class="form-control" placeholder="Enter Your Email" aria-label="email" value="{{ $customer->email }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" rows="5" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-label="password" value="{{ $customer->password }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" rows="5" name="phone" id="phone" class="form-control" placeholder="Enter Your Number" aria-label="phone" value="{{ $customer->phone }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label class="address1">Address1</label>
                            <textarea name="address1" id="address1" cols="20" rows="3"  class="form-control" value="{{ $customer->address1 }}" value="{{ $customer->address1 }}"></textarea>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label class="address2">Address2</label>
                            <textarea name="address2" id="address2" cols="20" rows="3"  class="form-control" value="{{ $customer->address2 }}"></textarea>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label class="address3">Address3</label>
                            <textarea name="address3" id="address3" cols="20" rows="3"  class="form-control" value="{{ $customer->address3 }}"></textarea>
                        </div>
    
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('customer.index') }}" type="button" class="btn btn-danger">Cancel</a>
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