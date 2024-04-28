<?php

namespace App\Http\Controllers;

use App\Contracts\LeaveServiceInterface;
use App\Enums\StatusEnum;
use App\Events\LeaveNotificationEvent;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{

    protected $leaveService;

    public function __construct(LeaveServiceInterface $leaveService)
    {
        $this->leaveService = $leaveService;
    }

    public function index()
    {
        $leaves = Leave::latest()->paginate(10);
        return view('leaves.index', compact('leaves'));
    }

    public function store(StoreLeaveRequest $request)
    {
        $data = $request->validated();
        $data['status'] = array_search(StatusEnum::PENDING, StatusEnum::statuses);
        $data['user_id'] = auth()->user()->id;
        $leave = $this->leaveService->createLeave($data);
        return back()->with('success', 'added')->withInput();
    }


    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }


    public function edit(Leave $leave)
    {
        return view('leaves.edit', compact('leave'));
    }

    public function update(UpdateLeaveRequest $request, Leave $leave, $id)
    {
        $data = $request->validated();
        $data['status'] = array_search(StatusEnum::PENDING, StatusEnum::statuses);
        $data['user_id'] = auth()->user()->id;
        $this->leaveService->updateLeave($id, $data);
        return back()->with('success', 'update')->withInput();
    }

    public function destroy(Leave $leave, $id)
    {
        $this->leaveService->deleteLeave($id);
        return response()->json(['message' => 'Leave deleted successfully']);
    }

    public function updateLeaveStatus(Request $request)
    {
        $leave = Leave::with('user')->find($request->id);
        $leave->status = $request->status;
        $leave->comment = $request->comment;
        $leave->save();
        $data = [
            'email' => $leave->user->email,
            'status' => StatusEnum::statuses[$request->status]
        ];

        event(new LeaveNotificationEvent($data));
        return back()->with('success', 'status_update')->withInput();
    }
}
