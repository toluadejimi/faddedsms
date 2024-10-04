<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">

        <div class="row p-3">


            <div class="d-flex justify-content-center mt-5 my-5">
                <h4>Hi, Welcome Back! 👋</h4>
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



            <form>

                <h1 class="text-center">Congratulations!!</h1>
                <p class="text-center">Your account has been verified, Login to continue</p>

                <div class="d-grid mt-4">
                    <a href="/login" type="submit"
                       style="background: rgba(23, 69, 132, 1); border: 0px; border-radius: 2px"
                       class="btn btn-primary w-70">Login
                    </a>
                </div>


            </form>






        </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/Auth/verify-account-now.blade.php ENDPATH**/ ?>