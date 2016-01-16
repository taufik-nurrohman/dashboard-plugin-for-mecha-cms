<?php

Asset::ignore(SHIELD . DS . $config->shield . DS . 'assets' . DS . 'shell' . DS . 'manager.css');

if(Guardian::happy() && $config->page_type === 'manager') {
	Filter::add('shield:path', function() {
		return __DIR__ . DS . 'workers' . DS . 'manager.php';
	}, 1);
	Weapon::add('shell_after', function() {
		echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'pigment' . DS . 'minimal.css', "", 'shell/dashboard.minimal.min.css');
	}, 11);
}