<li class="treeview @if($info->menu == 'Bank') active @endif">
    <a href="#"><i class="fa fa-bank"></i> <span> Bank </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="treeview @if($info->subMenu == 'Accounts') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Bank Accounts </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Accounts') active @endif"><a href="{{ url('bank/admin/accounts') }}"><i class="fa fa-list"></i> Accounts </a></li>
                <li class="@if($info->thirdMenu == 'New Account') active @endif"><a href="{{ url('bank/admin/accounts/create') }}"><i class="fa fa-plus text-aqua"></i> New Account</a></li>
            </ul>
        </li>
        <li class="treeview @if($info->subMenu == 'Deposits') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Deposits </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Deposits') active @endif"><a href="{{ url('bank/admin/deposits') }}"><i class="fa fa-list"></i> Deposits </a></li>
                <li class="@if($info->thirdMenu == 'New Deposit') active @endif"><a href="{{ url('bank/admin/deposits/create') }}"><i class="fa fa-plus text-aqua"></i> New Deposit </a></li>
            </ul>
        </li>
        <li class="treeview @if($info->subMenu == 'Withdraws') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Withdraws </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Withdraws') active @endif"><a href="{{ url('bank/admin/withdraws') }}"><i class="fa fa-list"></i> Withdraws </a></li>
                <li class="@if($info->thirdMenu == 'New Withdraw') active @endif"><a href="{{ url('bank/admin/withdraws/create') }}"><i class="fa fa-plus text-aqua"></i> New Withdraw </a></li>
            </ul>
        </li>

        <li class="@if($info->subMenu == 'Purpose') active @endif"><a href="{{ url('bank/admin/purposes') }}"> <i class="fa fa-circle-o text-aqua"></i> Purposes </a></li>
    </ul>
</li>