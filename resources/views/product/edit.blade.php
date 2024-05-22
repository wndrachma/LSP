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

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Product Form</h6>
                
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">

                    <!-- {{-- form --}} -->
                <div class="card-border-1 m-3 pt-3">
                    <form action="{{ route('product.update', $product) }}" method="POST" id="frmProduk">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ms-3 me-3">
                            <label for="product_category_id" class="form-label">Product Category Id</label>
                            <br>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                            <option value="">
                                @foreach ($productCategories as $pc)
                                    @if ($product->$productCategories == $pc)
                                    <option value="{{ $pc->id }}" selected>{{ $pc->category_name }}</option>
                                    @else
                                    <option value="{{ $pc->id }}">{{ $pc->category_name }}</option>
                                    @endif
                                @endforeach
                            </option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" rows="5" name="product_name" id="product_name" class="form-control" placeholder="Enter Your Product Name" aria-label="product_name" value="{{ $product->product_name }}">
                        </div>
                        <div class="mb-3 ms-3 me-3"> 
                            <label for="description" class="form-label">Description</label>
                            <input type="text" rows="5" name="description" id="description" class="form-control" placeholder="Enter Your Description" aria-label="description" value="{{ $product->description }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" rows="5" name="price" id="price" class="form-control" placeholder="Enter Your Price" aria-label="price" value="{{ $product->price }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="stok_quantity" class="form-label">Stok Quantity</label>
                            <input type="text" rows="5" name="stok_quantity" id="stok_quantity" class="form-control" placeholder="Enter Your Stok Quantity" aria-label="stok_quantity" value="{{ $product->stok_quantity }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="image1_url" class="form-label">Image1</label>
                            <input type="file" rows="5" name="image1_url" id="image1_url" class="form-control" placeholder="Enter Your Image" aria-label="image1_url">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="image2_url" class="form-label">Image2</label>
                            <input type="file" rows="5" name="image2_url" id="image2_url" class="form-control" placeholder="Enter Your Image" aria-label="image2_url">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="image3_url" class="form-label">Image3</label>
                            <input type="file" rows="5" name="image3_url" id="image3_url" class="form-control" placeholder="Enter Your Image" aria-label="image3_url">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="image4_url" class="form-label">Image4</label>
                            <input type="file" rows="5" name="image4_url" id="image4_url" class="form-control" placeholder="Enter Your Image" aria-label="image4_url">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="image5_url" class="form-label">Image5</label>
                            <input type="file" rows="5" name="image5_url" id="image2_url" class="form-control" placeholder="Enter Your Image" aria-label="image2_url">
                        </div>
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('product.index') }}" type="button" class="btn btn-danger">Cancel</a>
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