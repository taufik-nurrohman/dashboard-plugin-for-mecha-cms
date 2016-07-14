<!--

TODO: Add site overview, statistic, etc.

-->
<div class="grid-group">
  <div class="grid span-2">
    <h4><i class="fa fa-file-text"></i> <?php echo $speak->posts; ?></h4>
    <?php if($posts = glob(POST . DS . '*', GLOB_ONLYDIR)): ?>
    <ul>
      <?php foreach($posts as $post): ?>
      <?php $s = File::B($post); ?>
      <li><?php echo Cell::a($config->manager->slug . '/' . $s, isset($speak->{$s}) ? $speak->{$s} : Text::parse($s, '->title'), null, array('data-tooltip' => Text::parse(count(glob($post . DS . '*.txt', GLOB_NOSORT)) . ' ' . $speak->active . ', ' . count(glob($post . DS . '*.draft', GLOB_NOSORT)) . ' ' . $speak->draft . ', ' . count(glob($post . DS . '*.archive', GLOB_NOSORT)) . ' ' . $speak->archive, '->text'))); ?> (<?php echo count(glob($post . DS . '*.*', GLOB_NOSORT)); ?>)</li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
  <div class="grid span-2">
    <h4><i class="fa fa-comments"></i> <?php echo $speak->responses; ?></h4>
    <?php if($responses = glob(RESPONSE . DS . '*', GLOB_ONLYDIR)): ?>
    <ul>
      <?php foreach($responses as $response): ?>
      <?php $s = File::B($response); ?>
      <li><?php echo Cell::a($config->manager->slug . '/' . $s, isset($speak->{$s}) ? $speak->{$s} : Text::parse($s, '->title'), null, array('data-tooltip' => Text::parse(count(glob($response . DS . '*.txt', GLOB_NOSORT)) . ' ' . $speak->approved . ', ' . count(glob($response . DS . '*.hold', GLOB_NOSORT)) . ' ' . $speak->pending, '->text'))); ?> (<?php echo count(glob($response . DS . '*.*', GLOB_NOSORT)); ?>)</li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
  <div class="grid span-2">
    <h4><i class="fa fa-users"></i> <?php echo $speak->users; ?></h4>
    <?php if($users = Guardian::ally()): ?>
    <ul>
      <?php foreach($users as $user): ?>
      <li><?php echo $user['name']; ?> <i class="fa fa-user<?php echo Mecha::alter($user['status_raw'], array(0 => '-times', 1 => '-md', 2 => "")); ?>"></i></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
</div>
<div class="grid-group">
  <div class="grid span-2">
    <h4>Recently Updated</h4>
    <p>Nothing.</p>
  </div>
  <div class="grid span-2">
    <h4>Quick Draft</h4>
    <p><?php echo Form::text('title', "", $speak->manager->placeholder_title, array('class' => 'input-block')); ?></p>
    <div class="p"><?php echo Form::textarea('content', "", $speak->manager->placeholder_content, array('class' => array('textarea-block', 'code'))); ?></div>
    <p><?php echo Jot::button('action', $speak->save); ?></p>
  </div>
  <div class="grid span-2">
    <h4>Quick Tags</h4>
    <p><?php echo Form::text('tags', "", null, array('class' => 'input-block')); ?></p>
    <p><?php echo Jot::button('action', $speak->add); ?></p>
  </div>
</div>