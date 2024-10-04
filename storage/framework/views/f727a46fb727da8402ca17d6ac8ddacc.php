<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-md-8 col-xl-6">
                <h4 class="mb-3 text-danger">Hi <?php echo e(Auth::user()->username); ?> 👋</h4>
                <p class="mb-2">
                    Wait for your sms code
                </p>


            </div>
        </div>

        <div class="container technology-block">


            <div class="row d-flex justify-content-center p-3">


                <div class="text-small text-center text-danger my-4" id="timer">Order expires in: <span
                        id="countdown"></span></div>


                <div class="col-lg-12 col-sm-12">
                    <div class="card border-0 rounded-20 shadow-lg p-3  bg-white rounded">

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


                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col">
                                            <label> 🌎 Country </label>
                                            <div class="input-group">
                                                <?php echo e($sms_order->country); ?>

                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>  Service </label>
                                            <div class="input-group">
                                                <?php echo e($sms_order->service); ?>

                                            </div>
                                        </div>

                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-sm-12 ">
                    <div class="card border-0 rounded-20 shadow-lg p-3  bg-white rounded">

                        <div class="card-body">

                            <label class="my-2">📞 Number </label>
                            <div class="input-group">
                                <input type="text" id="copyTarget" class="form-control"
                                       value="<?php echo e($sms_order->phone); ?>">
                                <span id="copyButton" class="input-group-addon btn" title="Click to copy">
                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <div class="card border-0 rounded-20 shadow-lg p-3  bg-white rounded">
                        <div class="card-body">

                            <label class="my-2">💬 Code from SMS </label>
                            <div class="input-group">
                                <input type="text" readonly id="response-input" class="form-control">
                                <span id="copyButton2" class="input-group-addon btn" title="Click to copy">
                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                </span>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-sm-12">
                    <div class="card border-0 rounded-20 shadow-lg p-3  bg-white rounded">
                        <div class="card-body">

                            <div class="row d-flex justify-content-center my-2">

                                <a style="font-size: 10px; border:0px;"
                                   class="me-2 col btn btn-danger btn-sm w-100"
                                   href="cancle-sms?id=<?php echo e($sms_order->id); ?>" role="button"><i class=""> Delete
                                        Order</a></i>

                                <a style="font-size: 10px" class="col text-white btn btn-success btn-sm w-100"
                                   href="/us" role="button"><i
                                        class="bi bi-arrow-clockwise"> New order</a></i>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </section>

    <script src="/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false" data-turbolinks-eval="false">
    </script>
    <script data-turbo-eval="false" data-turbolinks-eval="false">
        window.livewire = new Livewire();
        window.Livewire = window.livewire;
        window.livewire_app_url = '';
        window.livewire_token = 'JBt4aOzGju0YuBweWShPMRkAkmVxvzZzG4XOMx7V';
        window.deferLoadingAlpine = function (callback) {
            window.addEventListener('livewire:load', function () {
                callback();
            });
        };
        let started = false;
        window.addEventListener('alpine:initializing', function () {
            if (!started) {
                window.livewire.start();
                started = true;
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            if (!started) {
                window.livewire.start();
                started = true;
            }
        });
    </script>


    <script>
        const countdownDuration = 420;

        const countdownElement = document.getElementById('countdown');
        const progressElement = document.getElementById('progress');

        const widthChangePerSecond = 100 / countdownDuration;

        let countdown = countdownDuration;
        countdownElement.textContent = formatTime(countdown);

        const timerInterval = setInterval(() => {
            countdown--;
            countdownElement.textContent = formatTime(countdown);

            const progressBarWidth = widthChangePerSecond * (countdownDuration - countdown);
            progressElement.style.width = `${progressBarWidth}%`;

            if (countdown <= 0) {
                clearInterval(timerInterval);
                window.location.href = '<?php echo e(url('')); ?>/check-sms?id=<?php echo e($sms_order->id); ?>'; // Replace with your desired URL
            }
        }, 1000);

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;
            return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
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
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }

        var addrsField = $('.input_copy .txt');
        <?php if($order == 1): ?>
        addrsField.text("<?php echo e("$sms_order->phone" ?? null); ?> ");
        <?php endif; ?>
        $('.input_copy .icon').click(function () {
            copyToClipboard('.input_copy .txt');
            addrsField.addClass('flashBG')
                .delay('1000').queue(function () {
                addrsField.removeClass('flashBG').dequeue();
            });
        });


        var addrsField = $('.input_copy2 .txt2');
        <?php if($order == 1): ?>
        addrsField.text("<?php echo e("$sms_order->sms" ?? null); ?> ");
        <?php endif; ?>
        $('.input_copy2 .icon2').click(function () {
            copyToClipboard('.input_copy2 .txt2');
            addrsField.addClass('flashBG')
                .delay('1000').queue(function () {
                addrsField.removeClass('flashBG').dequeue();
            });
        });


        (function () {
            "use strict";

            function copyToClipboard(elem) {
                var target = elem;

                // select the content
                var currentFocus = document.activeElement;

                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;

                try {
                    succeed = document.execCommand("copy");
                } catch (e) {
                    console.warn(e);

                    succeed = false;
                }

                // Restore original focus
                if (currentFocus && typeof currentFocus.focus === "function") {
                    currentFocus.focus();
                }

                if (succeed) {
                    $(".copied").animate({
                        top: -25,
                        opacity: 0
                    }, 700, function () {
                        $(this).css({
                            top: 0,
                            opacity: 1
                        });
                    });
                }

                return succeed;
            }

            $("#copyButton, #copyTarget").on("click", function () {
                copyToClipboard(document.getElementById("copyTarget"));
            });
        })();


        (function () {
            "use strict";

            function copyToClipboard(elem) {
                var target = elem;

                // select the content
                var currentFocus = document.activeElement;

                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;

                try {
                    succeed = document.execCommand("copy");
                } catch (e) {
                    console.warn(e);

                    succeed = false;
                }

                // Restore original focus
                if (currentFocus && typeof currentFocus.focus === "function") {
                    currentFocus.focus();
                }

                if (succeed) {
                    $(".copied").animate({
                        top: -25,
                        opacity: 0
                    }, 700, function () {
                        $(this).css({
                            top: 0,
                            opacity: 1
                        });
                    });
                }

                return succeed;
            }


            $("#copyButton2, #copyTarget2").on("click", function () {
                copyToClipboard(document.getElementById("copyTarget2"));
            });
        })();


        makeRequest();
        setInterval(makeRequest, 5000);

        function makeRequest() {
            fetch('<?php echo e(url('')); ?>/get-smscodeworld?num=<?php echo e($sms_order->phone); ?>')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {

                    console.log(data.message);
                    displayResponse(data.message);

                })
                .catch(error => {
                    console.error('Error:', error);
                    displayResponse({
                        error: 'An error occurred while fetching the data.'
                    });
                });
        }

        function displayResponse(data) {
            const responseInput = document.getElementById('response-input');
            responseInput.value = data;
        }


        // function reloadPage() {
        //     location.reload();
        // }

        // setInterval(reloadPage, 40000);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/receivesmsworld.blade.php ENDPATH**/ ?>