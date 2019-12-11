<li class="treeview @if($info->menu == 'Investment') active @endif">
    <a href="#"><i class="fa fa-money"></i> <span> Investment </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">

        <li class="treeview @if($info->subMenu == 'Investor') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Investors </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Investors') active @endif"><a href="{{ url('invest/admin/investors') }}"><i class="fa fa-list"></i> Investors </a></li>
                <li class="@if($info->thirdMenu == 'New Investor') active @endif"><a href="{{ url('invest/admin/investors/create') }}"><i class="fa fa-plus text-aqua"></i> New investor </a></li>
            </ul>
        </li>

        <li class="treeview @if($info->subMenu == 'Invests') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Invests </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Invest') active @endif"><a href="{{ url('invest/admin/invests') }}"><i class="fa fa-list"></i> Invests </a></li>
                <li class="@if($info->thirdMenu == 'New Invest') active @endif"><a href="{{ url('invest/admin/invests/create') }}"><i class="fa fa-plus text-aqua"></i> New Invest</a></li>
            </ul>
        </li>

        <li class="treeview @if($info->subMenu == 'Withdraw') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Withdraw </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if($info->thirdMenu == 'Withdraw') active @endif"><a href="{{ url('invest/admin/withdraws') }}"><i class="fa fa-list"></i> Withdraws </a></li>
                <li class="@if($info->thirdMenu == 'New Withdraw') active @endif"><a href="{{ url('invest/admin/withdraws/create') }}"><i class="fa fa-plus text-aqua"></i> New withdraw</a></li>
            </ul>
        </li>

    </ul>
</li>