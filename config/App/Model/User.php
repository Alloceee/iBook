<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/16
 * Time: 19:03
 */

namespace App\Model;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TopicReplied;
use Illuminate\Support\Facades\Auth;

class User extends Model implements Authenticatable
{
    use Notifiable {
        notify as protected laravelNotify;
    }
    use \Illuminate\Auth\Authenticatable;


    //定义当前模型需要关联的数据表
    protected $table = 'user';
    protected $primaryKey = "id";    //定义用户表主键
    public $timestamps = false;         //是否有created_at和updated_at字段

    protected $fillable = [     //可以被赋值的字段
        'username', 'password', 'Job', 'Hobby', 'Address', 'Profile', 'icon', 'notification_count', 'email'
    ];

    protected $hidden = [   //在模型数组或 JSON 显示中隐藏某些属性
        'password', 'remember_token',
    ];

    public function activations()
    {
        return $this->hasOne(\App\UserActivation::class);
    }

    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
        return $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}