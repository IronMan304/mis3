<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ncictso.png">
    <!-- <title>NCICTSO | @yield('title')</title> -->
    <!-- <title>NCICTSO | {{ ucwords(str_replace('.', ' ', Route::currentRouteName())) }}</title> -->
    <title>NCICTSO</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <style>
        .bt-sty:hover {
            color: white;
        }
    </style>

    @livewireStyles
    @yield('upper_script')
    <!-- Scripts -->
    @vite([])
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.shared.header')

        @include('layouts.shared.sidebar')


        <!-- Page Content -->
        <div class="page-wrapper">
            {{ $slot }}
        </div>
        @yield('delete_modal')
    </div>

    <div class="sidebar-overlay" data-reff></div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            function updateRealtimeCount() {
                $.ajax({
                    url: '/get-realtime-count', // Update with the correct URL
                    type: 'GET',
                    success: function(response) {
                        $('#count-requests').text(response.countRequests || '');
                        $('#count-pending').text(response.countPending || '');
                        $('#count-approved').text(response.countApproved || '');

                        // $('#count-reviewed').text(response.countReviewed);
                        // $('#count-approved').text(response.countApproved);
                        // $('#count-started').text(response.countStarted);
                        // $('#count-completed').text(response.countCompleted);

                        // Update pending requests list
                        $('#pending-requests-list').empty(); // Clear previous list
                        $.each(response.requestsPendingAndApproved, function(index, request) {
                            // Get the message creation time from request.created_at (assuming it's in UTC)
                            var messageTime = new Date(request.created_at);

                            // Convert the message time to Philippine time (UTC+8)
                            messageTime.setHours(messageTime.getHours() + 8);

                            // Format date
                            var formattedDate = messageTime.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });

                            // Format time
                            var formattedTime = messageTime.toLocaleTimeString('en-US', {
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true
                            });

                            // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                            var dayOfWeek = messageTime.getDay();

                            // Define an array to map the day of the week to its name
                            var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                            // Get the day name
                            var dayName = daysOfWeek[dayOfWeek];

                            // Check if the message was sent today
                            var today = new Date();
                            var isToday = today.toDateString() === messageTime.toDateString();

                            // Check if borrower exists before accessing its properties
                            var borrowerName = request.borrower ? (request.borrower.first_name + ' ' + (request.borrower.middle_name || '') + ' ' + request.borrower.last_name) : 'N/A';

                            // Format the time string
                            var formattedDateTime = formattedDate + ', ' + formattedTime + " " + (isToday ? 'today' : dayName);
                            $('#pending-requests-list').append(
                                '<li>' +
                                '<div class="list-item">' +
                                '<div class="list-left"></div>' +
                                '<div class="list-body">' +
                                '<div ><span class="message-author">' + request.request_number + '</span></div>' +
                                '<span class="message-time">' + formattedDateTime + '</span>' +
                                '<div class="clearfix"></div>' +
                                '<div class="message-content ' +
                                ((request.status_id === 11) ? 'status-pink">' : 'status-blue">') +
                                'Status: ' + request.status.description + '</div>' +
                                '<div class="message-content">Requester: ' + borrowerName + '</div>' +
                                '</div>' +
                                '</div>' +
                                '</li>'
                            );

                        });


                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function updateRealtimeCountService() {
                $.ajax({
                    url: '/get-realtime-count-service', // Update with the correct URL
                    type: 'GET',
                    success: function(response) {
                        // Check if countPendingService is not null before updating the UI
                        if (response.countPendingService !== null) {
                            $('#count-pending-service').text(response.countPendingService);
                        } else {
                            // Handle null value, for example, display a message or set a default value
                            $('#count-pending-service').text('N/A');
                        }

                        if (response.countApprovedService !== null) {
                            $('#count-approved-service').text(response.countApprovedService);
                        } else {
                            // Handle null value, for example, display a message or set a default value
                            $('#count-approved-service').text('N/A');
                        }

                        // Update pending requests list
                        $('#pending-requests-list-service').empty(); // Clear previous list
                        if (response.requestsPendingService !== null) {
                            $.each(response.requestsPendingService, function(index, requestService) {
                                // Get the message creation time from requestService.created_at (assuming it's in UTC)
                                var messageTime = new Date(requestService.created_at);

                                // Convert the message time to Philippine time (UTC+8)
                                messageTime.setHours(messageTime.getHours() + 8);

                                // Format date
                                var formattedDate = messageTime.toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric'
                                });

                                // Format time
                                var formattedTime = messageTime.toLocaleTimeString('en-US', {
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    hour12: true
                                });

                                // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                                var dayOfWeek = messageTime.getDay();

                                // Define an array to map the day of the week to its name
                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                                // Get the day name
                                var dayName = daysOfWeek[dayOfWeek];

                                // Check if the message was sent today
                                var today = new Date();
                                var isToday = today.toDateString() === messageTime.toDateString();

                                // Format the time string
                                var formattedDateTime = formattedDate + ', ' + formattedTime + " " + (isToday ? 'today' : dayName);
                                // Check if borrower exists before accessing its properties
                                var borrowerName = requestService.borrower ? (requestService.borrower.first_name + ' ' + (requestService.borrower.middle_name || '') + ' ' + requestService.borrower.last_name) : 'N/A';
                                $('#pending-requests-list-service').append(
                                    '<li>' +
                                    '<div class="list-item">' +
                                    '<div class="list-left"></div>' +
                                    '<div class="list-body">' +
                                    '<div ><span class="message-author">' + requestService.request_number + '</span></div>' +
                                    '<span class="message-time">' + formattedDateTime + '</span>' +

                                    '<div class="clearfix"></div>' +
                                    '<div class="message-content status-pink">' + 'Status: ' + requestService.status.description + '</div>' +
                                    '<div class="message-content">' + 'Requester: ' + borrowerName + '</div>' +

                                    '</div>' +
                                    '</div>' +
                                    '</li>'
                                );
                            });
                        } else {
                            // Handle null value, for example, display a message or show a placeholder
                            $('#pending-requests-list-service').append('<li>No pending service requests</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function updateReviewed() {
                $.ajax({
                    url: '/get-realtime-count', // Update with the correct URL
                    type: 'GET',
                    success: function(response) {
                        $('#count-reviewed').text(response.countReviewed);

                        // $('#count-reviewed').text(response.countReviewed);
                        // $('#count-approved').text(response.countApproved);
                        // $('#count-started').text(response.countStarted);
                        // $('#count-completed').text(response.countCompleted);

                        // Update pending requests list
                        $('#reviewed-requests-list').empty(); // Clear previous list
                        $.each(response.requestsReviewed, function(index, request) {
                            // Get the message creation time from request.created_at (assuming it's in UTC)
                            var messageTime = new Date(request.created_at);

                            // Convert the message time to Philippine time (UTC+8)
                            messageTime.setHours(messageTime.getHours() + 8);

                            // Format date
                            var formattedDate = messageTime.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });

                            // Format time
                            var formattedTime = messageTime.toLocaleTimeString('en-US', {
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true
                            });

                            // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                            var dayOfWeek = messageTime.getDay();

                            // Define an array to map the day of the week to its name
                            var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                            // Get the day name
                            var dayName = daysOfWeek[dayOfWeek];

                            // Check if the message was sent today
                            var today = new Date();
                            var isToday = today.toDateString() === messageTime.toDateString();

                            // Format the time string
                            var formattedDateTime = formattedDate + ', ' + formattedTime + " " + (isToday ? 'today' : dayName);
                            // Check if borrower exists before accessing its properties
                            var borrowerName = request.borrower ? (request.borrower.first_name + ' ' + (request.borrower.middle_name || '') + ' ' + request.borrower.last_name) : 'N/A';
                            $('#reviewed-requests-list').append(
                                '<li>' +
                                '<div class="list-item">' +
                                '<div class="list-left"></div>' +
                                '<div class="list-body">' +
                                '<div ><span class="message-author">' + request.request_number + '</span></div>' +
                                '<span class="message-time">' + formattedDateTime + '</span>' +

                                '<div class="clearfix"></div>' +
                                '<div class="message-content status-grey">' + 'Status: ' + request.status.description + '</div>' +
                                '<div class="message-content">' + 'Requester: ' + borrowerName + '</div>' +

                                '</div>' +
                                '</div>' +
                                '</li>'
                            );
                        });


                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function updateReviewedService() {
                $.ajax({
                    url: '/get-realtime-count-service', // Update with the correct URL
                    type: 'GET',
                    success: function(response) {
                        // Check if countPendingService is not null before updating the UI
                        if (response.countPendingService !== null) {
                            $('#count-reviewed-service').text(response.countReviewedService);
                        } else {
                            // Handle null value, for example, display a message or set a default value
                            $('#count-reviewed-service').text('N/A');
                        }

                        // Update pending requests list
                        $('#reviewed-requests-list-service').empty(); // Clear previous list
                        if (response.requestsReviewedService !== null) {
                            $.each(response.requestsReviewedService, function(index, requestService) {
                                // Get the message creation time from requestService.created_at (assuming it's in UTC)
                                var messageTime = new Date(requestService.created_at);

                                // Convert the message time to Philippine time (UTC+8)
                                messageTime.setHours(messageTime.getHours() + 8);

                                // Format date
                                var formattedDate = messageTime.toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric'
                                });

                                // Format time
                                var formattedTime = messageTime.toLocaleTimeString('en-US', {
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    hour12: true
                                });

                                // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                                var dayOfWeek = messageTime.getDay();

                                // Define an array to map the day of the week to its name
                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                                // Get the day name
                                var dayName = daysOfWeek[dayOfWeek];

                                // Check if the message was sent today
                                var today = new Date();
                                var isToday = today.toDateString() === messageTime.toDateString();

                                // Format the time string
                                var formattedDateTime = formattedDate + ', ' + formattedTime + " " + (isToday ? 'today' : dayName);
                                // Check if borrower exists before accessing its properties
                                var borrowerName = requestService.borrower ? (requestService.borrower.first_name + ' ' + (requestService.borrower.middle_name || '') + ' ' + requestService.borrower.last_name) : 'N/A';
                                $('#reviewed-requests-list-service').append(
                                    '<li>' +
                                    '<div class="list-item">' +
                                    '<div class="list-left"></div>' +
                                    '<div class="list-body">' +
                                    '<div ><span class="message-author">' + requestService.request_number + '</span></div>' +
                                    '<span class="message-time">' + formattedDateTime + '</span>' +

                                    '<div class="clearfix"></div>' +
                                    '<div class="message-content status-grey">' + 'Status: ' + requestService.status.description + '</div>' +
                                    '<div class="message-content">' + 'Requester: ' + borrowerName + '</div>' +

                                    '</div>' +
                                    '</div>' +
                                    '</li>'
                                );
                            });
                        } else {
                            // Handle null value, for example, display a message or show a placeholder
                            $('#reviewed-requests-list-service').append('<li>No reviewed service requests</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }


            // Call the function initially
            updateRealtimeCount();
            updateReviewed();
            updateReviewedService();
            // Call the function initially
            updateRealtimeCountService();
            // Update the counts every 5 seconds
            setInterval(function() {
                updateRealtimeCount();
                updateReviewed();
                updateReviewedService();
                updateRealtimeCountService();
            }, 10000);
        });
    </script>




    @livewireScripts
    @yield('custom_script')

    @stack('script')

  
</body>

</html>