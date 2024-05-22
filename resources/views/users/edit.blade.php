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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                    <form action="{{ route('users.update', $users) }}" method="POST" id="frmUser">
                    @method('PUT')
                    @csrf
                        <div class="mb-3 ms-3 me-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="name" aria-label="name" value="{{ $users->name }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" rows="5" name="email" id="email" class="form-control" placeholder="email" aria-label="email" value="{{ $users->email }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" rows="5" name="password" id="password" class="form-control" placeholder="Password" aria-label="password" value="{{ $users->password }}">
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label class="form-label">Roles</label>
                            <select class="form-control" name="roles" id="roles" aria-label="Default select example" value="{{$users->roles ?? old ('roles')}}">
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                            </select>
                        </div>
                        <div class="mb-3 ms-3 me-3">
                            <label for="aktif" class="form-label">Status</label>
                        <select class="form-control border-0" id="aktif" name="aktif" aria-label="Aktif">
                            <option value="1" {{ $users->aktif === 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $users->aktif === 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
    
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