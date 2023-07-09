<div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_sidebar.Dashboard')}}</span>
                            </div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{trans('main_sidebar.Grates')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="Grates-show">{{trans('main_sidebar.Grates_list')}}</a></li>

                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main_sidebar.classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calsses-student">{{trans('main_sidebar.List_of_classes')}} </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#showsection-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text"> {{trans('main_sidebar.sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="showsection-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="showsection">{{trans('main_sidebar.List_departments')}} </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>

                    </li>
                    <!-- menu item student-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_sidebar.students')}}
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_sidebar.Student_information')}}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{route('students.create')}}">{{trans('main_sidebar.add_student')}}</a></li>
                                    <li> <a href="{{route('students.index')}}">{{trans('main_sidebar.list_students')}}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_sidebar.Students_Promotions')}}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{route('promtion.index')}}">{{trans('main_sidebar.add_Promotion')}}</a></li>
                                    <li> <a href="{{route('promtion.create')}}">{{trans('main_sidebar.list_Promotions')}}</a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_sidebar.Graduate_students')}}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{route('Graduated.create')}}">{{trans('main_sidebar.add_Graduate')}}</a> </li>
                                    <li> <a href="{{route('Graduated.index')}}">{{trans('main_sidebar.list_Graduate')}}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!--/ menu item student-->

                    <!-- <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">{{trans('main_sidebar.students')}}
                            </span></a> -->
                    <!-- </li> -->
                    <!-- menu item mailbox-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teacher-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text"> {{trans('main_sidebar.Teachers')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teacher-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="teachers-for-school">{{trans('main_sidebar.List_Teachers')}} </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>

                    </li>

                    <!-- menu item parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">{{trans('main_sidebar.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="add_parent">{{trans('main_sidebar.List_Parents')}}</a> </li>

                            <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                        </ul>
                    </li>






                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">{{trans('main_sidebar.Accounts')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <!-- الحسبات -->
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Fees.index')}}">{{trans('main_sidebar.study_fees')}}</a> </li>
                            <li> <a href="{{route('Fees_Invoices.index')}}">{{trans('main_sidebar.ivoices')}}</a> </li>
                            <li> <a href="{{route('ResceptStudent.index')}}">{{trans('main_sidebar.receipt')}}</a> </li>
                            <li> <a href="{{route('ProcessingFee.index')}}">{{trans('main_sidebar.Fee_excluded')}}</a> </li>
                            <li> <a href="{{route('payment_studenontroller.index')}}">{{trans('main_sidebar.Bills_of_exchange')}}</a> </li>

                        </ul>
                    </li>
                    <!-- الحضور و الغياب  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{trans('main_sidebar.Attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendances.index')}}">{{trans('main_sidebar.list_students')}}</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                    <!-- المواد الدراسيه -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tableSubjects">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{trans('main_sidebar.Subjects')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="tableSubjects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Subjects.index')}}">{{trans('main_sidebar.list_Subjects')}}</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">{{trans('main_sidebar.Exams')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="projects.html"></a> </li>
                            <li> <a href="{{route('Exams.index')}}">{{trans('main_sidebar.Exams_List')}}</a> </li>
                            <li> <a href="profile.html">profile</a> </li>
                            <li> <a href="app-contacts.html">App contacts</a> </li>
                            <li> <a href="contacts.html">Contacts</a> </li>
                            <li> <a href="file-manager.html">file manager</a> </li>
                            <li> <a href="invoice.html">Invoice</a> </li>
                            <li> <a href="blank.html">Blank page</a> </li>
                            <li> <a href="layout-container.html">layout container</a> </li>
                            <li> <a href="error.html">Error</a> </li>
                            <li> <a href="faqs.html">faqs</a> </li>
                        </ul>
                    </li>
                    <!-- Quizzes -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-pageQuizzes">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">{{trans('main_sidebar.quizes')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-pageQuizzes" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="projects.html"></a> </li>
                            <li> <a href="{{route('quizzes.index')}}">{{trans('main_sidebar.quizes_list')}}</a> </li>
                            <li> <a href="{{route('questions.index')}}">{{trans('main_sidebar.question_list')}}</a> </li>
                            <li> <a href="app-contacts.html">App contacts</a> </li>
                            <li> <a href="contacts.html">Contacts</a> </li>
                            <li> <a href="file-manager.html">file manager</a> </li>
                            <li> <a href="invoice.html">Invoice</a> </li>
                            <li> <a href="blank.html">Blank page</a> </li>
                            <li> <a href="layout-container.html">layout container</a> </li>
                            <li> <a href="error.html">Error</a> </li>
                            <li> <a href="faqs.html">faqs</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('main_sidebar.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="library">{{trans('main_sidebar.books')}}</a> </li>
                            <li> <a href="register.html">register</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authenticationZeoom">
                            <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('main_sidebar.Onlineclasses')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authenticationZeoom" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('online_classes.index')}}">{{trans('main_sidebar.direct_contact')}}</a> </li>

                        </ul>
                    </li>


                    <!-- seetings -->
                    <li>

                        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_sidebar.Settings')}} </span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">{{trans('main_sidebar.Users')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice">level item 1.1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>