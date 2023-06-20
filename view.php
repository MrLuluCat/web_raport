<?php
class View
{
    protected static $sections = [];
    protected static $yields = [];

    public static function make($viewPath, $data = [])
    {
        $content = self::getContent($viewPath, $data);

        foreach (self::$sections as $section => $value) {
            $content = str_replace("@yield('$section')", $value, $content);
        }

        echo $content;
    }

    public static function section($name, $content)
    {
        self::$sections[$name] = $content;
    }

    public static function getContent($viewPath, $data)
    {
        extract($data);
        ob_start();
        include $viewPath;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public static function extend($viewPath, $data = [])
    {
        // Panggil metode make langsung dari sini
        self::make($viewPath, $data);
    }
}

