@section('nav')
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('homepage') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GreenMarket</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Interface
    </div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Categories
            </div>

            <!-- Nav Item - Product -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productCategories.index') }}">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Product Categories</span></a>
            </li>

             <!-- Nav Item - Discount Categories-->
             <li class="nav-item">
                <a class="nav-link" href="{{ route('discountCategories.index') }}">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Discount Categories</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Buy
            </div>

            <!-- Nav Item - Order -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Customers -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.index') }}">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Customers</span></a>
            </li>

              <!-- Nav Item - Payments -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('payment.index') }}">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Payments</span></a>
            </li>

              <!-- Nav Item - Order Details -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('orderDetail.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Order Details</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

             <!-- Heading -->
             <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Deliveries-->
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('deliveries.index') }}">
                <i class="fas fa-fw fa-truck"></i>
                    <span>Deliveries</span></a>
            </li> -->

            <!-- Nav Item - Product -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Product</span></a>
            </li>

              <!-- Nav Item - Discount -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('discount.index') }}">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Discount</span></a>
            </li>

            <!-- Nav Item - Product Review -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productReview.index') }}">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Product Review</span></a>
            </li>

            <!-- Nav Item - Wishlist -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('wishlist.index') }}">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Wishlist</span></a>
            </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
<!-- End of Sidebar -->
@endsection