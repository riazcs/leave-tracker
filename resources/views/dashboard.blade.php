<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>
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
        @if(session('success') == 'balance_add')
        <div class="alert alert-success">
            Balance added successfully!
        </div>
        @endif

        @role('admin')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h5 class="card-title mb-0">User List</h5>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary right-0" data-bs-toggle="offcanvas" href="#offcanvasAddUser" role="button" aria-controls="offcanvasExample">
                            <i class="bx bx-plus me-sm-1"></i>Add User
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top" id="datatable">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($users as $user)
                        <tr class="odd">
                            <td><span>{{$i++}}</span></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-warning">{{Illuminate\Support\Str::substr($user->name,
                                                0, 1)}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">{{$user->name}}</span></a>
                                    </div>
                                </div>
                            </td>
                            <td><span class="user-email">{{$user->email}}</span></td>


                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-icon edit-record" data-id="{{ $user->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser{{ $user->id }}"><i class="bx bx-edit"></i></button>
                                    </div>
                                    <div class="col-4">


                                        <button class="btn btn-sm btn-icon delete-record" type="button"><i class="bx bx-trash"></i></button>
                                    </div>

                                </div>
            </div>
            </td>
            </tr>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser{{ $user->id }}">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Update User</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-user pt-0" id="updateUserForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">Full Name</label>
                            <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" value="{{ $user->name}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-email">Email</label>
                            <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" value="{{ $user->email}}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-user-contact">Contact</label>
                            <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" value="{{ $user->contact}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-company">Company</label>
                            <input type="text" id="add-user-company" name="company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" value="{{ $user->company}}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="user-role">User Role</label>
                            <select id="user-role" class="form-select" name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="user-plan">Select Status</label>
                            <select id="user-plan" class="form-select" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-company">Password</label>
                            <input type="text" id="add-user-company" name="password" class="form-control" placeholder="Give Password" aria-label="jdoe1" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-company">Confirm Password</label>
                            <input type="text" id="add-user-company" name="password_confirmation" class="form-control" placeholder="Give Confirm Password" aria-label="jdoe1" />
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddBalance{{ $user->id }}">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Balance</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-user pt-0" id="addBalanceForm" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="add-user-contact">Current Balance</label>
                            <input name="user_id" value="{{$user->id }}" type="hidden" />
                            <input type="text" id="add-user-contact" class="form-control phone-mask" aria-label="john.doe@example.com" name="current_balance" value="{{ $user->total_balance ? $user->total_balance : 0  }}" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount">Amount*</label>
                            <input type="number" min="1" id="amount" name="amount" class="form-control" placeholder="Give amount" aria-label="jdoe1" required />
                            <small>Amount Required</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount_confirmation">Confirm Amount*</label>
                            <input type="number" min="1" id="amount_confirmation" name="amount_confirmation" class="form-control" placeholder="Confirm amount" aria-label="jdoe1" required />
                            <small>Amount Required</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-company">Notes</label>
                            <textarea type="text" id="add-user-company" name="note" rows="5" class="form-control" placeholder="Give description" aria-label="jdoe1"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="saveBalance">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddRouter{{ $user->id }}" aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Router</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-user pt-0" id="addNewUserForm" action="" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $user->id}}" name="user_id" />
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">Router Name</label>
                            <input type="text" class="form-control" id="add-user-fullname" placeholder="Router Name" name="name" aria-label="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-email">Win port</label>
                            <input type="text" id="add-user-email" class="form-control" placeholder="1002" aria-label="john.doe@example.com" name="win_port" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-email">Web port</label>
                            <input type="text" id="add-user-email" class="form-control" placeholder="4000" aria-label="john.doe@example.com" name="webport" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-email">API port</label>
                            <input type="text" id="add-user-email" class="form-control" placeholder="7000" aria-label="john.doe@example.com" name="apiport" readonly />
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="country">Location</label>
                            <input type="text" id="add-user-company" name="location" class="form-control" placeholder="Give location" aria-label="jdoe1" />
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
        <!-- Offcanvas to add new user -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0" id="addNewUserForm">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Contact</label>
                        <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Company</label>
                        <input type="text" id="add-user-company" name="company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select" name="country">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="user-role" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="user-plan">Select Status</label>
                        <select id="user-plan" class="form-select" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Password</label>
                        <input type="text" id="add-user-company" name="password" class="form-control" placeholder="Give Password" aria-label="jdoe1" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Confirm Password</label>
                        <input type="text" id="add-user-company" name="password_confirmation" class="form-control" placeholder="Give Confirm Password" aria-label="jdoe1" />
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="saveUser">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h5 class="card-title mb-0">Leave History</h5>
                </div>

            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top" id="datatable">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Date</th>
                        <th>Approve status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($users as $user)
                    <tr class="odd">
                        <td><span>{{$i++}}</span></td>
                        <td class="sorting_1">
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-warning">{{Illuminate\Support\Str::substr($user->name,
                                                0, 1)}}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">{{$user->name}}</span></a>
                                </div>
                            </div>
                        </td>
                        <td><span class="user-email">{{$user->email}}</span></td>


                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-sm btn-icon edit-record" data-id="{{ $user->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser{{ $user->id }}"><i class="bx bx-edit"></i></button>
                                </div>
                                <div class="col-4">


                                    <button class="btn btn-sm btn-icon delete-record" type="button"><i class="bx bx-trash"></i></button>
                                </div>

                            </div>
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endrole


    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            lengthChange: true,
            buttons: ['copy', 'excel', 'pdf']
        });

        $('#amount, #amount_confirmation').on('input', function() {
            var amountValue = $('#amount').val().trim();
            var confirmAmountValue = $('#amount_confirmation').val().trim();
            var submitButton = $('#saveBalance');

            // Disable the submit button if the amounts do not match
            submitButton.prop('disabled', amountValue !== confirmAmountValue);
        });
    });


    $('#saveUser').click(function(e) {
        e.preventDefault();
        $(this).html('Saving..');

        $.ajax({
            data: $('#addNewUserForm').serialize(),
            url: "",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                if (data.response == 'success') {
                    $('#offcanvasAddUser').offcanvas('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500,
                        width: 300,
                        height: 80,
                    })
                    window.location.reload();
                } else {
                    handleErrors(data.errors);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500,
                        width: 300,
                        height: 80,
                    })
                }
            },
            error: function(data) {
                handleErrors(data.responseJSON.errors);
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something went wrong',
                    showConfirmButton: false,
                    width: 500,
                    height: 50,
                    timer: 1500
                })
            }
        });
    });


    function handleErrors(errors) {
        $.each(errors, function(key, value) {
            var inputField = $('[name="' + key + '"]');
            inputField.addClass('is-invalid');
            var errorMessage = '<div class="invalid-feedback">' + value + '</div>';
            inputField.after(errorMessage);
        });

    }
</script>