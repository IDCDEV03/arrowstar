<!-- resources/views/print_preview.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>พิมพ์โปรแกรมทัวร์ : ArrowStar Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        window.print();
    </script>

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        .header,
        .header-space,
        .footer,
        .footer-space {
            height: 100px;
        }

       .header {
            position: fixed;
            top: 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>


    <table class="table">
        <thead>
            <tr>
                <td colspan="2">
                    <div class="header-space">
                        <img class="mb-5" src="<?php echo e(asset('assets/images/logo1.png')); ?>" width="80px"> &nbsp;
                        <label style="font-size: 12pt"><strong>ArrowStar Travel</strong> 
                   <br>
                            211/10 หมู่4 ต.หนองขอนกว้าง อ.เมือง จ.อุดรธานี 41000 &nbsp; โทร. 062-1481969
                            <br>
                            www.arrowstartravel114.com / Email: arrowstartravel114@gmail.com 
                        </label>
                    </div>               
            </td>
        </tr>
        </thead>
        <tbody>
            <div class="content">
                <tr>
                    <td colspan="2">
                        <?php $__currentLoopData = $pk_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="font-size: 20pt"><strong> <?php echo e($row->package_name); ?> </strong></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="row">
                            <?php $__currentLoopData = $img_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-4">
                                    <img src="<?php echo e(asset($img->travel_img)); ?>" class="img-thumbnail">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </td>
                </tr>

                <?php $__currentLoopData = $print_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="2" class="table-primary"><strong> วันที่ <?php echo e($item->program_day_count); ?></strong>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td style="width:30%"><?php echo e($item->travel_name); ?></td>
                        <td><span style="font-size: 12pt"><?php echo $item->travel_detail; ?></span></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $single_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            ความต้องการพิเศษ
                        </td>
                        <td><?php echo e($item->program_spacial_req); ?></td>

                    </tr>
                    <tr>
                        <td>
                            Tips
                        </td>
                        <td><?php echo e($item->program_tips); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </tbody>

    </table>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
<?php /**PATH D:\GitHub\arrowstar\resources\views/admin/print_preview.blade.php ENDPATH**/ ?>