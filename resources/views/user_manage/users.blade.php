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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($users as $user)
                        <tr class="odd">
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
                            <td> @if ($user->status)
                                <span class="badge bg-success">{{ "Approved" }}</span>
                                @else
                                <span class="badge bg-danger">{{ "Blocked" }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="row">

                                    <div class="col-4">
                                        <a class="btn btn-sm btn-secondary text-white" href="{{route('users.show', $user->id)}}">Details</a>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-icon edit-record" data-id="{{ $user->id }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateStatus{{ $user->id }}"><i class="bx bx-edit"></i></button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-icon delete-record" type="button" onclick="deleteItem('/users', {{ $user->id }})"><i class="bx bx-trash"></i></button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdateStatus{{ $user->id }}">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">User Status Update</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">
                                <form class="add-new-user pt-0" id="addBalanceForm" action="{{route('update.userStatus')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="add-user-contact"> Select Status</label>
                                        <input name="id" value="{{$user->id }}" type="hidden" />
                                        <select class="form-control form-select" name="status">
                                            <option value="" disabled> --Select--</option>
                                            <option value="1"> Approve</option>
                                            <option value="0"> Block</option>
                                        </select>
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