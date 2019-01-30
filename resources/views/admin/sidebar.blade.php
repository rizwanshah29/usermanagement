<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        Users
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/roles') }}">
                        Role
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/permissions') }}">
                        Permission  
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
