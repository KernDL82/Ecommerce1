<div>
    <div class="container mt-3 mb-11">
        <div class="card p-2">
            <span><a href="{{ route('admin.dashboard.index') }}">Dashboard</a> / </span>
        </div>
    </div>

    <div class="container p-3 my-33">
        {{ $slot }}
    </div>
</div>
