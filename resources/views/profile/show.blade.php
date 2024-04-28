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
        @if(session('success') == 'status_update')
        <div class="alert alert-success">
            Leave status updated successfully!
        </div>
        @endif

        @role('admin')
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
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Comment</th>
                            <th>Leave Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($leaves as $leave)
                        <tr class="odd">
                            <td><span>{{$i++}}</span></td>
                            <td><span>{{$leave->user->name}}</span></td>
                            <td><span>{{$leave->start_date}}</span></td>
                            <td><span>{{$leave->end_date}}</span></td>
                            <td><span>{{$leave->reason}}</span></td>
                            <td><span>{{$leave->comment}}</span></td>
                            <td><span>@if($leave->status)
                                    @if ($leave->status == array_search(\App\Enums\StatusEnum::REJECTED, \App\Enums\StatusEnum::statuses))
                                    <span class="badge bg-danger">{{ \App\Enums\StatusEnum::statuses[$leave->status] }}</span>
                                    @else
                                    <span class="badge bg-success">{{ \App\Enums\StatusEnum::statuses[$leave->status] }}</span>
                                    @endif
                                    @endif</span></td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-icon edit-record" data-id="{{ $leave->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdaeStatus{{ $leave->id }}"><i class="bx bx-edit"></i></button>
                                    </div>
                                    <div class="col-4">

                                        <button class="btn btn-sm btn-icon delete-record" type="button"><i class="bx bx-trash"></i></button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdaeStatus{{ $leave->id }}">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Leave Status Update</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">
                                <form class="add-new-user pt-0" id="addBalanceForm" action="{{route('update.leaveStatus')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="add-user-contact"> Select Status</label>
                                        <input name="id" value="{{$leave->id }}" type="hidden" />
                                        <input name="user_id" value="{{$leave->user->id }}" type="hidden" />                                  
                                        <select class="form-control form-select" name="status">
                                            <option value="" disabled> --Select--</option>
                                            @foreach(App\Enums\StatusEnum::statuses as $key => $status)
                                            <option value="{{ $key }}" @if($key==$leave->status) selected @endif>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="add-user-reason">Comment</label>
                                        <textarea type="text" rows="4" name="comment" class="form-control" placeholder="Comment" aria-label="reason"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="saveBalance">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                                </form>
                            </div>
                        </div>
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
                            <h5 class="card-title mb-0">NO permission</h5>
                        </div>
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