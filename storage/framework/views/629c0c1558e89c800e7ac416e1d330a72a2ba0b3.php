<?php $__env->startSection('content'); ?>
    <h1 class="text-center text-danger">
        Add Category
        <?php if($message = Session::get('success')): ?>
        <div class ='alert alert-success'>
        <p> <?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
    </h1>
    <br/>
    <form action='<?php echo e(route('categories.store')); ?>' method='POST' enctype='application/x-www-form-urlencoded'>
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12 ">
            <div>
                <div class="form-group">
                    <label class="inputPassword">Category Name</label>
                    <input type="text" name="name" class="form-control input-lg"
                           placeholder="Bath">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Description</label>
                    <input type="text" name="description" class="form-control input-lg" placeholder="This is a bath">
                </div>
               <input id="toggle-event" default="false" type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger"> Is it a child Category ?</input>
                 <div class="form-group" id="categories-group">
                      <label for="parent_id">Select a parent category</label>
                       <select class="js-example-basic-single" style="width: 100%" id="parent_id"  name="parent_id">
                            <option selected value="<?php echo e(0); ?>"></option>
                       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
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
            $(document).ready(function() {
                   $('#toggle-event').change(function() {
                       $('#categories-group').toggle()
                   });
            });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mycrud\resources\views/Categories/create.blade.php ENDPATH**/ ?>