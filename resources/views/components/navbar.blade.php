<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <h4 class="text-white mt-2">Selamat datang!</h4>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <button class="btn btn-default" form="logout-form">Logout</button>
                <form id="logout-form" name="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </li>
        </ul>
    </div>
</nav>
