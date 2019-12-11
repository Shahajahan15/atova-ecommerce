<li class="treeview @if($info->menu == 'Accounts') active @endif">
    <a href="#"><i class="fa fa-money"></i> <span> Cash </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="treeview @if($info->subMenu == 'Receipts') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Receipt </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Receipts') active @endif"><a href="{{ url('accounts/admin/receipts') }}"><i class="fa fa-list"></i> Receipts </a></li>
                <li class="@if($info->thirdMenu == 'New Receipt') active @endif"><a href="{{ url('accounts/admin/receipts/create') }}"><i class="fa fa-plus text-aqua"></i> New Receipt</a></li>
            </ul>
        </li>
        <li class="treeview @if($info->subMenu == 'Payments') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Payment </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Payment') active @endif"><a href="{{ url('accounts/admin/payments') }}"><i class="fa fa-list"></i> Payments </a></li>
                <li class="@if($info->thirdMenu == 'New Payment') active @endif"><a href="{{ url('accounts/admin/payments/create') }}"><i class="fa fa-plus text-aqua"></i> New Payment</a></li>
            </ul>
        </li>

        <li class="@if($info->subMenu == 'Categories') active @endif"><a href="{{ url('accounts/admin/categories') }}"> <i class="fa fa-circle-o text-aqua"></i> Categories</a></li>
        <li class="@if($info->subMenu == 'Payment Methods') active @endif"><a href="{{ url('accounts/admin/payment-methods') }}"> <i class="fa fa-circle-o text-aqua"></i> Payment Methods </a></li>
    </ul>
</li>