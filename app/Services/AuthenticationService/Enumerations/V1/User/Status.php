<?php

namespace App\Services\AuthenticationService\Enumerations\V1\User;


enum Status: int
{
    case STATUS_INACTIVE = 0;
    case STATUS_ACTIVE = 1;

}
