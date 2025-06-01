    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/adp.PNG') }}" alt="Logo">
        </div>
		<nav class="menu">
			<ul class="sidebar-menu">
				<li><a href="{{ url('admin/dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
				<li><a href="{{ url('admin/employees') }}"><i class="fa-solid fa-user-tie"></i> Employee Management</a></li>
				<li><a href="{{ url('admin/financial-management') }}"><i class="fa-solid fa-list-check"></i> Financial Management</a></li>
				<li><a href="{{ url('admin/client-record') }}"><i class="fa-solid fa-mug-hot"></i> Client Record</a></li>
				<li><a href="{{ url('admin/projects') }}"><i class="fa-solid fa-bars-progress"></i> Project Management</a></li>
				<li><a href="{{ url('admin/enrollment') }}"><i class="fa-solid fa-file-export"></i> Enrollment</a></li>
			</ul>

			<ul class="footer-ul">
				<li><a href="#"><i class="fa-solid fa-gears"></i> Settings</a></li>
				<li>
					<form action="{{ route('signout') }}" method="POST" style="display:inline;">
						@csrf
						<button type="submit" style="border:none; background:none; padding:0; color:inherit; cursor:pointer;">
							<i class="fa-solid fa-right-from-bracket"></i> Logout
						</button>
					</form>
				</li>
			</ul>
		</nav>

    </aside>