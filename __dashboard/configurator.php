<form class="form-plugin" action="<?php echo $config->url_current; ?>/update" method="post">
  <?php echo Form::hidden('token', $token); ?>
  <?php

  $dashboard_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize();

  $options = array();
  foreach(glob(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'pigment' . DS . '*.css', GLOB_NOSORT) as $skin) {
      $skin = File::N($skin);
      $options[$skin] = Text::parse($skin, '->title');
  }

  asort($options);

  ?>
  <p><?php echo Form::select('skin', $options, $dashboard_config['skin']) . ' ' . Jot::button('action', $speak->update); ?></p>
</form>