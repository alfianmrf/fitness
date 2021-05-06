<?php
if (! function_exists('areActiveRoutes')) {
    function areActiveRoutes(Array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }

    }
}
?>