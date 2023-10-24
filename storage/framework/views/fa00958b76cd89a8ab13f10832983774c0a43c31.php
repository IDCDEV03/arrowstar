<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e(route('list_province')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo1.png')); ?>" alt="" width="40px"> ARROWSTAR</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('list_province')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo1.png')); ?>" width="40px" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('list_province')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo1.png')); ?>" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">Menu</h6>                     		
						</div>
					</li>

				 <li class="sidebar-list">
						<a class="sidebar-link sidebar-title" href="<?php echo e(route('list_province')); ?>">
							<i data-feather="list"></i>
							<span class="lan-3">โปรแกรมทัวร์ (ในประเทศ)</span>
						</a>	

						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.all_program_oversea')); ?>">
							<i data-feather="list"></i>
							<span class="lan-3">โปรแกรมทัวร์ (ต่างประเทศ)</span>
						</a>

						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.new_travel')); ?>">
							<i data-feather="image"></i>
							<span class="lan-3">เพิ่มสถานที่ (ในประเทศ)</span>
						</a>		
						
						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.new_travel_oversea')); ?>">
							<i data-feather="image"></i>
							<span class="lan-3">เพิ่มสถานที่ (ต่างประเทศ)</span>
						</a>	
						
						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="settings"></i>
							<span class="lan-3">ตั้งค่าหน้าเว็บ</span>
						</a>	

						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.list_contact')); ?>">
							<i data-feather="inbox"></i>
							<span class="lan-3">ข้อมูลติดต่อ</span>
						</a>	


						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.create_customer')); ?>">
							<i data-feather="user-plus"></i>
							<span class="lan-3">เพิ่มข้อมูลลูกค้า</span>
						</a>

						<a class="sidebar-link sidebar-title" href="<?php echo e(route('admin.list_customer')); ?>">
							<i data-feather="list"></i>
							<span class="lan-3">รายชื่อลูกค้า</span>
						</a>

						<a class="sidebar-link sidebar-title" href="<?php echo e(route('logout')); ?>">
							<i data-feather="log-out"></i>
							<span class="lan-3">ออกจากระบบ</span>
						</a>	

					</li>
						
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH D:\GitHub\arrowstar\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>