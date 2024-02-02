<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div class="sidebar-menu" id="sidebar-menu">
			<ul>
				@if(auth()->user()->hasRole('admin'))
				<li>
					<a href="/dashboard"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
						<span>Dashboard</span></a>
				</li>
				@endif
				<!-- <li>
					<a href="/repairs"><span class="menu-side"><i class="fa-solid fa-house"></i></span>
						<span>Repair</span></a>
				</li> -->

				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>Request <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/requests">Tool</a></li>
						<li><a href="/service_requests">Service</a></li>
					</ul>
				</li>

				@if(auth()->user()->hasRole('admin'))
				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>User <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/users">User</a></li>
						<li><a href="/borrowers">Borrower</a></li>
						<li><a href="/operators">Operator</a></li>
					</ul>
				</li>

				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>Equipment <br> Management</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/categories">Category</a></li>
						<li><a href="/types">Type</a></li>
						<li><a href="/tools">Equipment</a></li>
					</ul>
				</li>





				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-list"></i></span>
						<span>Reports</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/report">Report 1</a></li>
					</ul>
				</li>

				<li class="menu-title">Setup</li>

				<li class="submenu">
					<a href="#"><span class="menu-side"><i class="fa-solid fa-user-group"></i></span>
						<span>System</span> <span class="menu-arrow"></span>
					</a>

					<ul style="display: none;">

						<li><a href="/colleges">College</a></li>
						<li><a href="/courses">Course</a></li>
						<li><a href="/sexes">Sex</a></li>
						<!-- <li><a href="/categories">Category</a></li>
						<li><a href="/types">Type</a></li> -->
						<li><a href="/sources">Source</a></li>
						<li><a href="/statuses">Status</a></li>
						<li><a href="/borrower_types">Borrower Type</a></li>
						<li><a href="/services">Service</a></li>
						<li><a href="/positions">Position</a></li>
					</ul>
				</li>

				<li class="submenu mb-5">
					<a href="#"><i class="fa fa-user-shield"></i> <span>Authentication</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="/role">Role</a></li>
						<li class="mb-5"><a href="/permission">Permission</a></li>
					</ul>
				</li>
				@endif

			</ul>
		</div>
	</div>
</div>