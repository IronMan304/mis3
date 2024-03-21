<x-welcome-layout>

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets2/img/norsu.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Manage Your Equipment Efficiently
                            </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take Control of Your Equipment Inventory</h1>
                            <a href="" class="btn btn-secondary btn-sm py-md-3 px-md-5 animated slideInRight">Contact
                                Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets2/img/norsu.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Manage Your Equipment Efficiently
                            </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take Control of Your Equipment Inventory</h1>
                            <a href="" class="btn btn-secondary btn-sm py-md-3 px-md-5 animated slideInRight">Contact
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Our System</h5>
                        <h1 class="display-5 mb-0">Efficient Equipment Management System for Your Organization</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4">Manage your equipment inventory seamlessly. Accessible, reliable, and efficient.</h4>
                    <p class="mb-4">Track your equipment, manage requests, and streamline your organization's workflow. Our system ensures you have the right equipment when you need it.</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Comprehensive Inventory</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Efficient Requests</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>User-Friendly Interface</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Real-time Tracking</h5>
                        </div>
                    </div>
                    <a href="{{ url('/equipment') }}" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Get Started</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="assets2/img/service-3.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Pricing Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Pricing Plan</h5>
                        <h1 class="display-5 mb-0">Flexible Pricing for Efficient Management</h1>
                    </div>
                    <p class="mb-4">Our pricing plans are tailored to meet your organization's needs. Whether you're a small team or a large enterprise, we have a plan for you.</p>
                    <h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Contact for Pricing
                    </h5>
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">+123 456 7890</h1>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="assets2/img/price-1.jpg" alt="">
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>Equipment Tracking</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>Comprehensive Inventory</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Efficient Requests</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>Real-time Tracking</span><i class="fa fa-check text-primary pt-1"></i></div>
                            </div>
                        </div>
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="assets2/img/price-2.jpg" alt="">
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>Request Management</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>Streamlined Workflow</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Efficient Communication</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>User-Friendly Interface</span><i class="fa fa-check text-primary pt-1"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Team</h5>
                        <h1 class="display-6 mb-4">Meet Our Dedicated Team</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->


</x-welcome-layout>