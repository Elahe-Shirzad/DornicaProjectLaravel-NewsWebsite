<?php

namespace App\Enums;

enum NewsStatus:int
{

    case DRAFT = 0;
    case PUBLISH = 1;
    case ARCHIVE = 2;
}
