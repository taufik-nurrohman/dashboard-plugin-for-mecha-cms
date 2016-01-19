<!DOCTYPE html>
<html dir="<?php echo $config->language_direction; ?>" class="page-<?php echo $config->page_type; ?>">
  <head>
  <?php Weapon::fire('SHIPMENT_REGION_TOP'); ?>
  <?php Weapon::fire('shell_before'); ?>
  <?php $root_1 = PLUGIN . DS . 'manager' . DS . 'assets' . DS . 'shell' . DS; ?>
  <?php $root_2 = File::D(__DIR__) . DS . 'assets' . DS . 'shell' . DS; ?>
  <?php echo Asset::stylesheet(array(
      // `manager`
      $root_1 . 'row.css',
      $root_1 . 'upload.css',
      $root_1 . 'tab.css',
      $root_1 . 'toggle.css',
      $root_1 . 'modal.css',
      $root_1 . 'tooltip.css',
      $root_1 . 'sortable.css',
      $root_1 . 'accordion.css',
      $root_1 . 'layout.css',
      // `__dashboard`
      $root_2 . 'atom.css',
      $root_2 . 'layout.css',
  ), "", 'shell/dashboard.min.css'); ?>
  <?php Weapon::fire('shell_after'); ?>
  </head>
  <body>
  <?php Weapon::fire('cargo_before'); ?>
  <div class="board cl cf">
    <aside class="board-left cl cf">
      <?php echo Widget::manager('MENU'); ?>
    </aside>
    <article class="board-right cl cf">
      <?php Shield::chunk('page.header'); ?>
      <?php Shield::chunk($config->page_type !== '404' ? 'page.body' : 'page.body.404'); ?>
    </article>
  </div>
  <?php Weapon::fire('cargo_after'); ?>
  <?php Weapon::fire('sword_before'); ?>
  <?php Weapon::fire('sword_after'); ?>
  <?php Weapon::fire('SHIPMENT_REGION_BOTTOM'); ?>
  </body>
</html>