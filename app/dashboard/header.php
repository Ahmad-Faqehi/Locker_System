       
       <?php
        $isAdminstrive = false;
        $as = $_SESSION['as'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $pagename = basename($path, ".php"); 

        if($as == "Administrative"){
            $isAdminstrive = true;
        }
       ?>
       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <i class="fas fa-door-closed"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Locker</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($pagename == 'index'){echo 'active';} ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($pagename == 'requstes'){echo 'active';} ?>">
                <a class="nav-link" href="requstes.php">
                    <i class="fas fa-archive"></i>
                    <span>Requstes</span></a>
            </li>

                        <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($pagename == 'locker'){echo 'active';} ?>">
                <a class="nav-link" href="locker.php">
                    <i class="fas fa-door-closed"></i>
                    <span>Lockers</span></a>
            </li>

            <li class="nav-item <?php if($pagename == 'alternate'){echo 'active';} ?>">
                <a class="nav-link" href="alternate.php">
                    <i class="fas fa-key"></i>
                    <span>Alternate Key</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mange Users
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($pagename == 'students'){echo 'active';} ?>">
                <a class="nav-link" href="students.php">
                    <i class="fas fa-users"></i>
                    <span>Students</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php if($pagename == 'employee'){echo 'active';} ?>">
                <a class="nav-link" href="employee.php">
                    <i class="fas fa-user-tie"></i>
                    <span>Employee</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->