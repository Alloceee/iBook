<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/29
 * Time: 12:43
 */

namespace App\Model;

use Laravel\Socialite\Contracts\User;

interface UserQQ extends User
{
    public function getGender();


}