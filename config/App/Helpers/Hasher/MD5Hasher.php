<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 21:54
 */
use Illuminate\Contracts\Hashing\Hasher;

class MD5Hasher implements Hasher
{
    public function check($value, $hashedValue, array $options = [])
    {

        return $this->make($value) === $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }

    public function make($value, array $options = [])
    {
        $value = env('SALT', '').$value;

        return md5($value);
    }

}