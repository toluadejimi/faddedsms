<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Log Marketplace - BRST LOG SITE</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">FADDEDSMS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">


                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(url('')); ?>/public/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="admin-dashboard"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                </div>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" href="/users" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Users</a>

                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="manual-payment"><i class="fab fa-fw fa-wpforms"></i>Manual Payment</a>

                            </li>





                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->

                     <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message')); ?>

                        </div>
                        <?php endif; ?>
                        <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('error')); ?>

                        </div>
                        <?php endif; ?>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Admin Dashboard</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">All User</h5>
                                        <div class="metric-value d-inline-block">

                                            <?php echo e(number_format($user)); ?>


                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total In</h5>
                                        <div class="metric-value d-inline-block">

                                           NGN <?php echo e(number_format($total_in)); ?>



                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Out</h5>
                                        <div class="metric-value d-inline-block">
                                         NGN <?php echo e(number_format($total_out)); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted"> All Verifed Text</h5>
                                        <div class="metric-value d-inline-block">

                                         <?php echo e(number_format($total_verified_message)); ?>



                                        </div>
                                    </div>
                                </div>
                            </div>










                        </div>
                        <div class="row">

                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-dark">
                                                <tr class="border-0">
                                                    <th class="border-0">User</th>
                                                    <th class="border-0">Order ID</th>
                                                    <th class="border-0">Country</th>
                                                    <th class="border-0">Type</th>
                                                    <th class="border-0">Service</th>
                                                    <th class="border-0">Phone</th>
                                                    <th class="border-0">SMS</th>
                                                    <th class="border-0">Amount</th>
                                                    <th class="border-0">Status</th>
                                                    <th class="border-0">Date</th>
                                                    <th class="border-0">Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php $__empty_1 = true; $__currentLoopData = $verification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                                    <tr>

                                                        <td><a href="view-user?id=<?php echo e($data->user->id ?? "ID"); ?>"><?php echo e($data->user->username ?? "username"); ?></a> </td>
                                                        <td><?php echo e($data->order_id); ?> </td>
                                                        <td><?php echo e($data->country); ?> </td>
                                                        <?php if($data->type == 3): ?>
                                                            <td> 3SIM </td>
                                                        <?php elseif($data->type == 2): ?>
                                                            <td> SMSPOOL </td>
                                                        <?php else: ?>
                                                            <td> Diasy </td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($data->service); ?> </td>
                                                        <td><?php echo e($data->order_id); ?> </td>



                                                        <td><?php echo e($data->sms); ?> </td>
                                                        <td><?php echo e(number_format($data->cost, 2)); ?> </td>
                                                        <?php if($data->status == 2): ?>
                                                            <td>
                                                            <span
                                                                class="badge badge-pill badge-success">Successful</span>
                                                            </td>
                                                        <?php else: ?>
                                                            <td>
                                                                <span class="badge badge-pill badge-warning">Pending</span>

                                                            </td>
                                                        <?php endif; ?>


                                                        <td><?php echo e(date('d/m/y', strtotime($data->created_at))); ?> </td>
                                                        <td><?php echo e(date('h:i', strtotime($data->created_at))); ?> </td>


                                                    </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                    <tr>
                                                        <td> No Record Found</td>
                                                    </tr>

                                                <?php endif; ?>


                                                </tbody>

                                                <?php echo e($verification->links()); ?>



                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12" style="height:400px; width:100%; overflow-y: scroll;" class="p-2">

                                <div class="card">
                                    <h5 class="card-header">Update Cost / Rate</h5>
                                    <div class="card-body p-0">


                                        <div class="col-12 p-3">

                                            <form method="post" action="update-smspool-rate">
                                                <?php echo csrf_field(); ?>
                                                <label>SMS POOL RATE</label>
                                                <input class="form-control2 text-dark" name="rate" value="<?php echo e($usdtongn); ?>">

                                                <button type="submit" class="btn btn-primary">Update Rate</button>

                                            </form>

                                        </div>


                                        <div class="col-12 p-3">
                                            <form method="post" action="update-sim-cost">
                                                <?php echo csrf_field(); ?>
                                                <label>SMS POOL COST</label>
                                                <input class="form-control2 text-dark" name="cost" value="<?php echo e($margin); ?>">

                                                <button type="submit" class="btn btn-primary">Update Cost</button>
                                            </form>

                                        </div>

                                        <hr>

                                        <div class="col-12 p-3">
                                            <form method="post" action="update-sim-rate">
                                                <?php echo csrf_field(); ?>
                                                <label>SIM RATE</label>
                                                <input class="form-control2 text-dark" name="rate" value="<?php echo e($simrate); ?>">
                                                <button type="submit" class="btn btn-primary">Update Rate</button>
                                            </form>

                                        </div>


                                        <div class="col-12 p-3">
                                            <form method="post" action="update-sim-cost">
                                                <?php echo csrf_field(); ?>
                                                <label>SIM COST</label>
                                                <input class="form-control2 text-dark" name="cost" value="<?php echo e($simcost); ?>">

                                                <button type="submit" class="btn btn-primary">Update Cost</button>
                                            </form>

                                        </div>

                                        <hr>

                                        <div class="col-12 p-3">
                                            <form method="post" action="update-viop-rate">
                                                <?php echo csrf_field(); ?>
                                                <label>ON VIOP US RATE</label>
                                                <input class="form-control2 text-dark" name="rate" value="<?php echo e($vioprate); ?>">
                                                <button type="submit" class="btn btn-primary">Update Rate</button>
                                            </form>

                                        </div>


                                        <div class="col-12 p-3">
                                            <form method="post" action="update-viop-cost">
                                                <?php echo csrf_field(); ?>
                                                <label>ON VIOP US COST</label>
                                                <input class="form-control2 text-dark" name="cost" value="<?php echo e($viopcost); ?>">

                                                <button type="submit" class="btn btn-primary">Update Cost</button>
                                            </form>

                                        </div>



                                    </div>
                                </div>

                            </div>


                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Transaction</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Transaction ID</th>
                                                    <th class="border-0">User</th>
                                                    <th class="border-0">Type</th>
                                                    <th class="border-0">Amount</th>
                                                    <th class="border-0">Status</th>
                                                    <th class="border-0">Date</th>
                                                    <th class="border-0">Time</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                                    <tr>
                                                        <td><?php echo e($data->ref_id); ?> </td>
                                                        <td><?php echo e($data->user->username ?? "name"); ?> </td>
                                                        <?php if($data->type == 2): ?>
                                                            <td><span class="badge badge-success">Credit</span>
                                                            </td>
                                                        <?php else: ?>
                                                            <td><span class="badge badge-danger">Debit</span>
                                                            </td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(number_format($data->amount, 2)); ?> </td>
                                                        <?php if($data->status == 1): ?>
                                                            <td>
                                                            <span
                                                                class="badge badge-pill badge-warning">Intitated</span>
                                                            </td>

                                                        <?php elseif($data->status == 0): ?>
                                                            <td>
                                                                <span class="badge badge-pill badge-warning">Pending</span>
                                                            </td>

                                                        <?php elseif($data->status == 3): ?>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Cancled</span>
                                                            </td>

                                                        <?php elseif($data->status == 4): ?>
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Resolved</span>
                                                            </td>

                                                        <?php else: ?>
                                                            <td>
                                                            <span
                                                                class="badge badge-pill badge-success">Completed</span>

                                                            </td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(date('d/m/y', strtotime($data->created_at))); ?> </td>
                                                        <td><?php echo e(date('h:i', strtotime($data->created_at))); ?> </td>
                                                    </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                    <tr>
                                                        <td> No Record Found</td>
                                                    </tr>

                                                <?php endif; ?>
                                                </tbody>


                                            </table>
                                            <?php echo e($transaction->links()); ?>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2018 FADDEDSMS All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>

    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo e(url('')); ?>/public/concept/assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/admin-dashboard.blade.php ENDPATH**/ ?>