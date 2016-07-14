<?php

// Create fake page on `manager`
Route::accept($config->manager->slug, function() use($config, $speak) {
    Config::set(array(
        'page_title' => $config->title . $config->title_separator . $speak->manager->title_manager,
        'cargo' => __DIR__ . DS . 'workers' . DS . 'cargo.manager.php'
    ));
    Shield::attach('manager');
}, 1);

// Load the configuration data
$c_dashboard = $config->states->{'plugin_' . md5(File::B(__DIR__))};

// Remove default page meta data
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

// Add link to the frontend
Config::merge('manager_bar', array(
    $config->title => array(
        'icon' => 'home',
        'url' => '/',
        'stack' => 9.009
    )
));

Asset::ignore(array(
    SHIELD . DS . $config->shield . DS . 'assets' . DS . 'shell' . DS . 'manager.css',
    ASSET . DS . 'shell' . DS . 'manager.min.css'
));

Weapon::add('shell_after', function() use($c_dashboard) {
    echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'pigment' . DS . $c_dashboard->skin . '.css', "", 'shell/dashboard.' . $c_dashboard->skin . '.min.css');
}, 11);

Filter::add('shield:path', function() {
    return __DIR__ . DS . 'workers' . DS . 'manager.php';
}, 1);