<li class="treeview @if($info->menu == 'Expenditure') active @endif">
    <a href="#"><i class="fa fa-money"></i> <span> Expenditure </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="@if($info->subMenu == 'Expenses') active @endif"><a href="{{ url('expenditure/admin/expenses') }}"> <i class="fa fa-circle-o text-aqua"></i> Expense </a></li>
        <li class="@if($info->subMenu == 'New Expense') active @endif"><a href="{{ url('expenditure/admin/expenses/create') }}"> <i class="fa fa-plus text-aqua"></i> New Expense </a></li>
        <li class="@if($info->subMenu == 'Categories') active @endif"><a href="{{ url('expenditure/admin/categories') }}"> <i class="fa fa-circle-o text-aqua"></i> Categories </a></li>
    </ul>
</li>