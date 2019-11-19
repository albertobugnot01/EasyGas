<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="<?php echo base_url('assets/dist/js/jquery-3.2.1.min.js'); ?>"></script>

	<?php if(isset($cdn_css) && !empty($cdn_css)) :  ?>
            <?php foreach ($cdn_css as $key => $cdncss) : ?>
            <link href="<?php echo base_url('assets/'.$cdncss); ?>" rel="stylesheet" type="text/css">
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($css) && !empty($css)) :  ?>
            <?php foreach ($css as $key => $cssk) : ?>
            <link href="<?php echo base_url('assets/'.$cssk); ?>" rel="stylesheet" type="text/css">
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($js['top']) && !empty($js['top'])) : ?>
            <?php foreach ($js['top'] as $key => $jsk) { ?>
                <script src="<?php echo base_url('assets/'.$jsk); ?>"></script>
            <?php } ?>
        <?php endif; ?>
</head>
<body>
