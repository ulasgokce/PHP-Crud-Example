<?php $__env->startSection('content'); ?>
    <h1 class="text-center text-danger">
        Add Product
        <?php if($message = Session::get('success')): ?>
        <div class ='alert alert-success'>
        <p> <?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
    </h1>
    <br/>
    <form action='<?php echo e(route('products.store')); ?>' method='POST' enctype='application/x-www-form-urlencoded'>
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12 ">
            <div>
                <div class="form-group">
                    <label class="inputPassword">Product Name</label>
                    <input type="text" name="name" class="form-control input-lg"
                           placeholder="Sample Product Name">
                </div>
                <div class="form-group">
                    <label class="inputPassword">SKU</label>
                    <input type="text" name="sku" class="form-control input-lg" placeholder="THX-1138">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Price</label>
                    <input type="number" name="price" class="form-control input-lg" placeholder="TL 35">
                </div>
                 <div class="form-group">
                      <label for="Categories">Categories</label>
                       <select class="js-example-basic-multiple " style="width: 100%" id="categories" multiple name="categories[]">
                       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                   </div>
                 <div class="form-group">
                       <label class="inputPassword">Weight</label>
                       <input type="number" name="weight" class="form-control input-lg" placeholder="kg 1">
                 </div>
                 <div class="form-group">
                        <label class="inputPassword">Type</label>
                        <input type="text" name="type" class="form-control input-lg" placeholder="physical">
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/Products/create.blade.php ENDPATH**/ ?>