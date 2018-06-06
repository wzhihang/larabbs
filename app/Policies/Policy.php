<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Log;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
	{
        Log::INFO('userPermission:'.$user->can('manage_contents'));
        Log::INFO('role:'.$user->hasRole('Founder'));
	    // 如果用户有管理内容的权限,授权通过
        if ($user->can('manage_contents')) {
            return true;
        }
	}
}
