<?php

namespace App\Contracts;

interface LeaveServiceInterface
{
    public function getAllLeaves();
    public function getLeaveById($id);
    public function createLeave(array $data);
    public function updateLeave($id, array $data);
    public function deleteLeave($id);
}
