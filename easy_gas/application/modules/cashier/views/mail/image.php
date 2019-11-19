<?php if(isset($data) ) :?>
<?php foreach ($data as $datas) :?>
<?php echo "<center>"; ?>
    <img src="<?php echo site_url()."uploads/".$datas->file_name; ?>"  class="img-thumbnail" alt="...">
    <?php echo "</center>"; ?>
 <?php endforeach; ?>
 <?php endif; ?>
