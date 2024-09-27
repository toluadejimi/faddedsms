<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3" style="color: #fc6507">Hi <?php echo e(Auth::user()->username); ?> 👋</h4>
                    <p class="mb-0">
                        <a href="fund-wallet" class="btn btn-dark mb-4" >NGN <?php echo e(number_format(Auth::user()->wallet, 2)); ?></a>
                    </p>
                    <p class="mb-2">
                        What will you like to do ?
                    </p>
                    <button
                        class="btn btn-light-secondary my-3"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight"
                        style="background: #064174"
                    >
                        USA SERVICES
                    </button>


                    <a class="btn btn-dark border-0" href="/world"
                       style="background: #fc6507"
                    >
                        OTHER COUNTRIES SERVICES
                    </a>

                </div>
            </div>
        </div>




        <div class="container technology-block">
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center">
                <div class="card border-0 mb-5 rounded-20" style="background: #064174; color: #ffffff">
                    <div class="card-body">

                        <div class="card-header d-flex justify-content-center mb-3">
                            <h5 class="text-white">My Orders</h5>
                        </div>


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





                        <div class="col-xl-12 col-md-12 col-sm-12  justify-center" >
                            <div class="card" style="background: #064174; color: #ffffff">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="background: white; border: 0px;">
                                            <tr>
                                                <th>Service</th>
                                                <th>Phone</th>
                                                <th>SMS</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td style="font-size: 12px; color: white;"><?php echo e($data->service); ?></td>
                                                    <td style="font-size: 12px; color: white;"><?php echo e($data->phone); ?>

                                                    </td>

                                                    <?php if($data->sms != null): ?>
                                                        <td style="font-size: 12px; color: white"><?php echo e($data->sms); ?>

                                                        </td>
                                                    <?php else: ?>
                                                        <style>
                                                            /* HTML: <div class="loader"></div> */
                                                            .loader {
                                                                width: 50px;
                                                                aspect-ratio: 1;
                                                                display: grid;
                                                                animation: l14 4s infinite;
                                                            }

                                                            .loader::before,
                                                            .loader::after {
                                                                content: "";
                                                                grid-area: 1/1;
                                                                border: 8px solid;
                                                                border-radius: 50%;
                                                                border-color: red red #0000 #0000;
                                                                mix-blend-mode: darken;
                                                                animation: l14 1s infinite linear;
                                                            }

                                                            .loader::after {
                                                                border-color: #0000 #0000 blue blue;
                                                                animation-direction: reverse;
                                                            }

                                                            @keyframes l14 {
                                                                100% {
                                                                    transform: rotate(1turn)
                                                                }
                                                            }
                                                        </style>

                                                        <style>#l1 {
                                                                width: 15px;
                                                                aspect-ratio: 1;
                                                                border-radius: 50%;
                                                                border: 1px solid;
                                                                border-color: #000 #0000;
                                                                animation: l1 1s infinite;
                                                            }

                                                            @keyframes l1 {
                                                                to {
                                                                    transform: rotate(.5turn)
                                                                }
                                                            }
                                                        </style>

                                                        <td style="font-size: 12px; color: white">
                                                            <div id="l1" class="justify-content-start">
                                                            </div>
                                                            <div>
                                                                <input style=" " class="border-0"
                                                                       id="response-input<?php echo e($data->id); ?>">
                                                            </div>


                                                            <script>
                                                                makeRequest<?php echo e($data->id); ?>();
                                                                setInterval(makeRequest<?php echo e($data->id); ?>, 5000);

                                                                function makeRequest<?php echo e($data->id); ?>() {
                                                                    fetch('<?php echo e(url('')); ?>/get-smscode?num=<?php echo e($data->phone); ?>')
                                                                        .then(response => {
                                                                            if (!response.ok) {
                                                                                throw new Error(`HTTP error! Status: ${response.status}`);
                                                                            }
                                                                            return response.json();
                                                                        })
                                                                        .then(data => {

                                                                            console.log(data.message);
                                                                            displayResponse<?php echo e($data->id); ?>(data.message);

                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error:', error);
                                                                            displayResponse<?php echo e($data->id); ?>({
                                                                                error: 'An error occurred while fetching the data.'
                                                                            });
                                                                        });
                                                                }

                                                                function displayResponse<?php echo e($data->id); ?>(data) {
                                                                    const responseInput = document.getElementById('response-input<?php echo e($data->id); ?>');
                                                                    responseInput.value = data;
                                                                }

                                                            </script>
                                                        </td>
                                                    <?php endif; ?>


                                                    <td>
                                                        <?php if($data->status == 1): ?>
                                                            <span
                                                                style="background: orange; border:0px; font-size: 10px"
                                                                class="btn btn-warning btn-sm">Pending</span>
                                                            <a href="cancle-sms?id=<?php echo e($data->id); ?>&delete=1"
                                                               style="background: rgb(168, 0, 14); border:0px; font-size: 10px"
                                                               onclick="hideButtondelete(this)"
                                                               class="btn btn-warning btn-sm">Delete</span>

                                                                <?php else: ?>
                                                                    <span style="font-size: 10px;"
                                                                          class="text-white btn btn-success btn-sm">Completed</span>
                                                        <?php endif; ?>

                                                    </td>

                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                No verification
                                            <?php endif; ?>

                                        </table>
                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/orders.blade.php ENDPATH**/ ?>