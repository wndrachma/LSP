@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'product')
@section('content')

<!-- Begin Page Content -->
               <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
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
<a href="{{ route('product.create') }}" class="btn btn-primary active" role="button">Add New Product</a>
</p>

</div>
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0">
<thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Category Id</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Name</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok Quantity</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image 1</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image 2</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image 3</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image 4</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image 5</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
        <th class="text-secondary opacity-7"></th>
      </tr>
</thead>
                <tbody>
                @foreach ($product as $i => $data)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                    {{ $i + 1 .". " }}
                      </div>
                  </td>
                  <td>
                    {{ $data->product_category_id }}
                  </td>
                  <!-- tooltip product -->
                  @if (strlen($data->product_name) > 20)
                        <td data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="{{ $data->product_name }}" style="cursor: help;">
                          {{ substr($data->product_name, 0, 20) . '...' }}</td>
                      @else
                      <td>{{$data->product_name}}</td>
                      @endif

                  <!-- tooltip deskripsi -->
                  @if (strlen($data->description) > 18)
                        <td data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="{{ $data->description }}" style="cursor: help;">
                          {{ substr($data->description, 0, 18) . '...' }}</td>
                      @else
                      <td>{{$data->description}}</td>
                      @endif
                  <td>
                    {{ $data->price }}
                  </td>
                  <td>
                    {{ $data->stok_quantity }}
                  </td>
                  
                  <!-- zoom foto -->
                  <td class="text-center">
                        <img src="storage/{{$data->image1_url}}" class="w-5 img-thumbnail zoom"
                          data-bs-toggle="modal" data-bs-target="#image1_url_{{ $data->id }}">
                      </td>
                      <td class="text-center">
                        <img src="storage/{{$data->image2_url}}" class="w-5 img-thumbnail zoom"
                          data-bs-toggle="modal" data-bs-target="#image2_url_{{ $data->id }}">
                      </td>
                      <td class="text-center">
                        <img src="storage/{{$data->image3_url}}" class="w-5 img-thumbnail zoom"
                          data-bs-toggle="modal" data-bs-target="#image3_url_{{ $data->id }}">
                      </td>
                      <td class="text-center">
                        <img src="storage/{{$data->image4_url}}" class="w-5 img-thumbnail zoom"
                          data-bs-toggle="modal" data-bs-target="#image4_url_{{ $data->id }}">
                      </td>
                      <td class="text-center">
                        <img src="storage/{{$data->image5_url}}" class="w-5 img-thumbnail zoom"
                          data-bs-toggle="modal" data-bs-target="#image5_url_{{ $data->id }}">
                      </td>

                  <td class="align-middle text-center text-sm">
                      <a href=" {{ route ('product.edit', $data-> id) }}"
                                class="btn btn-primary">Edit</a>
                        <a href="/hapusPrdct/{{$data->id}}"
                            class="btn btn-danger" data-id="{{ $data->id }}" onclick="return confirm('Are You Sure?')">Delete</a>
                  </td>
                  <!-- UNTUK LIHAT FOTO/PENCET FOTO -->
                     <!-- Modal Foto 1 -->
                     <div class="modal fade" id="image1_url_{{ $data->id }}" tabindex="-1"
                     aria-labelladby="image1_url_{{ $data->id }}label" aria-hidden="true">
                    <div class="modal-dialog modal-dailog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="storage/{{ $data->image1_url }}" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                    <!-- Modal Foto 2 -->
                     <div class="modal fade" id="image2_url_{{ $data->id }}" tabindex="-1"
                     aria-labelladby="image2_url_{{ $data->id }}label" aria-hidden="true">
                    <div class="modal-dialog modal-dailog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="storage/{{ $data->image2_url }}" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Foto 3 -->
                     <div class="modal fade" id="image3_url_{{ $data->id }}" tabindex="-1"
                     aria-labelladby="image3_url_{{ $data->id }}label" aria-hidden="true">
                    <div class="modal-dialog modal-dailog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="storage/{{ $data->image3_url }}" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Foto 4 -->
                     <div class="modal fade" id="image4_url_{{ $data->id }}" tabindex="-1"
                     aria-labelladby="image4_url_{{ $data->id }}label" aria-hidden="true">
                    <div class="modal-dialog modal-dailog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="storage/{{ $data->image4_url }}" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Foto 5 -->
                     <div class="modal fade" id="image5_url_{{ $data->id }}" tabindex="-1"
                     aria-labelladby="image5_url_{{ $data->id }}label" aria-hidden="true">
                    <div class="modal-dialog modal-dailog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="storage/{{ $data->image5_url }}" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
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