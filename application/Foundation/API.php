<?php
namespace Application\Foundation;

use Application\Model\User;
use Colibri\Application\API as ColibriAppAPI;
use Colibri\Session\Session;


/**
 * API class for most common helpers across whole application.
 */
class API extends ColibriAppAPI
{
    /**
     * @var User
     */
    private static $user = null;

    /**
     * @param User $user pass null for unset (logout)
     */
    public static function setUser(User $user = null)
    {
        if ($user === null) {
            Session::remove('user');
            self::$user = null;

            return;
        }

        // чтобы пароль (даже просто хеш) не попал в сессию, удалим его
        unset($user->password);
        Session::set('user', self::$user = $user);
    }

    /**
     * @return User
     */
    public static function user()
    {
        $user = self::$user ?? self::$user = Session::get('user', 'no-in-session');

        return $user == 'no-in-session' ? null : $user;
    }
}
