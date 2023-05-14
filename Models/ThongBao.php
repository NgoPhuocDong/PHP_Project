<?php

class ThongBao
{
    private $sessionKey;

    public function __construct()
    {
        $this->sessionKey = 'thongbao';
    }

    public function getThongBao()
    {
        // Get the thông báo from the session
        $thongbao = isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : '';

        // Clear the thông báo from the session
        unset($_SESSION[$this->sessionKey]);

        return $thongbao;
    }
}
