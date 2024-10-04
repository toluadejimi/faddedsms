<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <div class="mt-2">

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


                    </div>

                    <h4 class="mb-3" style="color: #fc6507">Hi <?php echo e(Auth::user()->username); ?> 👋</h4>
                    <p class="mb-0">
                        <a href="fund-wallet" class="btn btn-dark mb-4" >NGN <?php echo e(number_format(Auth::user()->wallet, 2)); ?></a>
                    </p>
                    <p class="mb-2">
                        What will you like to do ?
                    </p>












                    <a class="btn btn-dark border-0" href="/world"
                       style="background: #064175"
                    >
                        SERVER 1
                    </a>


                    <a class="btn btn-dark border-0" href="/cworld"
                       style="background: #fc6507"
                    >
                        SERVER 2
                    </a>






                    <div class="col-12 my-5">
                        <?php if(auth()->guard()->check()): ?>
                            <div class="col-12">
                                <div class="card" style="background: #064174; color: #ffffff">
                                    <div class="card-body">

                                        <div class="">

                                            <div class="p-2 col-lg-12">
                                                <strong>
                                                    <h4 class="text-white d-flex justify-content-center my-3">Verifications</h4>
                                                </strong>
                                            </div>

                                            <div>


                                                <div class="table-responsive ">
                                                    <table class="table">
                                                        <thead style="background: white; border: 0px;">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Service</th>
                                                            <th>Phone No</th>
                                                            <th>Code</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                            <th>Date</th>


                                                        </tr>
                                                        </thead>
                                                        <tbody class="text-white">


                                                        <?php $__empty_1 = true; $__currentLoopData = $verification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <tr>
                                                                <td style="font-size: 12px; color: white"><?php echo e($data->id); ?></td>
                                                                <td style="font-size: 12px; color: white"><?php echo e($data->service); ?></td>
                                                                <td style="font-size: 12px; color: white"><a
                                                                        href="receive-sms?phone=<?php echo e($data->id); ?>"><?php echo e($data->phone); ?> </a>
                                                                </td>
                                                                <td style="font-size: 12px; color: white"><?php echo e($data->sms); ?></td>
                                                                <td style="font-size: 12px; color: white">
                                                                    ₦<?php echo e(number_format($data->cost, 2)); ?></td>
                                                                <td>
                                                                    <?php if($data->status == 1): ?>
                                                                        <span
                                                                            style="background: orange; border:0px; font-size: 10px"
                                                                            class="btn btn-warning btn-sm">Pending</span>
                                                                        <a href="delete-order?id=<?php echo e($data->id); ?>&delete=1"
                                                                           style="background: rgb(168, 0, 14); border:0px; font-size: 10px"
                                                                           class="btn btn-warning btn-sm">Delete</span>

                                                                            <?php else: ?>
                                                                                <span style="font-size: 10px;"
                                                                                      class="text-white btn btn-success btn-sm">Completed</span>
                                                                    <?php endif; ?>

                                                                </td>
                                                                <td style="font-size: 12px; color: white"><?php echo e($data->created_at); ?></td>
                                                            </tr>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                            <h6>No verification found</h6>
                                                        <?php endif; ?>

                                                        </tbody>

                                                        <?php echo e($verification->links()); ?>


                                                    </table>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div><!-- [ sample-page ] end -->

                                <?php endif; ?>
                            </div>












                            <div class="row">
                                <div class="col-md-6 col-xl-6 col-sm-12">
                                    <div class="card">
                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                                            <div class="offcanvas-body">



                                                <div class="">

                                                    <div class="p-2 col-lg-6">
                                                        <input type="text" id="searchInput" class="form-control"
                                                               placeholder="Search for a service..." onkeyup="filterServices()">
                                                    </div>


                                                    <div class="row my-3 p-1 text-white"
                                                         style="background: #dedede; border-radius: 10px; font-size: 10px; border-radius: 12px">
                                                        <div class="col-5">
                                                            <h5 class="mt-2">Services</h5>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mt-2">Price</h5>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div style="height:700px; width:100%; overflow-y: scroll;" class="p-2">


                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row service-row text-white">
                                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $innerKey => $innerValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div style="font-size: 11px" class="col-5 service-name d-flex justify-content-start">
                                                                    🇺🇸 <?php echo e($innerValue->name); ?>

                                                                </div>

                                                                <div style="font-size: 11px" class="col">
                                                                    <?php $cost = $get_rate * $innerValue->cost + $margin  ?>
                                                                    <strong>N<?php echo e(number_format($cost, 2)); ?></strong>
                                                                </div>

                                                                <div style="font-size: 11px" class="col">

                                                                </div>


                                                                <div class="col mr-3">
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <form action="order-usano" method="POST">
                                                                            <input hidden name="service" value="<?php echo e($key); ?>">
                                                                            <input hidden name="price" value="<?php echo e($cost); ?>">
                                                                            <input hidden name="cost" value="<?php echo e($innerValue->cost); ?>">
                                                                            <input hidden name="name" value="<?php echo e($innerValue->name); ?>">
                                                                            <button class="myButton" style="border: 0px; background: transparent" onclick="hideButton(this)"><i class="fa fa-shopping-bag"></i></button>
                                                                        </form>
                                                                    <?php else: ?>

                                                                        <a class=""
                                                                           href="/login">
                                                                            <i class="fa fa-lock text-dark"> Login</i>
                                                                        </a>
                                                                    <?php endif; ?>


                                                                    <script>
                                                                        function hideButton(link) {
                                                                            // Hide the clicked link
                                                                            link.style.display = 'none';

                                                                            setTimeout(function () {
                                                                                link.style.display = 'inline'; // or 'block' depending on your layout
                                                                            }, 5000); // 5 seconds
                                                                        }
                                                                    </script>


                                                                </div>


                                                                <hr style="border-color: #cccccc" class=" my-2">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>


                    </div>

                    <div
                        class="offcanvas offcanvas-bottom"
                        tabindex="-1"
                        id="offcanvasBottom"
                        aria-labelledby="offcanvasBottomLabel"
                    >
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasBottomLabel">
                                Offcanvas bottom
                            </h5>
                            <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="offcanvas-body py-0">



                        </div>

                    </div>



                </div>
            </div>
        </div>






    </section>



    <script>
        function filterServices() {
            var input, filter, serviceRows, serviceNames, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            serviceRows = document.getElementsByClassName("service-row");
            for (i = 0; i < serviceRows.length; i++) {
                serviceNames = serviceRows[i].getElementsByClassName("service-name");
                txtValue = serviceNames[0].textContent || serviceNames[0].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    serviceRows[i].style.display = "";
                } else {
                    serviceRows[i].style.display = "none";
                }
            }
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('data-table');
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const countdownElement = row.cells[2]; // Assumes "Expires" is in the third column (index 2)
                let seconds = parseInt(countdownElement.getAttribute('data-seconds'), 10);

                const countdownInterval = setInterval(function () {
                    countdownElement.textContent = seconds + 's';

                    if (seconds <= 0) {
                        clearInterval(countdownInterval);
                        // Add your logic to handle the expiration, e.g., sendPostRequest(row);
                        console.log('Expired:', row);
                    }

                    seconds--;
                }, 1000);
            });

            // You may add the sendPostRequest function here or modify the code accordingly
        });
    </script>

    <script>
        $(document).ready(function () {
            //change selectboxes to selectize mode to be searchable
            $("select").select2();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/home.blade.php ENDPATH**/ ?>