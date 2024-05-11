<x-app-layout>
    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff') || auth()->user()->hasRole('head of office'))
    <livewire:broadcasting />

    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="good-morning-blk">
            <div class="row">
                <div class="col-md-6">
                    <div class="morning-user">
                        <h2>
                            @if ($time < 12) Good Morning, @elseif ($time < 17) Good Afternoon, @else Good Evening, @endif <span class="text-capitalize">
                                {{ auth()->user()->first_name }}
                                {{ auth()->user()->last_name }}
                                </span>
                        </h2>
                        <p>Have a nice day at work</p>
                    </div>
                </div>
                <div class="col-md-6 position-blk">
                    <div class="morning-img">
                        <img src="assets/img/morning-img-01.png" alt>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Users</h4>
                        <h2><span class="counter-up">{{$userCount}}</span></h2>
                        <!-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs last month</p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Equipments</h4>
                        <h2><span class="counter-up">{{$toolCount}}</span></h2>
                        <!-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs last month</p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <i class="fa-solid fa-computer"></i>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Equipment Requests</h4>
                        <h2><span class="counter-up">{{$equipmentRequestCount}}</span></h2>
                        <!-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs last month</p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <i class="fa-solid fa-wrench"></i>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Service Requests</h4>
                        <h2><span class="counter-up">{{$serviceRequestCount}}</span></h2>
                        <!-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs last month</p> -->
                    </div>
                </div>
            </div>

        </div>

        <!-- <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="chart-title patient-visit">
                        <h4>Requester Requests by College</h4>
                        <div>
                            <ul class="nav chat-user-total">
                                @foreach($colleges as $college)
                                <li><i class="fa fa-circle current-users" aria-hidden="true"></i>{{$college->code}} 75%</li>
                          
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control select">
                                <option>2025</option>
                                <option>2024</option>
                                <option>2023</option>
                                <option>2022</option>

                            </select>
                        </div>
                    </div>
                    <div id="borrower-chart"></div>
                </div>
            </div>
        </div> -->
    </div>

    </div>
    @elseif(auth()->user()->hasRole('technician'))
    <script>
        window.location.href = '/service_requests';
    </script>
    @else
    <script>
        window.location.href = '/requests';
    </script>
    @endif
</x-app-layout>