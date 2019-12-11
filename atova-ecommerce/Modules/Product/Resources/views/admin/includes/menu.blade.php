<li class="treeview @if($info->menu == 'Products') active @endif">
    <a href="#"><i class="fa fa-cart-plus"></i> <span> Products </span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="@if($info->subMenu == 'Stock') active @endif"><a href="{{ url('product/admin/stocks') }}"> <i class="fa fa-circle-o text-aqua"></i> Stock </a></li>
        <li class="@if($info->subMenu == 'Products') active @endif"><a href="{{ url('product/admin/products') }}"> <i class="fa fa-circle-o text-aqua"></i> Products </a></li>
        <li class="@if($info->subMenu == 'Categories') active @endif"><a href="{{ url('product/admin/categories') }}"> <i class="fa fa-circle-o text-aqua"></i> Categories </a></li>
        <li class="@if($info->subMenu == 'Brands') active @endif"><a href="{{ url('product/admin/brands') }}"> <i class="fa fa-circle-o text-aqua"></i> Brands </a></li>

        <li class="treeview @if($info->subMenu == 'Attributes') active @endif">
            <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span> Attributes </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('product/admin/attribute-groups') }}"><i class="fa fa-circle-o"></i> Attributes Group</a></li>
                <li><a href="{{ url('product/admin/attributes') }}"><i class="fa fa-circle-o"></i> Attributes</a></li>
            </ul>
        </li>

    </ul>
</li>