<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        @role('admin')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Add User</h5>
            </div>
            <div class="card-body">
                <form class="add-new-user pt-0" id="addNewUserForm" action="{{ url('user/store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe"
                            name="name" aria-label="John Doe" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" class="form-control" placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com" name="email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-password">Password</label>
                        <input type="text" id="add-user-password" class="form-control" placeholder="Give pass"
                            aria-label="Give_pass" name="password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Contact</label>
                        <input type="text" id="add-user-contact" class="form-control phone-mask"
                            placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Company</label>
                        <input type="text" id="add-user-company" name="company" class="form-control"
                            placeholder="Web Developer" aria-label="jdoe1" />
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
                        <select id="user-role" class="form-select" name="role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="user-plan">Select Plan</label>
                        <select id="user-plan" class="form-select" name="plane">
                            <option value="basic">Basic</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="company">Company</option>
                            <option value="team">Team</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div>
        @else
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    No permission to manage user

                </h5>
            </div>
        </div>
        @endrole
    </div>
</x-app-layout>