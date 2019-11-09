<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Session extends CI_Model
    {
        public function __construct()
        {
            session_start();
            $baseUrl = dirname(dirname(dirname(dirname(__FILE__)))).'/core/base_url.php';
            require_once($baseUrl);
            if(!$this->sessionExist('username')){
                header('location:'.$url.'/login.php');
            }
            if($this->getSession('level') != 'guru' && $this->getSession('level') != 'operator' || !$this->sessionExist('level')) {
                header('location:'.$url.'/beranda.php');
            }

        }

        public function setSession($sessionName,$sessionData)
        {
            return $_SESSION[$sessionName] = $sessionData;
        }

        public function getSession(string $sessionName)
        {
            return $_SESSION[$sessionName];
        }

        public function sessionExist(string $sessionName)
        {
            if(isset($_SESSION[$sessionName])):
                return true;
            else:
                return false;
            endif;
        }

        public function unsetSession($sessionName)
        {
            unset($_SESSION[$sessionName]);
        }
        
    }

?>
