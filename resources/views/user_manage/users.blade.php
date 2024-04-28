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