
<?php $__env->startSection('page_title', isset($rec) ? 'Cập nhật điểm' : 'Add point'); ?>
<?php $__env->startSection('slot'); ?>
<form id="form" class="text-start" method="POST" action="<?php echo e(isset($rec) ? route('scores.update', ['id' => $rec->id]) : route('scores.create')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label mt-3">Component Score 1 *</label>
                <div class="input-group input-group-outline">
                    <input type="number" step="0.01" name="tp1" class="form-control" required value="<?php echo e($rec->tp1 ?? old('tp1') ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label mt-3">Component Score 2</label>
                <div class="input-group input-group-outline">
                    <input type="number" step="0.01" name="tp2" class="form-control" value="<?php echo e($rec->tp2 ?? old('tp2') ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label mt-3">Point process</label>
                <div class="input-group input-group-outline">
                    <input type="number" step="0.01" name="qt" class="form-control" value="<?php echo e($rec->qt ?? old('qt') ?? ''); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label mt-3">Final grade</label>
                <div class="input-group input-group-outline">
                    <input type="number" step="0.01" name="ck" class="form-control" value="<?php echo e($rec->ck ?? old('ck') ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label mt-3">Final grade</label>
                <div class="input-group input-group-outline">
                    <input type="number" step="0.01" name="tk" class="form-control" value="<?php echo e($rec->tk ?? old('tk') ?? ''); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label mt-3">Choose a student *</label>
                <div class="overflow-auto" style="max-height: 50vh;">
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="student_id"
                            value="<?php echo e($row->profile->id); ?>" <?php echo e(($rec->student_id ?? old('student_id')) == $row->profile->id ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="customRadio1"><?php echo e($row->name); ?> - <?php echo e($row->profile->code); ?></label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label mt-3">Choose Subject *</label>
                <div class="overflow-auto" style="max-height: 50vh;">
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="subject_id"
                            value="<?php echo e($row->id); ?>" <?php echo e(($rec->subject_id ?? old('subject_id')) == $row->id ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="customRadio1"><?php echo e($row->name); ?></label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="<?php echo e(isset($rec) ? 'Cập nhật' : 'Add'); ?>">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\semiproject\semiprojectwebqlsv\resources\views/scores/form.blade.php ENDPATH**/ ?>