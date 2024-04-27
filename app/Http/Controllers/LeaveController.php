<?php

namespace App\Http\Controllers;

use App\Contracts\LeaveServiceInterface;
use App\Enums\StatusEnum;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\Leave;

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
        return back()->with('success', 'Leave apply successfully');
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
        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully');
    }

    public function updateLeaveStatus(Leave $leave, string $status)
    {
        $statusCode = array_search($status, StatusEnum::statuses);

        if ($statusCode === null) {
            return false;
        }

        $leave->status = $statusCode;
        $leave->save();

        return true;
    }
}
