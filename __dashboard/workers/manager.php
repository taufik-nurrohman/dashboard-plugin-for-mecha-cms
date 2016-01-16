<!DOCTYPE html>
<html>
  <head>
  <?php Weapon::fire('SHIPMENT_REGION_TOP'); ?>
  <?php Weapon::fire('shell_before'); ?>
  <?php $root = File::D(__DIR__) . DS . 'assets' . DS . 'shell' . DS; echo Asset::stylesheet(array(
      $root . 'atom.css',
	  $root . 'layout.css'
  ), "", 'shell/dashboard.min.css'); ?>
  <?php Weapon::fire('shell_after'); ?>
  </head>
  <body>
  <?php Weapon::fire('cargo_before'); ?>
  <div class="board">
    <aside class="board-left">
      <?php echo Widget::manager('MENU'); ?>
    </aside>
    <article class="board-right">
      <?php Shield::chunk('page.header'); ?>
      <?php Shield::chunk('page.body'); ?>
    </article>
  </div>
  <?php Weapon::fire('cargo_after'); ?>
  <?php Weapon::fire('sword_before'); ?>
  <?php Weapon::fire('sword_after'); ?>
  <?php Weapon::fire('SHIPMENT_REGION_BOTTOM'); ?>
  </body>
</html>