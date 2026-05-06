<?php

namespace App\Enums;

enum CommentStatus:int
{
    case Accepted = 1;
    case Waiting = 2;
    case Rejected = 3;
}
