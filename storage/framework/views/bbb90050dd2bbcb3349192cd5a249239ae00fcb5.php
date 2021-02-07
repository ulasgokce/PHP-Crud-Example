<?php $__env->startSection('content'); ?>
    <h1 class="text-center text-danger">
        Edit Product
    </h1>
    <br/>
    <form action='<?php echo e(route('products.update', $products['id'])); ?>' method='POST' enctype='multipart/from-data'>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div>
                    <div class="form-group">
                        <label class="inputPassword">Product Name</label>
                        <input type="text" name="name" class="form-control input-lg" placeholder="Sample Product Name"
                               value="<?php echo e($products['name']); ?>">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">SKU</label>
                        <input type="text" name="sku" class="form-control input-lg" placeholder="THX-1138"
                               value="<?php echo e($products['sku']); ?>">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Price</label>
                        <input type="number" name="price" class="form-control input-lg" placeholder="35"
                               value="<?php echo e($products['price']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="Categories">Categories</label>
                        <select class="js-example-basic-multiple js-example-responsive" style="width: 100%" id="categories" multiple name="categories[]">
                            <?php $__currentLoopData = $products['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($cat['id']); ?>" <?php echo e($category === $cat['id'] ? 'selected' : ""); ?>><?php echo e($cat['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Weight</label>
                        <input type="number" name="weight" class="form-control input-lg" placeholder="kg 1"
                               value="<?php echo e($products['weight']); ?>">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Type</label>
                        <input type="text" name="type" class="form-control input-lg" placeholder="physical"
                               value="<?php echo e($products['type']); ?>">
                    </div>
                    <button type="submit" class="btn btn-info form-control input-lg" id="save">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/edit.blade.php ENDPATH**/ ?>