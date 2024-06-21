@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

       <!-- Daily Earnings Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 daily-earnings-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Daily)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $dailyEarnings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                    <a href="{{ route('order.detail', ['period' => 'daily']) }}" class="btn btn-primary">Detail Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weekly Earnings Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 daily-earnings-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Earnings (Weekly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $weeklyEarnings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                    <a href="{{ route('order.detail', ['period' => 'weekly']) }}" class="btn btn-primary">Detail Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Earnings Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 daily-earnings-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $monthlyEarnings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                    <a href="{{ route('order.detail', ['period' => 'weekly']) }}" class="btn btn-primary">Detail Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annual Earnings Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $annualEarnings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <br>
                <div class="text-center">
                    <a href="{{ route('order.detail', ['period' => 'annual']) }}" class="btn btn-primary">Detail Laporan</a>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection