<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
        
         @if(auth('web')->check())
         @include('layouts.main-sidebar.admin')
        
         @endif
         @if(auth('student')->check())
         @include('layouts.main-sidebar.student')
         @endif
         @if(auth('parnt')->check())
         @include('layouts.main-sidebar.parent')
        
         @endif
         @if(auth('teacher')->check())
         @include('layouts.main-sidebar.teacher')
         @endif
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
    