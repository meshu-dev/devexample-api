<?php

namespace App\Enums;

enum GuestUserEnum: int
{
    case MAX_REQUEST_LIMIT = 1000;
    case ACCOUNT_TIME_LIMIT = 24;
}
