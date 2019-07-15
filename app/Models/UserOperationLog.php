<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 11:06
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class UserOperationLog
{

    protected $data = [];

    /**
     * UserOperationLog constructor.
     */
    public function __construct()
    {

    }

    public function save(array $data)
    {
        DB::table('user_log')->insert($data);
    }

}