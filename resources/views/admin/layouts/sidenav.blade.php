
<!-- settings -->

<li class="active treeview">
    <a href="#">
        <i class="fa fa-cogs pull-right"></i> <span> إعدادات الموقع </span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('/adminpanel/sitesetting') }}"><i class="fa fa-circle-o"></i> الإعدادت الرئيسية </a></li>
        <li><a href="{{ url('/adminpanel/sitesetting') }}"><i class="fa fa-circle-o"></i> إعدادات أخرى </a></li>
    </ul>
</li>

<!-- users -->

<li class="active treeview">
    <a href="#">
        <i class="fa fa-users pull-right"></i> <span> التحكم في الأعضاء </span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('/adminpanel/users/create') }}"><i class="fa fa-circle-o"></i> أضف عضو </a></li>
        <li><a href="{{ url('/adminpanel/users') }}"><i class="fa fa-circle-o"></i> كل الأعضاء </a></li>
    </ul>
</li>

<!-- buildings -->

<li class="active treeview">
    <a href="#">
        <i class="fa fa-users pull-right"></i> <span> التحكم في العقارات </span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('/adminpanel/bu/create') }}"><i class="fa fa-circle-o"></i> أضف عقار </a></li>
        <li><a href="{{ url('/adminpanel/bu') }}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
    </ul>
</li>




