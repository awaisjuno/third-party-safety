        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h2>Dashboard</h2>
            </div>
				<div class="header-right">
					<ul class="header-menu">
						<li><i class="fas fa-envelope"></i></li>
						<li><i class="fas fa-bell"></i></li>
						<li class="user-dropdown">
							<div class="user-toggle">
                                <img src="{{ asset('img/awais.jpeg') }}" class="user-img" alt="Logo">
							</div>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fas fa-user"></i> Profile Settings</a></li>
								<li>
									<form method="POST" action="{{ route('signout') }}">
										@csrf
										<button type="submit" style="background:none; border:none; padding:0; cursor:pointer; color:inherit;">
											<i class="fas fa-sign-out-alt"></i> Sign Out
										</button>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
        </header>