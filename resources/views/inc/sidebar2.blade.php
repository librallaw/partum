<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            m-menu-vertical="1"
            m-menu-scrollable="1" m-menu-dropdown-timeout="500"
            style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a
                        href="/" class="m-menu__link "><i
                            class="m-menu__link-icon flaticon-home" style="color:white;" ></i><span class="m-menu__link-title">
                        <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Home page
                            </span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a
                        href="/dashboard" class="m-menu__link "><i
                            class="m-menu__link-icon flaticon-dashboard" style="color:white;" ></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Dashboard</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            {{--<li class="m-menu__item  " aria-haspopup="true"><a--}}
                        {{--href="{{route("loadAutosave")}}" class="m-menu__link "><i--}}
                            {{--class="m-menu__link-icon fa fa-piggy-bank" style="color:white;"></i><span class="m-menu__link-title">  <span--}}
                                {{--class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Autosave</span>      <span--}}
                                    {{--class="m-menu__link-badge"></span>  </span></span></a>--}}
            {{--</li>--}}

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showInstantSavings")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-bowling-ball" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;
">Instant
                                Savings
                                </span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showSavingsGoals")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-bowling-ball" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;
">Target Savings
                                </span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>


            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showViewKidsExpress")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-bowling-ball" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Kids
                                Express
                                </span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>


            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showFixedLock")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-bowling-ball" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Fixed Lock
                                </span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showTransactions")}}" class="m-menu__link "><i
                            class="m-menu__link-icon flaticon-analytics" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Transactions</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showWithdrawal")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-minus" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Withdraw</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>



            <li class="m-menu__item " aria-haspopup="true"><a
                        href="{{route("showProfile")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-user-circle" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">Profile</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("showFaq")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-question-circle" style="color:white;"></i><span class="m-menu__link-title">  <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;">FAQ</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

            <li class="m-menu__item  " aria-haspopup="true"><a
                        href="{{route("logout")}}" class="m-menu__link "><i
                            class="m-menu__link-icon fa fa-lock" style="color:white;"></i><span class="m-menu__link-title">
                        <span
                                class="m-menu__link-wrap">      <span class="m-menu__link-text" style="color:white;
">Logout</span>      <span
                                    class="m-menu__link-badge"></span>  </span></span></a>
            </li>

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>