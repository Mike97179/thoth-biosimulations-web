<?php
    function redirect($url) {
        header("Location: $url");
    }

    function dd($value) {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        exit;
    }

    function query($query) {
        global $db;
        return mysqli_query($db, $query);
    }

    function arrayAssoc($res) {
        return mysqli_fetch_assoc($res);
    }

    function escape($str) {
        global $db;
        return mysqli_real_escape_string($db, $str);
    }

    function validateEmail($email) {
        $res = query("SELECT * FROM users WHERE email = '$email'");
        return mysqli_num_rows($res) > 0;
    }

    function getData($array, $index, $key) {
        return isset($array[$index][$key]) ? $array[$index][$key] : '';
    }

    function setSwal($title, $text, $icon) {
        if(!empty($title)) {
            $_SESSION['title'] = $title;
            $_SESSION['text']  = $text;
            $_SESSION['icon']  = $icon;
        }
    }

    function showSwalMessage() {
        if(isset($_SESSION['title'])) {
            $title = $_SESSION['title'];
            $text  = $_SESSION['text'];
            $icon  = $_SESSION['icon'];
            $script = <<<DELIMITER
                <script>
                    showSwal("$title", "$text", "$icon");
                </script>
DELIMITER;
            echo $script;
            unset($_SESSION['title'], $_SESSION['text'], $_SESSION['icon']);
        }
    }
?>