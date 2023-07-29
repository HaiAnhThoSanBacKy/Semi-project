
<?php $__env->startSection('page_title', 'List Student'); ?>
<?php $__env->startSection('slot'); ?>
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>

                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Account Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Of Birth</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-xs"><?php echo e($row->name); ?></td>
                        <td class="text-xs"><?php echo e($row->username); ?></td>
                        <td class="text-xs"><?php echo e(date('d/m/Y', strtotime($row->profile->dob))); ?></td>
                        <td class="text-xs"><?php echo e($row->profile->code); ?></td>
                        <td class="text-xs"><?php echo e($row->profile->class->name); ?></td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="<?php echo e(route('students.edit', ['id' => $row->id])); ?>">Change</a> |
                            <a class="text-secondary font-weight-bold text-xs"
                                href="<?php echo e(route('students.delete', ['id' => $row->id])); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td class="align-middle text-secondary font-weight-bold text-xs">no data discovery</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\semiproject\semiprojectwebqlsv\resources\views/students/index.blade.php ENDPATH**/ ?>