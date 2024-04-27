<x-guest-layout>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">

                                </span>
                                <h2 class="demo text-body fw-bolder">Leave Tracker</h2>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Forgot Password? 🔒</h4>
                        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                            action="{{ route('password.email') }}" method="POST" novalidate="novalidate">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-primary mail-resent" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="mb-3 fv-plugins-icon-container">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus="">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>

                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
</x-guest-layout>