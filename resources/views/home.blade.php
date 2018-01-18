<!doctype html>
<html>
    <head>
        <title>home
        </title>

    </head>
    <body>
      <div class="container">
  <?php foreach ($users as $user): ?>
      <?php echo $user->art_id; ?>
  <?php endforeach; ?>
</div>

<?php //echo $users->render(); ?>

    </body>


</html>
