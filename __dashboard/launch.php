<?php

// Remove default page meta
Weapon::eject('meta', 'do_meta_1');
Weapon::eject('meta', 'do_meta_2');
Weapon::eject('meta', 'do_meta_3');

Filter::remove('meta');

function __do_meta_1() {
    $config = Config::get();
    $speak = Config::speak();
    $html  = O_BEGIN . Cell::meta(null, null, array('charset' => $config->charset)) . NL;
    $html .= Cell::meta('viewport', 'width=device-width', array(), 2) . NL;
    $html .= Cell::title(Text::parse($config->page_title, '->text'), array(), 2) . NL;
    $html .= Cell::link(Filter::colon('favicon:url', $config->url . '/favicon.ico'), 'shortcut icon', 'image/x-icon', array(), 2) . O_END;
    echo $html;
}

// Add minimal page meta data
Weapon::add('meta', '__do_meta_1', 1);

$dashboard_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize();

Asset::ignore(SHIELD . DS . $config->shield . DS . 'assets' . DS . 'shell' . DS . 'manager.css');

Filter::add('shield:path', function() {
    return __DIR__ . DS . 'workers' . DS . 'manager.php';
}, 1);

Weapon::add('shell_after', function() use($dashboard_config) {
    echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'pigment' . DS . $dashboard_config['skin'] . '.css', "", 'shell/dashboard.' . $dashboard_config['skin'] . '.min.css');
}, 11);

require __DIR__ . DS . 'workers' . DS . 'route.manager.php';