<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div class="sidebar-menu" id="sidebar-menu">
			<ul>



				@can('view-dashboard')
				<li>
					<a href="/dashboard"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
						<span>Dashboard</span></a>
				</li>
				@endcan

				<!-- <li>
					<a href="/repairs"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
						<span>Repair</span></a>
				</li> -->

				@can('view-request-management')
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-code-pull-request"></i></span>
						<span>Request <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						@can('view-equipment-requests')
						<li><a href="/requests">Equipment</a></li>
						@endcan
						@can('view-service-requests')
						<li><a href="/service_requests">Service</a></li>
						@endcan
						<!-- <li class="submenu">
							<a href="javascript:void(0);"><span>Service <br>Management</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="service_requests"><span>Service Request</span></a></li>

								<li><a href="javascript:void(0);"><span>Assign</span></a></li>
							</ul>
						</li> -->
					</ul>
				</li>
				@endcan

				{{--<li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>--}}

				@can('view-user-management')
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>User <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">
						@can('view-users')
						<li><a href="/users">User</a></li>
						@endcan
						@can('view-borrowers')
						<li><a href="/borrowers">Requester</a></li>
						@endcan
						@can('view-operators')
						<li><a href="/operators">Operator</a></li>
						@endcan
						@can('view-securities')
						<li><a href="/securities">Security</a></li>
						@endcan
					</ul>
				</li>
				@endcan

				@can('view-equipment-management')
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-screwdriver-wrench"></i></i></span>
						<span>Equipment <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">
						@can('view-categories')
						<li><a href="/categories">Category</a></li>
						@endcan
						@can('view-types')
						<li><a href="/types">Type</a></li>
						@endcan
						@can('view-tools')
						<li><a href="/tools">Equipment</a></li>
						@endcan
					</ul>
				</li>
				@endcan

				@can('view-reports')
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-folder"></i></span>
						<span>Reports</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						@can('view-tool-reports')
						<li><a href="/tool_reports">Equipment</a></li>
						@endcan
						@can('view-service-reports')
						<li><a href="/service_reports">Service</a></li>
						@endcan
					</ul>
				</li>
				@endcan

				@can('view-logs')
				<li>
					<a href="/logs"><span class="menu-side"> <i class="fa-solid fa-book"></i></span>
						<span>Logs</span></a>
				</li>
				@endcan

				@can('view-setup-title')
				<li class="menu-title">Setup</li>
				@endcan

				@can('view-system')
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-bars"></i></span>
						<span>System</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/colleges">College</a></li>
						<li><a href="/courses">Course</a></li>
						<li><a href="/sexes">Gender</a></li>
						<!-- <li><a href="/categories">Category</a></li>
						<li><a href="/types">Type</a></li> -->
						<li><a href="/sources">Source</a></li>
						<li><a href="/statuses">Status</a></li>
						<!-- <li><a href="/borrower_types">Borrower Type</a></li> -->
						<li><a href="/services">Service</a></li>
						<li><a href="/positions">Position</a></li>
						<li><a href="/options">Option</a></li>
					</ul>
				</li>
				@endcan

				@can('view-authentication')
				<li class="submenu mb-5">
					<a href="#"><i class="fa fa-user-shield"></i> <span>Authentication</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="/role">Role</a></li>
						<li class="mb-5"><a href="/permission">Permission</a></li>
					</ul>
				</li>
				@endcan

			</ul>
		</div>
	</div>
</div>