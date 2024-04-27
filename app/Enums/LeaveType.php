<?php
namespace App\Enums;

class LeaveType
{
    const SICK = 'Sick Leave';
    const CASUAL = 'Casual Leave';
    const EMERGENCY = 'Emergency Leave';

    const types = [
        10 => self::SICK,
        20 => self::CASUAL,
        30 => self::EMERGENCY,
    ];
}
