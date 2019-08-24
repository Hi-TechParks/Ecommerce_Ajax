<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
  <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<div class="alert alert-danger" role="alert">
  <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/admin/inc/message.blade.php */ ?>