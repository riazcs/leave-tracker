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


    public function create()
    {
    }


    public function store(StoreLeaveRequest $request)
    {
        $data = $request->validated();
        $data['status'] = array_search(StatusEnum::PENDING, StatusEnum::statuses);
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $leave->update($request->validated());
        return back()->with('success', 'update')->withInput();
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return back()->with('success', 'delete')->withInput();
    }

    public function updateLeaveStatus(Request $request)
    {
        $leave = Leave::find($request->id);
        $leave->status = $request->status;
        $leave->comment = $request->comment;
        $leave->save();
        $data = [
            'email' => 'recipient@example.com',
            'message' => 'Your notification message here.'
        ];
        
        event(new LeaveNotificationEvent($data));
        return back()->with('success', 'status_update')->withInput();
    }
}
