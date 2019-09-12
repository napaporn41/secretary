<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['user_id']))
{
?>
<?php
 if($_SESSION['user_type'] == '1')
 {		
 ?>
  <ul class="navbar-nav my-primary-color sidebar sidebar-dark accordion" id="accordionSidebar">
    <br>
    <br>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon ">
        <img src="./img/logo1.png" class="my-logo">
      </div>
    </a>
    <br>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item nav-home">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-home"></i>
        <span>หน้าหลัก</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Durable Articles Collapse Menu -->
    <li class="nav-item nav-articles">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseArticles">
        <i class="fas fa-fw fa-cubes"></i>
        <span>ทะเบียนคุม</span>
      </a>
      <div id="collapseArticles" class="collapse collapse-articles" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item display" href="display_durable_articles.php">แสดงข้อมูล</a>
          <a class="collapse-item purchase" href="display_durable_articles_purchase.php">จัดซื้อ</a>
          <a class="collapse-item permits" href="display_durable_articles_permits.php">ยืม-คืน</a>
          <a class="collapse-item damage" href="display_durable_articles_damage.php">รายการชำรุด</a>
          <a class="collapse-item repair" href="display_durable_articles_repair.php">รายการซ่อม</a>
          <a class="collapse-item sell" href="display_durable_articles_sell.php">ขายทอดตลาด</a>
          <a class="collapse-item transfer" href="display_durable_articles_transfer_in.php">โอนเข้า</a>
          <a class="collapse-item transferO" href="display_durable_articles_transfer_out.php">โอนออก</a>
          <a class="collapse-item donate" href="display_durable_articles_receive_donate.php">บริจาคเข้า</a>
          <a class="collapse-item donateO" href="display_durable_articles_donate.php">บริจาคออก </a>
          <a class="collapse-item report" href="buttons.html">รายงาน</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Durable Material Collapse Menu -->
    <li class="nav-item nav-material">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaterial" aria-expanded="true" aria-controls="collapseMaterial">
        <i class="fas fa-fw fa-box"></i>
        <span>วัสดุคงทน</span>
      </a>
      <div id="collapseMaterial" class="collapse collapse-material" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item display" href="display_durable_material.php">แสดงข้อมูล</a>
          <a class="collapse-item purchase" href="display_durable_material_purchase.php">จัดซื้อ</a>
          <a class="collapse-item permits" href="display_durable_material_permits.php">ยืม-คืน</a>
          <a class="collapse-item damage" href="display_durable_material_damage.php">รายการชำรุด</a>
          <a class="collapse-item repair" href="display_durable_material_repair.php">รายการซ่อม</a>
          <a class="collapse-item sell" href="display_durable_material_sell.php">ขายทอดตลาด</a>
          <a class="collapse-item transfer" href="display_durable_material_transfer_in.php">โอนเข้า</a>
          <a class="collapse-item transferO" href="display_durable_material_transfer_out.php">โอนออก</a>
          <a class="collapse-item donates" href="display_durable_material_receive_donate.php">บริจาคเข้า</a>
          <a class="collapse-item donatesO" href="display_durable_material_donate.php">บริจาคออก</a>
          <a class="collapse-item report" href="buttons.html">รายงาน</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Supplies Collapse Menu -->
    <li class="nav-item nav-supplies">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplies" aria-expanded="true" aria-controls="collapseSupplies">
        <i class="fas fa-fw fa-box-open"></i>
        <span>วัสดุสิ้นเปลือง</span>
      </a>
      <div id="collapseSupplies" class="collapse collapse-supplies" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item display" href="display_supplies.php">แสดงข้อมูล</a>
          <a class="collapse-item purchase" href="display_supplies_purchase.php">จัดซื้อ</a>
          <a class="collapse-item permits" href="display_supplies_permits.php">ยืม-คืน</a>
          <a class="collapse-item distribute" href="display_supplies_distribute.php">แจกจ่าย</a>
          <a class="collapse-item report" href="buttons.html">รายงาน</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Department Collapse Menu -->
    <li class="nav-item nav-department">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
        <i class="fas fa-fw fa-city"></i>
        <span>หน่วยงาน</span>
      </a>
      <div id="collapseDepartment" class="collapse collapse-department" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item display" href="display_department.php">แสดงหน่วยงาน</a>
          <a class="collapse-item insert" href="insert_department.php">เพิ่มหน่วยงาน</a>
          <a class="collapse-item report" href="forgot-password.html">รายงาน</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Users Collapse Menu -->
    <li class="nav-item nav-users">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-users"></i>
        <span>ผู้ดูแลระบบ</span>
      </a>
      <div id="collapseUsers" class="collapse collapse-users" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item display" href="login.html">แสดงรายชื่อ</a>
          <a class="collapse-item insert" href="register.html">เพิ่มผู้ดูแลระบบ</a>
          <a class="collapse-item report" href="forgot-password.html">รายงาน</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Approve Collapse Menu -->
    <li class="nav-item nav-approve">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApprove" aria-expanded="true" aria-controls="collapseApprove">
        <i class="fas fa-fw fa-folder"></i>
        <span>รายการรออนุมัติ</span>
      </a>
    </li>

    <li class="nav-item nav-setting">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
        <i class="fas fa-fw fa-setting"></i>
        <span>ตั้งค่า</span>
      </a>
      <div id="collapseSetting" class="collapse collapse-setting" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item displayse" href="display_seller.php">แสดงร้านค้า</a>
          <a class="collapse-item insertse" href="insert_seller.php">เพิ่มร้านค้า</a>
          <a class="collapse-item displayun" href="display_unit.php">แสดงหน่วยนับ</a>
          <a class="collapse-item insertun" href="insert_unit.php">เพิ่มหน่วยนับ</a>
          <a class="collapse-item displaya" href="display_durable_articles_type.php">แสดงประเภทของครุภัณฑ์</a>
          <a class="collapse-item inserta" href="insert_durable_articles_type.php">เพิ่มประเภทของครุภัณฑ์</a>
          <a class="collapse-item displaym" href="display_durable_material_type.php">แสดงประเภทของวัสดุ</a>
          <a class="collapse-item insertm" href="insert_durable_material_type.php">เพิ่มประเภทของวัสดุ</a>

        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="service/service_logout.php">
        <i class="fas fa-fw fa-"></i>
        <span>ออกจากระบบ</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <div class="col-md-4">
          <img src="./img/logosecretary.png" class="img-fluid">
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                  <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                  <div class="status-indicator"></div>
                </div>
                <div>
                  <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                  <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                  <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                  <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                  <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div>
                  <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                  <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="service/service_logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
      <?php } ?>


      <?php
			}
		if($_SESSION['user_type']== '2')
		{
	  ?>
        <ul class="navbar-nav my-primary-color sidebar sidebar-dark accordion" id="accordionSidebar">
          <br>
          <br>
          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon ">
              <img src="./img/logo1.png" class="my-logo">
            </div>
          </a>
          <br>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item nav-home">
            <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-home"></i>
              <span>หน้าหลัก</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

        
         

          <!-- Nav Item - Supplies Collapse Menu -->
          <li class="nav-item nav-supplies">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplies" aria-expanded="true" aria-controls="collapseSupplies">
              <i class="fas fa-fw fa-box-open"></i>
              <span>วัสดุสิ้นเปลือง</span>
            </a>
            <div id="collapseSupplies" class="collapse collapse-supplies" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item display" href="display_supplies.php">แสดงข้อมูล</a>
                <a class="collapse-item purchase" href="display_supplies_purchase.php">จัดซื้อ</a>
                <a class="collapse-item permits" href="display_supplies_permits.php">ยืม-คืน</a>
                <a class="collapse-item distribute" href="display_supplies_distribute.php">แจกจ่าย</a>
                <a class="collapse-item report" href="buttons.html">รายงาน</a>
              </div>
            </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Department Collapse Menu -->
          <li class="nav-item nav-department">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment">
              <i class="fas fa-fw fa-city"></i>
              <span>หน่วยงาน</span>
            </a>
            <div id="collapseDepartment" class="collapse collapse-department" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item display" href="display_department.php">แสดงหน่วยงาน</a>
                <a class="collapse-item insert" href="insert_department.php">เพิ่มหน่วยงาน</a>
                <a class="collapse-item report" href="forgot-password.html">รายงาน</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Users Collapse Menu -->
          <li class="nav-item nav-users">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
              <i class="fas fa-fw fa-users"></i>
              <span>ผู้ดูแลระบบ</span>
            </a>
            <div id="collapseUsers" class="collapse collapse-users" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item display" href="login.html">แสดงรายชื่อ</a>
                <a class="collapse-item insert" href="register.html">เพิ่มผู้ดูแลระบบ</a>
                <a class="collapse-item report" href="forgot-password.html">รายงาน</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Approve Collapse Menu -->
          <li class="nav-item nav-approve">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApprove" aria-expanded="true" aria-controls="collapseApprove">
              <i class="fas fa-fw fa-folder"></i>
              <span>รายการรออนุมัติ</span>
            </a>
          </li>

          <li class="nav-item nav-setting">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
              <i class="fas fa-fw fa-setting"></i>
              <span>ตั้งค่า</span>
            </a>
            <div id="collapseSetting" class="collapse collapse-setting" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item displayse" href="display_seller.php">แสดงร้านค้า</a>
                <a class="collapse-item insertse" href="insert_seller.php">เพิ่มร้านค้า</a>
                <a class="collapse-item displayun" href="display_unit.php">แสดงหน่วยนับ</a>
                <a class="collapse-item insertun" href="insert_unit.php">เพิ่มหน่วยนับ</a>
                <a class="collapse-item displaya" href="display_durable_articles_type.php">แสดงประเภทของครุภัณฑ์</a>
                <a class="collapse-item inserta" href="insert_durable_articles_type.php">เพิ่มประเภทของครุภัณฑ์</a>
                <a class="collapse-item displaym" href="display_durable_material_type.php">แสดงประเภทของวัสดุ</a>
                <a class="collapse-item insertm" href="insert_durable_material_type.php">เพิ่มประเภทของวัสดุ</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
      <a class="nav-link" href="service/service_logout.php" >
        <i class="fas fa-fw fa-"></i>
        <span>ออกจากระบบ</span></a>
    </li>

            
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->
              <div class="col-md-4">
                <img src="./img/logosecretary.png" class="img-fluid">
              </div>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">3+</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                      Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                          <i class="fas fa-file-alt text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-success">
                          <i class="fas fa-donate text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-warning">
                          <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                      </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                  </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">7</span>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                      Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                        <div class="status-indicator"></div>
                      </div>
                      <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        <div class="status-indicator bg-warning"></div>
                      </div>
                      <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                      </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                  </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="service/service_logout.php" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            <?php } ?>