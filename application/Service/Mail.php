<?php
namespace Application\Service;

use Colibri\Mail\Mail as ColibriMail;

class Mail extends ColibriMail
{
    /** @var string */
    private static $subjectPrefix = 'Colibri App: ';

    private static function subject(string $subject): string
    {
        return self::$subjectPrefix . $subject;
    }

// Example (uncomment):
//    /**
//     * @param \Application\Model\User $user
//     *
//     * @throws \Swift_SwiftException
//     */
//    public static function registration(User $user)
//    {
//        static::send($user->mail, self::subject('registration'), 'registration', ['user' => $user]);
//    }
}
