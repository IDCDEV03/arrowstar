<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('/')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo1.png')}}" alt="" width="40px"> ARROWSTAR</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo1.png')}}" width="40px" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">Menu</h6>                     		
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title" href="{{route('list_province')}}">
							<i data-feather="list"></i>
							<span class="lan-3">รายการโปรแกรมทัวร์</span>
						</a>	
						<a class="sidebar-link sidebar-title" href="{{route('admin.new_travel')}}">
							<i data-feather="image"></i>
							<span class="lan-3">เพิ่มสถานที่ท่องเที่ยว</span>
						</a>			
						
						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="settings"></i>
							<span class="lan-3">ตั้งค่าหน้าเว็บ</span>
						</a>	

						<a class="sidebar-link sidebar-title" href="{{ route('admin.create_user')}}">
							<i data-feather="user-plus"></i>
							<span class="lan-3">เพิ่ม User พนักงาน</span>
						</a>	

						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="log-out"></i>
							<span class="lan-3">ออกจากระบบ</span>
						</a>	

					</li>
					<li class="sidebar-list">
						<label class="badge badge-success">2</label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="home"></i><span class="lan-3">{{ trans('lang.Dashboards') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('index')}}">{{ trans('lang.Default') }}</a></li>
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('dashboard-02')}}">{{ trans('lang.Ecommerce') }}</a></li>
						</ul>
					</li>
			
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>