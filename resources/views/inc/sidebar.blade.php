<div id="menu" class="side-nav gx-sidebar">
    <div class="navbar-expand-lg">
        <!-- Sidebar header  -->
        <div class="sidebar-header">
            <div class="user-profile">
                <img class="user-avatar" alt="Domnic" src="images/userAvatar/domnic-harris.jpg">

                <div class="user-detail">
                    <h4 class="user-name">
                            <span class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="userAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{Auth::user()->full_name()}}
                                </a>

                                <span class="dropdown-menu dropdown-menu-right" aria-labelledby="userAccount">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="zmdi zmdi-account zmdi-hc-fw mr-2"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="zmdi zmdi-settings zmdi-hc-fw mr-2"></i>
                                        Setting
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="zmdi zmdi-sign-in zmdi-hc-fw mr-2"></i>
                                        Logout
                                    </a>
                                </span>
                            </span>
                    </h4>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->


        <div id="main-menu" class="main-menu navbar-collapse collapse">
            <ul class="nav-menu">
                <li class="nav-header">Main</li>
                <li class="menu no-arrow">
                    <a href="{{route("showDashboard")}}">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>

                </li>




                <li class="menu">
                    <a href="javascript:void(0)">
                        <i class="zmdi zmdi-folder zmdi-hc-fw"></i>
                        <span class="nav-text">Wallet Transactions</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="transactions.php"><span class="nav-text">All Transactions</span></a></li>
                        <li><a href="transactions.php"><span class="nav-text">Transactions for the month</span></a></li>


                    </ul>
                </li>



                <li class="menu no-arrow">
                    <a href="withdrawal.php">
                        <i class="zmdi zmdi-minus-circle-outline zmdi-hc-fw"></i>
                        <span class="nav-text">Withdraw</span>
                    </a>
                </li>

                <li class="menu no-arrow">
                    <a href="">
                        <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                        <span class="nav-text">Stories</span>
                    </a>
                </li>

                <li class="menu no-arrow">
                    <a href="">
                        <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                        <span class="nav-text">My Points</span>
                    </a>
                </li>




                <li class="nav-header">Links</li>

                <li class="menu">
                    <a href="javascript:void(0)">
                        <i class="zmdi zmdi-folder zmdi-hc-fw"></i>
                        <span class="nav-text">Quick Links</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href=""><span class="nav-text">About Us</span></a></li>
                        <li><a href=""><span class="nav-text text-transform-none">Stories</span></a></li>
                        <li><a href=""><span class="nav-text">Blog</span></a></li>
                        <li><a href="faq.php"><span class="nav-text">FAQ</span></a></li>

                    </ul>
                </li>


                <li class="menu no-arrow">
                    <a href="faq.php">
                        <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                        <span class="nav-text">FAQ</span>
                    </a>
                </li>

                <li class="menu no-arrow">
                    <a href="">
                        <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>





                </li>
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
</div>