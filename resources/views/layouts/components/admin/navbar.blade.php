<!-- Loader -->
<div id="loading">
    <img src="{{ asset('assets/img/loader4.svg') }}" class="loader-img" alt="Loader">
</div>

<!-- main-header -->
<div class="header-main">
    <div class="main-header">
        <div class="container-fluid">
            <!--logo-->
            <div class="main-header-left">
                <div class="hor-logo">
                    @if(\App\Models\Setting::get()->count() > 0)
                    <a class="main-logo desktop-logo" href="index.html"><img class="rounded img-thumbnail wd-100 wd-sm-50" src="{{ asset('storage/'.\App\Models\Setting::first()->logo) }}" alt="logo"></a>
                    <a class="main-logo mobile-logo" href="index.html"><img class="rounded img-thumbnail wd-100 wd-sm-50" src="{{ asset('storage/'.\App\Models\Setting::first()->logo) }}" alt="logo"></a>
                    @else
                    <a class="main-logo desktop-logo" href="index.html"><img src="{{ asset('assets/img/brand/logo-white.png') }}" alt="logo"></a>
                    <a class="main-logo mobile-logo" href="index.html"><img src="{{ asset('assets/img/brand/favicon-white.png') }}" alt="logo"></a>
                    @endif
                </div>
                <!-- sidebar-toggle-->
                <div class="app-sidebar__toggle" data-toggle="sidebar">
                    <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
                    <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
                </div>
                <!-- /Sidebar-toggle-->
            </div>
            <div class="main-header-right ml-auto">
                <div class="dropdown main-header-search mobile-search">
                    <a class="new header-link" href="">
                        <i class="header-icons" data-eva="search-outline"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="p-2 main-form-search">
                            <input class="form-control" placeholder="Search here..." type="search">
                            <button class="btn"><i class="fe fe-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="header-formsearch mr-2">
                    <input class="form-control" placeholder="Search" type="search">
                    <button class="btn"><i class="fe fe-search"></i></button>
                </div>
                <div class="main-header-fullscreen fullscreen-button">
                    <a href="#" class="header-link">
                        <i class="header-icons" data-eva="expand-outline"></i>
                    </a>
                </div>
                <div class="dropdown main-header-message">
                    <a class="new header-link" href="">
                        <i class="header-icons" data-eva="email-outline"></i>
                        <span class="badge bg-success nav-link-badge">3</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="p-3 border-bottom text-center">
                            <h6 class="main-notification-title">Messages</h6>
                        </div>
                        <div class="main-notification-list">
                            <div class="media new">
                                <div class="main-img-user"><img alt="" src="{{ asset('assets/img/users/male/1.jpg') }}"></div>
                                <div class="media-body">
                                    <p> <strong>Jack Wright</strong> Congratulatation your template awesome</p><span>Jan 15 12:32pm</span>
                                </div>
                            </div>
                            <div class="media new">
                                <div class="main-img-user online"><img alt="" src="{{ asset('assets/img/users/female/12.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Lisa Rutherford</strong> Hey! there I'm available</p><span>Jan 13 04:16am</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user"><img alt="" src="{{ asset('assets/img/users/male/22.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Blake Walker</strong> just created a new blog post</p><span>Dec 13 02:56am</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user online"><img alt="" src="{{ asset('assets/img/users/female/16.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Fiona Morrison</strong> added new comment on your photo</p><span>Dec 12 10:40pm</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user"><img alt="" src="{{ asset('assets/img/users/male/16.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Victor Lee</strong> added new comment on your photo</p><span>Nov 27 10:40pm</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user"><img alt="" src="{{ asset('assets/img/users/male/12.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Stewart Bond</strong> your payment invoice is generated</p><span>Nov 22 12 10:40pm</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user online"><img alt="" src="{{ asset('assets/img/users/female/11.jpg') }}"></div>
                                <div class="media-body">
                                    <p><strong>Faith Dickens</strong> please check your mail....</p><span>Nov 19 10:40pm</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-footer">
                            <a href="">View All Messages</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown main-header-notification d-none d-md-flex">
                    <a class="new header-link" href="">
                        <i class="header-icons" data-eva="bell-outline"></i>
                        <span class="pulse bg-danger"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="p-3 border-bottom text-center">
                            <h6 class="main-notification-title">Notifications</h6>
                        </div>
                        <div class="main-notification-list">
                            <a href="#" class="dropdown-item d-flex">
                                <div class="text-primary tx-18 mr-3 ">
                                    <i class="fe fe-mail"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Commented on your post.</h6>
                                    <div class="small text-muted">3 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex border-top">
                                <div class="text-pink tx-18 mr-3 ">
                                    <i class="fe fe-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">New User Registered</h6>
                                    <div class="small text-muted">1 day ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex  border-top">
                                <div class="text-success tx-18 mr-3 ">
                                    <i class="fe fe-thumbs-up"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Someone likes our posts</h6>
                                    <div class="small text-muted">5 mins ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex border-top">
                                <div class="text-purple tx-18 mr-3 ">
                                    <i class="fe fe-upload"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">New file has been uploaded</h6>
                                    <div class="small text-muted">50 sec ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex border-top">
                                <div class="text-danger tx-18 mr-3 ">
                                    <i class="fe fe-alert-circle"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">System alert</h6>
                                    <div class="small text-muted">2 days ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex border-top">
                                <div class="text-warning tx-18 mr-3 ">
                                    <i class="fe fe-server"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Server Rebooted</h6>
                                    <div class="small text-muted">45 mins ago</div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer">
                            <a href="">View All Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown main-profile-menu">
                    <a class="main-img-user" href="">
                        <img alt="" src="{{ asset('assets/img/users/male/15.jpg') }}">
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile">
                            <h6>Peter Hill</h6>
                            <span>Administrator</span>
                        </div>
                        <a class="dropdown-item" href="#"><i class="si si-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="si si-envelope-open"></i> Inbox</a>
                        <a class="dropdown-item" href="#"><i class="si si-calendar"></i> Activity</a>
                        <a class="dropdown-item" href="#"><i class="si si-bubbles"></i> Chat</a>
                        <a class="dropdown-item" href="{{ route('admin.setting.index') }}"><i class="si si-settings"></i> Settings</a>
                        <a class="dropdown-item" href="#" onclick="logoutform()"><i class="si si-power"></i> Log Out</a>
                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="main-header-sidebar-notification">
                    <a href="#" class="header-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="header-icons" data-eva="options-2-outline"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function logoutform() {
        let yes = confirm('Are You Sure')
        if (yes) {
            $('#logout-form').submit()
        }
    }
</script>
<!--/main-header-->