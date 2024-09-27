@extends('layout.main')
@section('content')

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3" style="color: #fc6507">Hi {{ Auth::user()->username }} 👋</h4>
                    <p class="mb-0">
                        <a href="fund-wallet" class="btn btn-dark mb-4" >NGN {{ number_format(Auth::user()->wallet, 2) }}</a>
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


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif





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


                                            @forelse($orders as $data)
                                                <tr>
                                                    <td style="font-size: 12px; color: white;">{{ $data->service }}</td>
                                                    <td style="font-size: 12px; color: white;">{{ $data->phone }}
                                                    </td>

                                                    @if($data->sms != null)
                                                        <td style="font-size: 12px; color: white">{{ $data->sms }}
                                                        </td>
                                                    @else
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
                                                                       id="response-input{{$data->id}}">
                                                            </div>


                                                            <script>
                                                                makeRequest{{$data->id}}();
                                                                setInterval(makeRequest{{$data->id}}, 5000);

                                                                function makeRequest{{$data->id}}() {
                                                                    fetch('{{ url('') }}/get-smscode?num={{ $data->phone }}')
                                                                        .then(response => {
                                                                            if (!response.ok) {
                                                                                throw new Error(`HTTP error! Status: ${response.status}`);
                                                                            }
                                                                            return response.json();
                                                                        })
                                                                        .then(data => {

                                                                            console.log(data.message);
                                                                            displayResponse{{$data->id}}(data.message);

                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error:', error);
                                                                            displayResponse{{$data->id}}({
                                                                                error: 'An error occurred while fetching the data.'
                                                                            });
                                                                        });
                                                                }

                                                                function displayResponse{{$data->id}}(data) {
                                                                    const responseInput = document.getElementById('response-input{{$data->id}}');
                                                                    responseInput.value = data;
                                                                }

                                                            </script>
                                                        </td>
                                                    @endif


                                                    <td>
                                                        @if ($data->status == 1)
                                                            <span
                                                                style="background: orange; border:0px; font-size: 10px"
                                                                class="btn btn-warning btn-sm">Pending</span>
                                                            <a href="cancle-sms?id={{  $data->id }}&delete=1"
                                                               style="background: rgb(168, 0, 14); border:0px; font-size: 10px"
                                                               onclick="hideButtondelete(this)"
                                                               class="btn btn-warning btn-sm">Delete</span>

                                                                @else
                                                                    <span style="font-size: 10px;"
                                                                          class="text-white btn btn-success btn-sm">Completed</span>
                                                        @endif

                                                    </td>

                                                </tr>

                                            @empty

                                                No verification
                                            @endforelse

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

@endsection
