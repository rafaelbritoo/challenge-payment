<?php

namespace App\Enum;


enum TransferStatusEnum: string
{
    case Pending = 'pending';
    case Rejected = 'rejected';
    case Accepted = 'accepted';
    case Done = 'done';

}
