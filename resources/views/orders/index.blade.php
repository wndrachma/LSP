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
                        <h1 class="h3 mb-0 text-gray-800">Order Data</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                   <!-- Awal Table -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <p class="d-inline-flex gap-1">
                <a href="{{ route('orders.create') }}" class="btn btn-primary active" role="button">Add New Orders</a>
            </p>
             
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Amount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $i => $data)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                        {{ $i + 1 .". " }}
                          </div>
                      </td>
                      <td>
                        {{ $data->customer_id }}
                      </td>
                      <td>
                        {{ $data->order_date }}
                      </td>
                      <td>
                        {{ $data->total_amount }}
                      </td>
                      <td>
                        {{ $data->status }}
                      </td>
                      <td class="align-middle text-center text-sm">
                      <a href=" {{ route ('orders.edit', $data) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="/hapusOdr/{{$data->id}}"
                                class="btn btn-danger" data-id="{{ $data->id }}" onclick="return confirm('Are You Sure?')">Delete</a>
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