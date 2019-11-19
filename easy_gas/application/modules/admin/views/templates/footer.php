<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>
</div>
</div>
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
    <script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<?php if (isset($page)) if (file_exists(APPPATH . 'modules/admin/views/js/'. $page .'_js.php')) include(APPPATH . 'modules/admin/views/js/'. $page .'_js.php');?>	
</body>
</html>