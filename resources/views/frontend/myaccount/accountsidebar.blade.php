<div class="dashboard_tab_button aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
    <ul role="tablist" class="nav flex-column dashboard-list">
        <h2 style="text-transform: capitalize;" class="m-2">{{ auth()->user()->name }}</h2>
        <li @if(request()->is('myaccount*')) class="liactive" @endif>
            <a href="{{ route('myaccount') }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Dashboard</a>
        </li>
        <li @if(request()->is('orders*')) class="liactive" @endif>
            <a href="{{ route('orders') }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a>
        </li>
        <li @if(request()->is('mywishlist*')) class="liactive" @endif>
            <a href="{{ route('mywishlist.index') }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Wish list</a>
        </li>
        <li @if(request()->is('address*')) class="liactive" @endif>
            <a href="{{ route('address') }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a>
        </li>
        <li @if(request()->is('accountdetail/' . auth()->user()->id)) class="liactive" @endif>
            <a href="{{ route('accountdetail', auth()->user()->id) }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
        </li>
        <li>
            <a href="{{ route('customer/logout') }}" class="nav-link btn btn-block btn-md btn-black-default-hover">Logout</a>
        </li>
    </ul>
</div>
