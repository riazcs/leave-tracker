<?php

namespace App\Services;

use App\Contracts\LeaveServiceInterface;
use App\Models\Leave;

class LeaveService implements LeaveServiceInterface
{
    public function getAllLeaves()
    {
        return Leave::withTrashed()->get();
    }

    public function getLeaveById($id)
    {
        return Leave::with('addresses')->findOrFail($id);
    }

    public function createLeave(array $data)
    {
        return Leave::create($data);
    }

    public function updateLeave($id, array $data)
    {
        $Leave = Leave::findOrFail($id);
        $Leave->update($data);
        return $Leave;
    }

    public function deleteLeave($id)
    {
        $Leave = Leave::findOrFail($id);
        $Leave->delete();
    }
}
