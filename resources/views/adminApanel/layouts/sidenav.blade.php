<ul class="sidebar-menu">

    <li class="treeview">
        <a href="#"><i class="fa fa-laptop"></i><span> إعدادات الموقع </span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin_panel/sitesetting') }}"><i class="fa fa-circle-o"></i> الإعدادت الرئيسية </a></li>
            <li><a href="{{ url('admin_panel/sitesetting') }}"><i class="fa fa-circle-o"></i> إعدادات أخرى </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-users"></i><span> التحكم في الأعضاء </span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin_panel/users/create') }}"><i class="fa fa-circle-o"></i> أضف عضو </a></li>
            <li><a href="{{ url('/admin_panel/users') }}"><i class="fa fa-circle-o"></i> كل الأعضاء </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-globe"></i><span> التحكم في العقارات </span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin_panel/bu/create') }}"><i class="fa fa-circle-o"></i> أضف عقار </a></li>
            <li><a href="{{ url('/admin_panel/bu') }}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-globe"></i><span> رسائل الموقع </span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin_panel/contact') }}"><i class="fa fa-circle-o"></i> الرسائل </a></li>
        </ul>
    </li>
</ul>