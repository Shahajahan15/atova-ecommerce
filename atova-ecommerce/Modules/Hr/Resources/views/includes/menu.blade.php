<li class="treeview @if($info->menu == 'Human Resource') active @endif">
    <a href="#"><i class="fa fa-user"></i> <span> Human Resource </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">

        <li class="@if($info->subMenu == 'Designations') active @endif"><a href="{{ url('hr/admin/designations') }}"> Designations </a></li>
        <li class="@if($info->subMenu == 'Tier Types') active @endif"><a href="{{ url('hr/admin/tier-types') }}"> Tier Types </a></li>
        <li class="@if($info->subMenu == 'Employees') active @endif"><a href="{{ url('hr/admin/employees') }}"> Employees </a></li>
        <li class="@if($info->subMenu == 'Customers') active @endif"><a href="{{ url('hr/admin/customers') }}"> Customers </a></li>
        <li class="@if($info->subMenu == 'Suppliers') active @endif"><a href="{{ url('hr/admin/suppliers') }}"> Suppliers </a></li>

    </ul>
</li>