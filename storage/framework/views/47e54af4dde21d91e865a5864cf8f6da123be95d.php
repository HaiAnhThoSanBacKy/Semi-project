
<?php $__env->startSection('page_title', isset($rec) ? 'update student information: '.$rec->name : 'Add student'); ?>
<?php $__env->startSection('slot'); ?>
<form id="form" class="text-start" method="POST"
    action="<?php echo e(isset($rec) ? route('students.update', ['id' => $rec->id]) : route('students.create')); ?>">
    <?php echo e(csrf_field()); ?>

    <label class="form-label mt-3">Full Name *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="name" class="form-control" required value="<?php echo e($rec->name ?? old('name') ?? ''); ?>">
    </div>

    <label class="form-label mt-3">Student Username *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="code" class="form-control" required value="<?php echo e($rec->profile->code ?? old('code') ?? ''); ?>">
    </div>

    <label class="form-label mt-3">Date Of birth *</label>
    <div class="input-group input-group-outline">
        <input type="date" name="dob" class="form-control" required value="<?php echo e(date('Y-m-d', strtotime($rec->profile->dob ?? old('dob') ?? ''))); ?>">
    </div>

    <label class="form-label mt-3">Email *</label>
    <div class="input-group input-group-outline">
        <input type="email" name="email" class="form-control" required value="<?php echo e($rec->email ?? old('email') ?? ''); ?>">
    </div>

    <label class="form-label mt-3">Password <?php echo e(isset($rec) ? '' : '*'); ?></label>
    <div class="input-group input-group-outline">
        <input type="password" name="password" class="form-control input-outline" <?php echo e(isset($rec) ? '' : 'required'); ?>>
    </div>

    <label class="form-label mt-3">Class *</label>
    <select name="class_id" class="form-select px-3 rounded-lg" required value="<?php echo e($rec->class_id ?? old('class_id') ?? ''); ?>">
        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($class->id); ?>"   <?php echo e(isset($rec) && $rec->profile->class_id == $class->id ? 'selected' : ''); ?>>
            <?php echo e($class->name); ?>


        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="<?php echo e(isset($rec) ? 'update' : 'Submit'); ?>">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\semiproject\semiprojectwebqlsv\resources\views/students/form.blade.php ENDPATH**/ ?>