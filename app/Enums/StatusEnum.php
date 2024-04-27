<?php
namespace App\Enums;

class StatusEnum
{
    const PENDING = 'Pending';
    const APPROVED = 'Approved';
    const REJECTED = 'Rejected';

    const statuses = [
        10 => self::PENDING,
        20 => self::APPROVED,
        30 => self::REJECTED,
    ];
}
