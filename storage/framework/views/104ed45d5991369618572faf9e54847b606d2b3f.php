<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1 class="text-danger text-center">Product</h1>
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
                            <th>ID</th>
                            <th>Product SKU</th>
                            <th>Stock Level</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row['id']); ?></td>
                                <td><?php echo e($row['sku']); ?></td>
                                <td><?php if($row['inventory_level'] < 0 ): ?>
                                        Stock is Available
                                    <?php elseif($row['inventory_level'] === 0): ?>
                                        N/A
                                    <?php else: ?>
                                        <?php echo e($row['inventory_level']); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($row['name']); ?></td>
                                <td><?php echo e($row['price']); ?></td>
                                <td><a href="products/<?php echo e($row['id']); ?>/edit">Edit</a>/<a
                                        href="products/<?php echo e($row['id']); ?>/destroy">delete</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                     <div class="pagination">
                         <a href="?page=<?php echo e(1); ?>">&laquo;</a>
                         <?php for($i=1; $i<=$totalPages;$i++): ?>
                                 <a href="?page=<?php echo e($i); ?>"><?php echo e($i); ?>  </a>
                         <?php endfor; ?>
                         <a href="?page=<?php echo e($totalPages-1); ?>">&raquo;</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/Products/index.blade.php ENDPATH**/ ?>