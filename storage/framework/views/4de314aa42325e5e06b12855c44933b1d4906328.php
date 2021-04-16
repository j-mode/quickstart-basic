<!-- // resources/views/tasks.blade.php -->



<?php $__env->startSection('content'); ?>

  <!-- Bootstrap Boilerplate... -->

  <div class="container panel-body">
    <!-- Display Validation Errors -->
    <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- New Task Form -->
    <form action="/task" method="POST" class="form-horizontal">
      <?php echo e(csrf_field()); ?>


      <!-- Task Name -->
      <div class="form-group">
        <label for="task" class="col-sm-3 control-label">タスク</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control">
        </div>
      </div>

      <!-- Add Task Button --> 
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
           <i class="fa fa-plus"></i> タスクを追加 
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- TODO: Current Tasks -->
  <!-- Current Tasks -->
  <?php if(count($tasks) > 0): ?>
    <div class="container panel panel-default mx-auto">
      <div class="panel-heading">
        現在のタスク
      </div>

      <div class="panel-body">
          <table class="table table-striped task-table">
            <thead>
                <th>タスク</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
              <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="table-text"><div><?php echo e($task->name); ?></div></td>

                  <!-- TODO: Delete Button -->
                  <!-- Task Delete Button -->
                  <td>
                    <form action="<?php echo e(url('task/'.$task->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>


                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i> デリート
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\quickstart\resources\views/tasks.blade.php ENDPATH**/ ?>