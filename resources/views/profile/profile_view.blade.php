<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success') == 'profile-updated')
            <div class="alert alert-primary mail-resent" role="alert">
                Profile updated successfully!
            </div>
            @endif
            @if(session('success') == 'password-updated')
            <div class="alert alert-primary mail-resent" role="alert">
                Password updated successfully!
            </div>
            @endif
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                    <div class="card mb-4">
                        <div class="card-body">

                            <form action="{{ route ('update.password',  auth()->user()->id)}}">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="password">Current Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" placeholder="Give current password" class="form-control" name="current_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="{{ old('current_password')}}" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="password">New Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" placeholder="Give new password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="{{ old('password')}}" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="password">Confirm Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" placeholder="Give confirm password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="{{ old('password_confirmation')}}" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <button class="btn btn-primary me-sm-3 me-1 data-submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /Social Accounts -->
            </div>

            <div>
                <div class="text-center mb-4">
                </div>
                <div class="card mb-4">
                    <h3 class="m-3">Edit Information</h3>
                    <p class="m-3">Updating details.</p>
                    <div class="card-body">
                        <form id="editUserForm" class="row g-3" action="{{ route('profile.update', auth()->user()->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">Name</label>
                                <input type="text" id="modalEditUserFirstName" name="name" class="form-control" placeholder="John" value="{{ old('name',auth()->user()->name) }}" />
                            </div>


                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Email</label>
                                <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" placeholder="example@domain.com" value="{{ auth()->user()->email}}" readonly />
                                <small>Email not changeable</small>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="status" class="form-select" aria-label="Default select example">
                                    <option selected disabled>--Select Status--</option>
                                    <option value="1" @if (auth()->user()->status) selected @endif>Active</option>
                                    <option value="0" @if (auth()->user()->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="modalEditUserPhone" name="contact" class="form-control phone-number-mask" placeholder="019..." value="{{ old('contact', auth()->user()->contact) }}" />
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserCountry">Country</label>
                                <select id="modalEditUserCountry" name="country" class="select2 form-select" data-allow-clear="true">
                                    <option value="" selected disabled>--Select Country--</option>
                                    @foreach($countries as $country)
                                    <option {{ $country->id == old('country', optional($user->country)->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-12 text-start">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>

</x-app-layout>