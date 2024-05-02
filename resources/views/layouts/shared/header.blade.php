<style>
	#back-to-top-button {
		position: fixed;
		bottom: 20px;
		/* Adjust the distance from the bottom as needed */
		right: 20px;
		/* Adjust the distance from the right as needed */
		/* display: none; */
		z-index: 999;
		/* Ensure it's above other elements */
		cursor: pointer;
	}

	.mobile-user-menu {
		position: absolute;
		top: 10px;
		right: 10px;
	}
</style>

<div class="header">
	<div class="header-left">
		<a href="/" class="logo">
			<img src="{{ asset('assets/img/ncictso.png') }}" width="60" height="60" alt> <span>CICTSO</span>
		</a>

	</div>
	<a id="toggle_btn" href="#"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt></a>

	<a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt></a>

	<!-- <div class="top-nav-search mob-view">
		<form>
			<input type="text" class="form-control" placeholder="Search here">
			<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
		</form>

	</div> -->
	<a href="#top" id="back-to-top-button" alt>
		<i class="fa-solid fa-arrow-up"></i> <!-- Use the appropriate icon class here -->
	</a>


	<ul class="nav user-menu float-end">
		<li class="nav-item dropdown d-none d-md-block">
			<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="assets/img/icons/note-icon-01.svg" alt=""><span id="count-pending" class=" status-pink"></span> </a>
		</li>
		<div class="notification-box">
			<div class="msg-sidebar notifications msg-noti">
				<div class="topnav-dropdown-header">
					<span>All Equipment Requests</span>

				</div>

				<div class="drop-scroll msg-list-scroll" id="msg_list">
					<ul class="list-box" id="pending-requests-list">




					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="chat.html">See all messages</a>
				</div>
			</div>
		</div>


<li class="nav-item dropdown has-arrow user-profile-list">
	<a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
		<div class="user-names">
			<h5>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
			<span class="text-capitalize">{{ auth()->user()->roles[0]->name }}</span>
		</div>
		<!-- <span class="user-img">
					<img src="{{ asset('assets/img/user-06.jpg') }}" alt="Admin">
				</span> -->
	</a>
	<div class="dropdown-menu">
		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			Logout
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</a>
	</div>
</li>

<!-- <span class="mx-auto d-block m-auto p-4 text-center">
			<a class="nav-item btn-sm" href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
					class="fa-solid fa-right-from-bracket"></i> Logout</a>
		</span> -->

</ul>


<!-- <div class="dropdown mobile-user-menu float-end">
		<span>
			<a class="btn btn-sm btn-primary" href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="fa-solid fa-right-from-bracket"></i>
			</a>
		</span>
	</div> -->
<div class="dropdown mobile-user-menu float-end">
	<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
	<div class="dropdown-menu dropdown-menu-end">
		<!-- <a class="dropdown-item" href="/profile">My Profile</a> -->
		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			Logout
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</a>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		function updateRealtimeCount() {
			$.ajax({
				url: '/get-realtime-count', // Update with the correct URL
				type: 'GET',
				success: function(response) {
					$('#count-requests').text(response.countRequests);
					$('#count-pending').text(response.countPending);
					$('#count-reviewed').text(response.countReviewed);
					$('#count-approved').text(response.countApproved);
					$('#count-started').text(response.countStarted);
					$('#count-completed').text(response.countCompleted);

					// Update pending requests list
					$('#pending-requests-list').empty(); // Clear previous list
					$.each(response.requestsPending, function(index, request) {
						$('#pending-requests-list').append(
							'<li>' +
							'<div class="list-item">' +
							'<div class="list-left"></div>' +
							'<div class="list-body">' +
							'<div href="{{ route("requests") }}"><span class="message-author">' + request.request_number + '</span></div>' +
							'<span class="message-time">' + request.created_at + '</span>' +
							'<div class="clearfix"></div>' +
							
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

		// Call the function initially
		updateRealtimeCount();

		// Update the count every n seconds (e.g., every 5 seconds)
		setInterval(updateRealtimeCount, 5000); // Adjust the interval as needed
	});
</script>