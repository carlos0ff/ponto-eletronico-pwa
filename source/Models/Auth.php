<?php 
namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;
use Source\Core\View;

/**
 * 
 */
class Auth extends Model
{
    /**
     * @param string $email
     * @param string $password
     * @param bool $save
     * @param int $level
     * @return bool
     */
    public function login(string $email, string $password, bool $save = false, int $level = 1): bool
    {

    }


    /**
     * log-out
     * @return void
     */
    public static function authenticate(): void
    {
        $session = new Session();
        $session->unset("authUser");
    }
}