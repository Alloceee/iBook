<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/26
 * Time: 0:33
 */

namespace App;


class UserActivation
{
    protected $table = 'user_activations';
    protected $fillable= ['user_id','active','token'];

}