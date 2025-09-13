<?php

namespace App\Enums;

enum MilitaryServiceStatus: int
{

    case ACTIVE = 0;
    case EXEMPT = 1;
    case COMPLETION = 2;
}
