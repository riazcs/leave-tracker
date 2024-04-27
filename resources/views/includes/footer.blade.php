<footer class="footer bg-light">
    <div
        class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
        <div>
            <a href="/" target="_blank" class="footer-text fw-bolder">Leave Tracker</a> ©
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button id="logout" class="btn btn-sm btn-outline-danger"><i class="bx bx-log-out-circle me-1"></i>
                    Logout</button>
            </form>
        </div>
    </div>
</footer>