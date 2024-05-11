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
		@can('notification')
		{{--@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff') || auth()->user()->hasRole('head of office'))--}}
		<li class="nav-item dropdown d-none d-md-block">
			<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link">
				<!-- <i class="fa-solid fa-wrench hasnotifications nav-link "></i> -->
				@can('pending-notif-er')
				<span id="count-pending" class="pink"></span>
				@endcan
				@can('reviewed-notif-er')
				<span id="count-reviewed" class="grey"></span>
				@endcan
				@can('approved-notif-er')
				<span id="count-approved" class="blue"></span>
				@endcan

				<img src="assets/img/icons/note-icon-01.svg" alt="">
				@can('pending-notif-sr')
				<span id="count-pending-service" class="pink"></span>
				@endcan
				@can('approved-notif-sr')
				<span id="count-approved-service" class="blue"></span>
				@endcan
			</a>
		</li>

		<div class="notification-box">
			<div class="col-md-12">
				<div class="card-box">
					<ul class="nav nav-tabs nav-tabs-solid">
						<!-- <li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-bs-toggle="tab"> <span id="count-approved" class="status-blue"></span></a></li>
						<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-bs-toggle="tab">Service</a></li> -->
						<li class="nav-item dropdown">
							@can('er')
							<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Equipment</a>
							@endcan
							<div class="dropdown-menu dropdown-menu-end">
								@can('pending-notif-er')
								<a class="dropdown-item" href="#basic-justified-tab-pending" data-bs-toggle="tab" id="count-pending">Pending</a>
								@endcan
								@can('reviewed-notif-er')
								<a class="dropdown-item" href="#basic-justified-tab-reviewed" data-bs-toggle="tab" id="count-reviewed">Reviewed</a>
								@endcan
								@can('approved-notif-er')
								<a class="dropdown-item" href="#basic-justified-tab-approved" data-bs-toggle="tab" id="count-approved">Approved</a>
								@endcan
							</div>
						</li>
						<li class="nav-item dropdown">
							@can('sr')
							<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Service</a>
							@endcan
							<div class="dropdown-menu dropdown-menu-end">
								@can('pending-notif-sr')
								<a class="dropdown-item" href="#basic-justified-tab-pending-service" data-bs-toggle="tab" id="count-pending-service">Pending</a>
								@endcan
								@can('approved-notif-sr')
								<a class="dropdown-item" href="#basic-justified-tab-approved-service" data-bs-toggle="tab" id="count-approved-service">Approved</a>
								@endcan
							</div>
						</li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane" id="basic-justified-tab-pending">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span>All Pending Equipment Requests</span>
								</div>
								<div id="msg_list">
									<ul class="list-box" id="pending-requests-list">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="basic-justified-tab-reviewed">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span>All Reviewed Equipment Requests</span>
								</div>
								<div id="msg_list1">
									<ul class="list-box" id="reviewed-requests-list">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="basic-justified-tab-approved">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span>All Approved Equipment Requests</span>
								</div>
								<div id="msg_list2">
									<ul class="list-box" id="approved-requests-list">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="basic-justified-tab-pending-service">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span><span>All Pending Service Requests</span>
								</div>
								<div id="msg_list4">
									<ul class="list-box" id="pending-requests-list-service">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="basic-justified-tab-approved-service">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span><span>All Approved Service Requests</span>
								</div>
								<div id="msg_list5">
									<ul class="list-box" id="approved-requests-list-service">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{--@endif--}}
		@endcan

		@can('reviewed-notification')
		{{--@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('president') || auth()->user()->hasRole('vice-president'))--}}
		<li class="nav-item dropdown d-none d-md-block">
			<a href="javascript:void(0);" id="open_msg_box1" class="hasnotifications nav-link">
				<img src="assets/img/icons/note-icon-01.svg" alt="">
				<span id="count-reviewed" class="status-grey"></span>
				<span id="count-reviewed-service" class="status-grey"></span>
			</a>
		</li>

		<div class="notification-box1">
			<div class="col-md-12">
				<div class="card-box">
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item"><a class="nav-link active" href="#solid-tab3" data-bs-toggle="tab">Equipment</a></li>
						<li class="nav-item"><a class="nav-link" href="#solid-tab4" data-bs-toggle="tab">Service</a></li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane" id="solid-tab3">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span>All Reviewed Equipment Requests</span>
								</div>
								<div id="msg_list2">
									<ul class="list-box" id="reviewed-requests-list">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="solid-tab4">
							<div class="msg-sidebar notifications msg-noti">
								<div class="topnav-dropdown-header">
									<span><span>All Reviewed Service Requests</span>
								</div>
								<div id="msg_list3">
									<ul class="list-box" id="reviewed-requests-list-service">
										<!-- Content for pending requests goes here -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{--@endif--}}
		@endcan

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