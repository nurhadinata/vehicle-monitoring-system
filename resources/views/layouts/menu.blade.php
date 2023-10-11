<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('admin') }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Admin</p>
    </a>
    <a href="{{ route('manager') }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Manager</p>
    </a>
    <a href="#" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Sign out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
