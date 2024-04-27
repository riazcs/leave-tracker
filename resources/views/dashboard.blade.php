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
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <a href="/user/manage">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Leave Request</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">{{$totalLeaves}}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="/user/manage">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Approved Leave</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">{{$approvedLeaves}}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="/user/manage">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Pending Leave</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">{{$pendingLeaves}}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="/user/manage">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Rejected Leave</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">{{$rejectedLeaves}}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
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
                                <td><span>@if($leave->status)
                                        @if ($leave->status == array_search(\App\Enums\StatusEnum::PENDING, \App\Enums\StatusEnum::statuses))
                                        <span class="badge bg-danger">{{ \App\Enums\StatusEnum::statuses[$leave->status] }}</span>
                                        @else
                                        <span class="badge bg-success">{{ \App\Enums\StatusEnum::statuses[$leave->status] }}</span>
                                        @endif
                                        @endif</span></td>
                                <td><span>{{$leave->start_date}}</span></td>
                                <td><span>{{$leave->end_date}}</span></td>
                                <td><span>{{$leave->reason}}</span></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-sm btn-icon edit-record" data-id="{{ $leave->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser{{ $leave->id }}"><i class="bx bx-edit"></i></button>
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
                                    <input type="hidden" class="form-control" placeholder="Start date" name="user_id" value="{{auth()->user()->id}}" />
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