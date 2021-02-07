<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1 class="text-danger text-center">Category</h1>
        </div>
        <hr/>
        <div class="col-12">
            <div class="row">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <br/>
                    <br/>
                    <table class="table table-striped table-bordered col-12">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Description</th>

                        </tr>
                        </thead>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row['name']); ?></td>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($parent['id'] === $row['parent_id']): ?>
                                <td ><?php echo e($parent['name']); ?></td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $row['parent_id']=== 0): ?>
                                    <td>N/A</td>
                                <?php endif; ?>
                                <td><?php echo e($row['description']); ?></td>
                                <td><a href="categories/<?php echo e($row['id']); ?>/edit">Edit</a>/<a
                                        href="categories/<?php echo e($row['id']); ?>/destroy">delete</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/Categories/index.blade.php ENDPATH**/ ?>