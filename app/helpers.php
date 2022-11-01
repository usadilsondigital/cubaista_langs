<?php

    function getCurrentUrlWithLocale(string $locale)
    {
        $segments = request()->segments();
        $segments[0] = $locale;        
        app()->setLocale($locale);
        return implode('/',$segments);
    }
