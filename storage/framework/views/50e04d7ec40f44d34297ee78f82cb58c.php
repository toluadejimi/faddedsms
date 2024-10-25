<?php $__env->startSection('content'); ?>

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3" style="color: #fc6507">Hi <?php echo e(Auth::user()->username); ?> 👋</h4>
                    <p class="mb-0">
                        <a href="fund-wallet"
                           class="btn btn-dark mb-4">NGN <?php echo e(number_format(Auth::user()->wallet, 2)); ?></a>
                    </p>
                    <p class="mb-2">
                        What will you like to do ?
                    </p>


                    <?php echo $__env->make('servermenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-xl-6 col-sm-12">
                <div class="card">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                         aria-labelledby="offcanvasRightLabel">

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
                                            <div style="font-size: 11px"
                                                 class="col-5 service-name d-flex justify-content-start">
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
                                                        <button class="myButton"
                                                                style="border: 0px; background: transparent"
                                                                onclick="hideButton(this)"><i
                                                                class="fa fa-shopping-bag"></i></button>
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
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center">
                <div class="card border-0 mb-5 rounded-20" style="background: #fc6508; color: #ffffff">
                    <div class="card-body">

                        <div class="card-header d-flex justify-content-center mb-3">
                            <h5 class="text-white">Server 2</h5>
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


                        <div class="col-xl-12 col-md-12 col-sm-12  justify-center">
                            <div class="card" style="background: #fc6508; color: #ffffff">
                                <div class="card-body">


                                    <div class="form-group position-relative">
                                        <input type="text" class="form-control" id="countrySearch"
                                               placeholder="Search for a country...">
                                        <ul class="list-group search-results" id="countryList"></ul>
                                    </div>


                                    <!-- Filter Search Input -->
                                    <div class="mt-3" id="filterSearch">
                                        <input type="text" id="filterSearchInput" class="form-control"
                                               placeholder="Search for services...">
                                    </div>

                                    <div class="mt-5" id="responseData"></div>


                                    <script>
                                        var countries = <?php echo json_encode($countries, 15, 512) ?>;
                                        var currentData = {}; // Holds the raw API response data

                                        $(document).ready(function () {
                                            $('#filterSearch').hide();

                                            $('#countrySearch').on('input', function () {
                                                let searchValue = $(this).val().toLowerCase();
                                                let matchedCountries = '';

                                                if (searchValue) {
                                                    for (let key in countries) {
                                                        if (countries[key].toLowerCase().includes(searchValue)) {
                                                            matchedCountries += `<li style="background: #090909" class="list-group-item" data-country="${key}">${countries[key]}</li>`;
                                                        }
                                                    }
                                                    $('#countryList').html(matchedCountries).show();
                                                } else {
                                                    $('#countryList').hide();
                                                }
                                            });

                                            // When a country is clicked, trigger an AJAX request
                                            $('#countryList').on('click', 'li', function () {
                                                let country = $(this).data('country');
                                                $('#countrySearch').val($(this).text());
                                                $('#countryList').hide();

                                                // AJAX request to get country-specific data
                                                $.ajax({
                                                    url: `/proxy/prices?country=${country}`,
                                                    type: 'GET',
                                                    success: function (response) {
                                                        currentData = response; // Save data for filtering later
                                                        let output = generateCards(response);
                                                        $('#responseData').html(output);
                                                        $('#filterSearch').show();
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                        $('#responseData').html('<p class="text-danger">Failed to retrieve data.</p>');
                                                    }
                                                });
                                            });

                                            // Function to generate card HTML from data
                                            function generateCards(data) {
                                                let output = '';
                                                for (let key in data) {
                                                    output += `<h6>${key.toUpperCase()}</h6>`;
                                                    for (let providerId in data[key]) {
                                                        for (let provider in data[key][providerId]) {
                                                            let providerData = data[key][providerId][provider];
                                                            let multipliedCost = providerData.cost * <?php echo e($rate); ?> + <?php echo e($margin); ?>;
                                                            let formattedMultipliedCost = multipliedCost.toLocaleString('en-US', {
                                                                style: 'currency',
                                                                currency: 'NGN'
                                                            });


                                                            output += `<div class="card mb-3 operator-card" data-country="${key}" data-operator="${provider}" data-product="${providerId}" data-count="${providerData.count}">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                    <div class="col-6 d-flex justify-content-start">
                                                                     <h6>${providerId}</h6>
                                                                    </div>
                                                                    <div class="col-6 d-flex justify-content-end">

                                                                    <h6 style="color: #0a3622;">${formattedMultipliedCost} </h6>
                                                                    </div>
                                                                    <div class="col-6 d-flex justify-content-start mt-2">
                                                                    <p>Available: ${providerData.count}</p>
                                                                    </div>

                                                                   <div class="mt-2 col-6 d-flex justify-content-end">
                                                                    <i style="font-color: #fc6507;" class="fa fa-shopping-bag text-dark"></i>
                                                                    </div>


                                                        </div>
                                                    </div>
                                                    </div>`;


                                                        }
                                                    }
                                                }
                                                return output;
                                            }

                                            // Search within the loaded results
                                            $('#filterSearchInput').on('input', function () {
                                                let searchValue = $(this).val().toLowerCase();
                                                let filteredData = {};

                                                // Filter data based on the operator name or provider ID
                                                for (let key in currentData) {
                                                    for (let providerId in currentData[key]) {
                                                        for (let provider in currentData[key][providerId]) {
                                                            if (provider.toLowerCase().includes(searchValue) || providerId.toLowerCase().includes(searchValue)) {
                                                                if (!filteredData[key]) filteredData[key] = {};
                                                                filteredData[key][providerId] = filteredData[key][providerId] || {};
                                                                filteredData[key][providerId][provider] = currentData[key][providerId][provider];
                                                            }
                                                        }
                                                    }
                                                }

                                                // Update results
                                                let output = generateCards(filteredData);
                                                $('#responseData').html(output);
                                            });

                                            // When an operator is clicked, send a request to the backend controller
                                            $('#responseData').on('click', '.operator-card', function () {
                                                let country = $(this).data('country');
                                                let operator = $(this).data('operator');
                                                let product = $(this).data('product');
                                                let count = $(this).data('count');


                                                // Send to backend
                                                $.ajax({
                                                    url: `/buy-csms`,
                                                    type: 'POST',
                                                    data: {
                                                        country: country,
                                                        operator: operator,
                                                        product: product,
                                                        count: count,
                                                        _token: '<?php echo e(csrf_token()); ?>' // Include CSRF token for security
                                                    },


                                                    success: function (response) {

                                                        if (response === "2") {
                                                            alert('Verification Not Available.');
                                                        } else if (response === "4") {
                                                            window.location.href = '/orders'; // Modify the URL as needed
                                                        } else if (response === "9") {
                                                            window.location.href = '/fund-wallet'; // Modify the URL as needed
                                                        } else if (response === "0") {
                                                            alert('Verification Not Available.');
                                                        } else {
                                                            if (response.code === 200) {
                                                                var id = response.id;
                                                                window.location.href = '/orders?id=' + id; // Modify the URL as needed
                                                            }
                                                        }
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                        alert('Failed to complete purchase.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>


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


        <script src="/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false"
                data-turbolinks-eval="false">
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
                            console.log('Expired:', row);
                        }

                        seconds--;
                    }, 1000);
                });

            });
        </script>

        <script>
            $(document).ready(function () {
                $("select").select2();
            });


        </script>


    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/simworld.blade.php ENDPATH**/ ?>