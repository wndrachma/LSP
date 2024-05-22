@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'discount')
@section('content')
    
    <!-- Awal Table -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <p class="d-inline-flex gap-1">
                <a href="{{ route('discount.create') }}" class="btn btn-primary active" role="button">Add New Discount</a>
            </p>
             
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Discount Category Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($diskon as $i => $data)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                        {{ $i + 1 .". " }}
                          </div>
                      </td>
                      <td>
                        {{ $data->category_discount_id }}
                      </td>
                      <td>
                        {{ $data->product_id}}
                      </td>
                      <td>
                        {{ $data->start_date }}
                      </td>
                      <td>
                        {{ $data->end_date }}
                      </td>
                      <td>
                        {{ $data->percentage }}
                      </td>
                      <td class="align-middle text-center text-sm">
                      <a href=" {{ route ('discount.edit', $data) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="/hapusDscn/{{$data->id}}"
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