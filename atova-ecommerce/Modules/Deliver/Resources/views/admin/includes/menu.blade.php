<li class="treeview @if($info->menu == 'Deliver') active @endif">
    <a href="#"><i class="fa fa-cloud-upload"></i> <span> Deliver </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="@if($info->subMenu == 'Invoices') active @endif"><a href="{{ url('deliver/admin/invoices') }}"> <i class="fa fa-circle-o text-aqua"></i> Invoices </a></li>
        <li class="@if($info->subMenu == 'New Invoice') active @endif"><a href="{{ url('deliver/admin/invoices/create') }}"> <i class="fa fa-circle-o text-aqua"></i> New Invoice </a></li>
    </ul>
</li>