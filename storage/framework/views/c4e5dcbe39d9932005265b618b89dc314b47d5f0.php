<?php $__env->startSection('content'); ?>
    <h1 class="text-center text-danger">
        Edit Category
    </h1>
    <br/>
    <form action='<?php echo e(route('categories.update', $category['id'])); ?>' method='POST' enctype='multipart/from-data'>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div>
                    <div class="form-group">
                        <label class="inputPassword">Category Name</label>
                        <input type="text" name="name" class="form-control input-lg"
                               placeholder="Bath" value="<?php echo e($category['name']); ?>">
                    </div>
                    <div class="form-group">
                        <label class="inputPassword">Description</label>
                        <input type="text" name="description" class="form-control input-lg" placeholder="This is a bath"
                               value="<?php echo e($category['description']); ?>">
                    </div>
                    <div class="form-group" id="categories-group">
                        <label for="parent_id">Select a parent category</label>
                        <select class="js-example-basic-single " style="width: 100%" id="parent_id" name="parent_id">
                            <option value=0>It doesn't have any parent category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($cat['id']); ?>" <?php echo e($category['parent_id'] === $cat['id'] ? 'selected' : ""); ?>><?php echo e($cat['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info form-control input-lg" id="save">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/categories/edit.blade.php ENDPATH**/ ?>