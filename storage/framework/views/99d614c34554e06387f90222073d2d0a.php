<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3 text-danger">Hi <?php echo e(Auth::user()->username); ?> 👋</h4>
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
                </div>
            </div>
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


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>



        <div class="container technology-block">



            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12 my-3">
                    <div class="card " style="background: #064174; color: #ffffff">
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





                            <form action="check-av" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <div class="col-xl-10 col-md-10 col-sm-12 p-3">


                                        <label for="country" class="mb-2  mt-3 text-white">Choose
                                            Country</label>
                                        <div>
                                            <select style="border-color:rgb(0, 11, 136); padding: 10px" class="w-100"
                                                    id="dropdownMenu" class="dropdown-content" name="country">
                                                <option style="background: black" value=""> Select Country</option>
                                                <?php $__currentLoopData = $wcountries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data['ID']); ?>"><?php echo e($data['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                        <label for="country" class="mt-3 mb-2  mt-3 text-white">Choose
                                            Services</label>
                                        <div>
                                            <select class="form-control w-100" id="select_page2" name="service">

                                                <option value=""> Select Service</option>
                                                <?php $__currentLoopData = $wservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data['ID']); ?>"><?php echo e($data['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>


                                        <button style="border: 0px; background: rgb(252,101,7); color: white;"
                                                type="submit"
                                                class="btn btn btn-lg w-100 mt-3 border-0">Check
                                            availability
                                        </button>


                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>




                    <?php if($product != null): ?>
                    <div class="col-xl-6 col-md-6 col-sm-12 p-3">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <p class="text-muted text-center">Service Information</p>

                                    <h5 class="text-center my-2">Amount</h5>
                                    <h6 class="text-center text-muted my-2 mb-4">Price:
                                        NGN <?php echo e(number_format($price, 2)); ?></h6>


                                    <h5 class="text-center my-2">Available Nuumbers</h5>
                                    <h6 class="text-center text-muted my-2 mb-4">
                                        <?php echo e(number_format($stock, 2)); ?></h6>

                                    <h5 class="text-center text-muted my-2">Success rate: <span
                                            style="font-size: 30px; color: rgb(63,63,63);"> <?php if($rate < 10): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 20): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 30): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 40): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 50): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 60): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 70): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate < 80): ?>
                                                <?php echo e($rate); ?>%

                                            <?php elseif($rate < 90): ?>
                                                <?php echo e($rate); ?>%
                                            <?php elseif($rate <= 100): ?>
                                                <?php echo e($rate); ?>%
                                            <?php else: ?>
                                            <?php endif; ?></span></h5>
                                    <h6></h6>


                                    <?php if(Auth::user()->wallet < $price && $stock > 0): ?>
                                        <a href="fund-wallet" class="btn btn-secondary text-white btn-lg">Fund
                                            Wallet</a>
                                    <?php elseif($stock > 0 && Auth::user()->wallet > $price): ?>
                                        <form action="order_now" method="POST">
                                            <?php echo csrf_field(); ?>

                                            <input type="text" name="country" hidden value="<?php echo e($count_id ?? null); ?>">
                                            <input type="text" name="price" hidden value="<?php echo e($price ?? null); ?>">
                                            <input type="text" name="service" hidden value="<?php echo e($serv ?? null); ?>">


                                            <button type="submit"
                                                    style="border: 0px; background: rgb(63,63,63); color: white;"
                                                    class="mb-2 btn btn w-100 btn-lg mt-6">Buy Number
                                                Now
                                            </button>


                                            <p class="text-muted text-center my-5">
                                                At FADDEDSMS, we prioritize quality, ensuring that you receive the
                                                highest standard of SMS verifications for all your needs. Our commitment
                                                to excellence means we only offer non-VoIP phone numbers, guaranteeing
                                                compatibility with any service you require.
                                            </p>


                                        </form>
                                    <?php else: ?>

                                        <a href="/home" class="btn btn-danger text-white btn-lg">Number not available</a>

                                    <?php endif; ?>


                                </div>


                            </div>

                        </div>
                    </div>
                    <?php endif; ?>


                <div class="col-xl-6 col-md-6 col-sm-12 my-3">





























































                    






































































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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/world.blade.php ENDPATH**/ ?>