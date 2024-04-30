<?php
namespace App\Helpers;

class Message {

    public static function addKey($type, $key) 
    { 
        session_start(); 
        $_SESSION['mess']['type'] = $type; 
        $_SESSION['mess']['key'] = $key; 
    }

    public static function addText($type, $text) 
    { 
        session_start(); 
        $_SESSION['mess']['type'] = $type; 
        $_SESSION['mess']['text'] = $text; 
    }

    public static function display() 
    { 
        session_start(); 
        // выходим если нет сообщения 
        if (empty($_SESSION['mess'])) return; 
        // получаем текст сообщения 
        $type = $_SESSION['mess']['type']; 
        $text = self::getText($type); 
        // выводим текст на экран 
        if ($type == 'success') echo "<div class='alert alert-success mt-3'>$text</div>"; 
        else echo "<div class='alert alert-danger mt-3'>$text</div>"; 
        // удаляем сессию 
        unset($_SESSION['mess']); 
    }

    private static function getText($type) 
    { 
        // возвращаем если в сессии хранится текст сообщения 
        if ($_SESSION['mess']['text']) return $_SESSION['mess']['text']; 
        // получаем массив сообщений из файла 
        $messages = include 'messages.php'; 
        // возвращаем текст сообщения из массива по ключу 
        $key = $_SESSION['mess']['key']; 
        return $messages[$type][$key]; 
    }
}