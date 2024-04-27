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
                                    </div>
                                    <div class="col-4">
                                        <a class="btn btn-sm btn-secondary text-white" href="{{route('users.show', $user->id)}}">Details</a>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-icon delete-record" type="button"><i class="bx bx-trash"></i></button>
                                    </div>

                                </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h5 class="card-title mb-0">Leave History</h5>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-primary right-0" data-bs-toggle="offcanvas" href="#offcanvasLeaveModal" role="button" aria-controls="offcanvasExample">
                                Apply leave
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top" id="datatable">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach ($leaves as $leave)
                            <tr class="odd">
                                <td><span>{{$i++}}</span></td>
                                <td><span>{{$leave->status}}</span></td>
                                <td><span>{{$leave->start_date}}</span></td>
                                <td><span>{{$leave->end_date}}</span></td>
                                <td><span>{{$leave->reason}}</span></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-sm btn-icon edit-record" data-id="{{ $user->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser{{ $user->id }}"><i class="bx bx-edit"></i></button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-sm btn-icon delete-record" type="button"><i class="bx bx-trash"></i></button>
                                        </div>

                                    </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeaveModal" aria-labelledby="offcanvasLeaveModalLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasLeaveModalLabel" class="offcanvas-title">Leave Application Form</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body mx-0 flex-grow-0">
                            <form class="add-new-user pt-0" id="addNewUserForm" action="{{ route('leaves.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="add-user-start-date">Start Date</label>
                                    <input type="date" class="form-control" placeholder="Start date" name="start_date" aria-label="Start date" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="add-user-end_date">End Date</label>
                                    <input type="date" class="form-control" placeholder="End date" name="end_date" aria-label="End date" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="add-user-reason">Reason</label>
                                    <textarea type="text" rows="4" name="reason" class="form-control" placeholder="Reason" aria-label="reason"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="user-plan">Select Type</label>
                                    <select class="form-control" class="form-select" name="type">
                                        <option value="" selected disabled> --Select--</option>
                                        @foreach(App\Enums\LeaveType::types as $key=>$status)
                                        <option value="{{ $key }}">{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="saveUser">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
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

    });
</script>