<!-- offcanvas menu start -->
<div class="offcanvas offcanvas-start bg-zoom text-dark sidebar-nav" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel" data-bs-scroll="true">
    <div class="offcanvas-bodyp-0 ">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <!-- <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">core</div>
                </li>
                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li> -->
                <!-- divider line start -->
                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <!-- divider line end -->
                <li>
                    <div class="text-warning small fw-bold text-uppercase px-3">interface</div>
                </li>

                <li>
                    <a class="nav-link px-3 sidebar-link active" href="index.php">
                        <span class="me-2"><i class="fas fa-home"></i></span>
                        <span>Home</span>
                        <!-- <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span> -->
                    </a>
                </li>

                <li>
                    <div class="nav-link px-3 sidebar-link active">
                        <a href="requests.php" class="nav-link active">
                            <span class="me-2"><i class="fas fa-truck-pickup"></i></span>
                            <span>Pickups</span>
                        </a>
                        <span class="right-icon ms-auto" data-bs-toggle="collapse" href="#pickup"
                        role="button" aria-expanded="false" aria-controls="pickup"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    
                    <div class="collapse" id="pickup">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="requests.php?page=today" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-truck-pickup"></i></span>
                                        <span>Today's</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="requests.php?page=this_week" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-truck-pickup"></i></span>
                                        <span>This Week's</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="requests.php?page=this_month" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-truck-pickup"></i></span>
                                        <span>This Month's</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link active" href="users.php"
                        role="button" aria-expanded="false" aria-controls="subscribers">
                        <span class="me-2"><i class="far fa-user"></i></span>
                        <span>Users</span>
                        <!-- <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span> -->
                    </a>
                </li> 
                <li>
                    <a class="nav-link px-3 sidebar-link active" href="admins.php"
                        role="button" aria-expanded="false" aria-controls="subscribers">
                        <span class="me-2"><i class="fas fa-user-graduate"></i></span>
                        <span>Admins</span>
                        <!-- <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span> -->
                    </a>
                </li>
                
                <li>
                    <a class="nav-link px-3 sidebar-link active" href="payments.php">
                        <span class="me-2"><i class="fas fa-money-check-alt"></i></span>
                        <span>Payments</span>
                        <!-- <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span> -->
                    </a>
                </li>
                
                <li>
                    <div class="nav-link px-3 sidebar-link active">
                        <a href="reports.php?page=today" class="nav-link active">
                            <span class="me-2"><i class="fas fa-info"></i></span>
                            <span>Reports</span>
                        </a>
                        <span class="right-icon ms-auto" data-bs-toggle="collapse" href="#reports"
                        role="button" aria-expanded="false" aria-controls="reports"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="collapse" id="reports">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="reports.php?page=today" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-info"></i></span>
                                        <span>Today's</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="reports.php?page=this_week" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-info"></i></span>
                                        <span>This Weekk's</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="reports.php?page=this_month" class="nav-link px-3 active">
                                        <span class="me-2"><i class="fas fa-info"></i></span>
                                        <span>This Month's</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li>
                    <a class="nav-link px-3 sidebar-link active" href="messages.php?page=unread"
                        role="button" aria-expanded="false" aria-controls="payments">
                        <span class="me-2"><i class="far fa-envelope"></i></span>
                        <span>Messages</span>
                        <!-- <span class="right-icon ms-auto"><i class="fas fa-chevron-down"></i></span> -->
                    </a>
                </li>
                <!-- log out start -->
                <div class="text-center mt-3 text-warning">
                    <a href="../logout.php" class="nav-link px-3 text-warning active">
                        <span class="me-2"><i class="fas fa-power-off"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
                <!-- log out ends -->
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas menu end -->
