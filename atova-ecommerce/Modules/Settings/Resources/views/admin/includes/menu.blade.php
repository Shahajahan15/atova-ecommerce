<li class="treeview @if($info->menu == 'Settings') active @endif">
    <a href="#"><i class="fa fa-gear"></i> <span> Settings </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">

        <li class="@if($info->subMenu == 'Company Info') active @endif"><a href="{{ url('settings/admin/company-info') }}"> Company Info </a></li>
        <li class="@if($info->subMenu == 'Additions') active @endif"><a href="{{ url('settings/admin/additions') }}"> Additions </a></li>

    </ul>
</li>