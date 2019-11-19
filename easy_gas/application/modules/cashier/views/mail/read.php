<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
            <div class="card direct-chat direct-chat-primary" style="height: 750px;">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: auto;">
          <form id="send_message">
             <?php if (isset($data)):?>
              <?php foreach($data as $datas):?>
                <input type="hidden" name="message_id" value="<?php echo $datas->message_id?>">
                  <!-- Message. Default to the left -->
                  <?php if($datas->name == $this->session->userdata('name')):?>
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?php echo $datas->name?></span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $datas->message_text?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <?php else:?>
                  <!-- /.direct-chat-msg -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?php echo $datas->name?></span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $datas->message_text?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                <?php endif;?>
                  <!-- /.direct-chat-msg -->
               <?php endforeach; ?>
            <?php endif;?>
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <div class="input-group">
                    <input type="text" name="message_text" id="message_text" autocomplete="off" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <a type="button" class="btn btn-primary">Send</a>
                    </span>
                  </div>
              </div>
              </form>
              <!-- /.card-footer-->
            </div>
    <!-- /.content -->
  </div>