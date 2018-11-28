<style>
.sub-admin-menu li{
    list-style: none;
}
</style>
<div class="sub-admin-menu">
    <ul class="navbar">
        <li class="nav-item"><a href="{{ route('admin/products') }}">Products</a></li>
        <li class="nav-item"><a href="{{ route('admin/categories') }}">Categories</a></li>
        <li class="nav-item"><a href="{{ route('admin/users') }}">Users</a></li>
        <li class="nav-item"><a href="{{ route('admin/carriers') }}">Carriers</a></li>
        <li class="nav-item"><a href="{{ route('admin/homepage') }}">Home page</a></li>
        <li class="nav-item"><a href="{{ route('admin/stats') }}">Stats</a></li>
    </ul>
</div>
