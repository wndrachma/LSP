
@extends('dashboard.main')
@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection

@section('page', 'users')
@section('content')

<!-- Begin Page Content -->
                <div class="container-fluid">
<!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Data</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                <!-- {{-- Awal Table --}} -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                
                <h6>Users Form</h6>
                
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
                    <form action="/insertdatauser" method="POST" id="frmUser">
                    @csrf
                        <div class="mb-3 ms-3 me-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-label="name">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" rows="5" name="email" id="email" class="form-control" placeholder="Enter Your mail" aria-label="email">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" rows="5" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-label="password">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="roles" class="form-label">Roles</label>
                            <select class="form-control" name="roles" id="roles" aria-label="Roles" rows="5">
                                <option value="1">Admin</option>
                                <option value="0">Owner</option>
                            </select>
                        </div>
                        @error('roles')
                            <div class="error-message"{{ $message }}></div>
                        @enderror

                        <!-- <div class="mb-3 ms-3 me-3">
                            <label for="text" class="form-label">Status</label>
                               <select class="form-select" aria-label="Default select example" id="aktif" name="aktif" >

                                <option value="Active">Active</option>
                                <option value="Unactive">Unactive</option>
                                </select>
                        </div> -->
                        <div class="mb-3 ms-3 me-3">
                            <label for="aktif" class="form-label">Status</label>
                            <select class="form-control" name="aktif" id="aktif" aria-label="Aktif">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        @error('roles')
                            <div class="error-message"{{ $message }}></div>
                        @enderror
    
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('users.index') }}" type="button" class="btn btn-danger">Cancel</a>
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
    
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    @endsection