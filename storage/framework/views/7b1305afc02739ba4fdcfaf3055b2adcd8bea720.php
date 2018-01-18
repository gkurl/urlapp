<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"/>
    <link rel="icon" type="image/png" href=""/>
</head>
<body>


<div id="container">
    <div id="wrapper">

    <h2>Shrink your URL</h2>
    <?php if($errors->any()): ?>
        <div id="error" class="collapsed">
            <span class="closealert">&times;</span>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
            </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

            <div class="form-group">
    <form action="<?php echo e(route('store')); ?>" method="post">
        <input class ="form-control" type="text" name="url" placeholder="Enter URL" value="<?php echo e(old('url')); ?>"><br>&nbsp;
                <input class="btn btn-primary" type="submit" name="submit" onclick="">
    </form>
            </div>
        
<?php if(\Illuminate\Support\Facades\Session::has('url')): ?>
    <h2 class="animated fadeIn">Your shortened URL is here!</h2>
        <form class="animated fadeIn">
            <div class="input-group">
                <input type="text" class="form-control"
                       value="<?php echo e(\URL::current()); ?>/<?php echo e(Session::get('url')); ?>" placeholder="URL" id="copy-input">
                <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="copy-button"
              data-toggle="tooltip" data-placement="button"
              title="Copy to Clipboard">
        Copy
      </button>
    </span>
            </div>
        </form>
<?php endif; ?>

        <?php if(Session::has('original_url')): ?>
            <?php echo e(redirect('http://')); ?>

            <?php endif; ?>

    </div>
</div>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('js/transition.js')); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/copyfunc.js')); ?>"></script>






</body>
</html>