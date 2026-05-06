<?php

namespace App\Enums;

enum OrderStatus:int
{
    case WaitingSend = 0;
    case Sent = 1;
    case Cancelled = 2;
}
