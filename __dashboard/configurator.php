<?php

$c_dashboard = $config->states->{'plugin_' . md5(File::B(__DIR__))};

$options = array();
foreach(glob(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'pigment' . DS . '*.css', GLOB_NOSORT) as $skin) {
    $s = File::N($skin);
    if($ss = File::open($skin)->get(1)) {
        // Get title from CSS comment ...
        $ss = preg_replace('#\/\*!?\s*(.*?)\s*\*\/#', '$1', $ss);
    } else {
        $ss = Text::parse($s, '->title');
    }
    $options[$s] = $ss;
}

asort($options);

?>
<p><?php echo Form::select('skin', $options, $c_dashboard->skin) . ' ' . Jot::button('action', $speak->update); ?></p>