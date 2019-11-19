<?php if(isset($cdn_js) && !empty($cdn_js)) : ?>
        <?php foreach ($cdn_js as $key => $cdnjs) { ?>
            <script src="<?php echo base_url('assets/'.$cdnjs); ?>"></script>
        <?php } ?>
    <?php endif; ?>
            
    <?php if(isset($js['bottom']) && !empty($js['bottom'])) : ?>
            <?php foreach ($js['bottom'] as $key => $jsk) { ?>
                <script src="<?php echo base_url('assets/'.$jsk); ?>"></script>
            <?php } ?>
    <?php endif; ?>
<?php  if (isset($page)) if (file_exists(APPPATH . 'modules/welcome/views/js/'. $page .'_js.php')) include(APPPATH . 'modules/welcome/views/js/'. $page .'_js.php');?>	
</body>
</html>