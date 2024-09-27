<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3 text-danger">Hi <?php echo e(Auth::user()->username); ?>,</h4>
                    <p class="mb-0">
                        <a href="fund-wallet" class="btn btn-dark" >NGN <?php echo e(number_format(Auth::user()->wallet, 2)); ?></a>

                    </p>
                </div>
            </div>
        </div>


        <div class="container technology-block">

            <div class="row p-3">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">

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


                            <form action="fund-now" method="POST">
                                <?php echo csrf_field(); ?>

                                <label class="my-2">Enter the Amount (NGN)</label>
                                <input type="text" name="amount" class="form-control" max="999999" min="5" name="amount"
                                       placeholder="Enter the Amount you want Add" required>


                                <label class="my-2 mt-4">Select Payment mode</label>
                                <select name="type" class="form-control">
                                  <option value="1">Instant</option>
                                    <option value="2">Manual</option>
                                </select>


                                <button style="border: 0px; background: rgb(63,63,63); color: white;"
                                        type="submit"
                                        class="btn btn btn-lg w-100 mt-3 border-0">Add Funds
                                </button>
                            </form>

                                <a href="https://web.enkpay.com/resolve?user_id=4455667894563443&check_url=https://faddedsms.com/api/verify" class="btn btn-danger w-100  my-4">Having deposit issue? resolve here</a>

                        </div>

                    </div>


                </div>


                <div class="col-lg-6 col-sm-12">
                    <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">

                        <div class="card-body">


                            <div class="">

                                <div class="p-2 col-lg-6">
                                    <strong>
                                        <h4>Latest Transactions</h4>
                                    </strong>
                                </div>

                                <div>


                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            <?php $__empty_1 = true; $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td style="font-size: 12px;"><?php echo e($data->id); ?></td>


                                                    <td style="font-size: 12px;">₦<?php echo e(number_format($data->amount, 2)); ?>



                                                    <td>
                                                        <?php if($data->status == 1): ?>
                                                            <span
                                                                style="background: orange; border:0px; font-size: 10px"
                                                                class="btn btn-warning btn-sm">Pending</span>
                                                                <?php elseif($data->status == 2): ?>
                                                                    <span style="font-size: 10px;"
                                                                          class="text-white btn btn-success btn-sm">Completed</span>
                                                        <?php else: ?>
                                                        <?php endif; ?>

                                                    </td>

                                                    <td style="font-size: 12px;"><?php echo e($data->created_at); ?>


                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                <h6>No transaction found</h6>
                                            <?php endif; ?>

                                            </tbody>

                                            <?php echo e($transaction->links()); ?>


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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/fund-wallet.blade.php ENDPATH**/ ?>