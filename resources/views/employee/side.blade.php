    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/adp.PNG') }}" alt="Logo">
        </div>
		<nav class="menu">
			<ul class="sidebar-menu">
				<li><a href="{{ url('admin/dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
				<li><a href="{{ url('admin/employee-management') }}"><i class="fa-solid fa-list-check"></i> Task Management</a></li>
				<li><a href="#"><i class="fa-solid fa-wallet"></i> Salery Record</a></li>
				<li><a href="#"><i class="fa-solid fa-mug-hot"></i> Work History</a></li>
				<li><a href="#"><i class="fa-solid fa-gears"></i> Profile Settings</a></li>
			</ul>

			<ul class="footer-ul">
				<li><a href="#"><i class="fa-solid fa-gears"></i> Settings</a></li>
				<li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
			</ul>
		</nav>

    </aside>