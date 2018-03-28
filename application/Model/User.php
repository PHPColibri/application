<?php
namespace Application\Model;

use Colibri\Database\Model;

/**
 * Description of User
 */
class User extends Model
{
    protected static $tableName = 'users';
    protected static $PKFieldName = ['id'];

    public $id;
    public $login;
    public $password;
    public $name;
    public $lastname;
    public $sex = 1;
    public $status;
    public $mail;
    public $activation_hash;

    protected static $relations = [
    ];

    /**
     * @param string $login
     *
     * @return bool
     */
    public static function loginExists(string $login)
    {
        return self::recordExists(['login' => $login]);
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public static function emailExists(string $email)
    {
        return self::recordExists(['mail' => $email]);
    }

    /**
     * @param string $login
     *
     * @return $this|User|null
     */
    public static function findByLogin(string $login)
    {
        return (new static())->load(['login' => $login]);
    }

    /**
     * @param $email
     *
     * @return $this|User|null
     */
    public static function findByEmail(string $email)
    {
        return (new static())->load(['mail' => $email]);
    }

    /**
     * @param string $secret
     *
     * @throws \Exception
     */
    public function changeSecret(string $secret)
    {
        $this->save(['activation_hash' => $secret]);
    }

    /**
     * @param string $password
     *
     * @throws \Exception
     */
    public function changePassword(string $password)
    {
        $this->save(['password' => $password]);
    }
}
