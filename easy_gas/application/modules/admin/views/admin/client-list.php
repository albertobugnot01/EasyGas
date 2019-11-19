          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ucfirst($page)?> List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo ucfirst($page)?> List</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        <h3 class="card-title"><?php echo ucfirst($page)?> List</h3>
                        <!-- /.card-tools --> 
                            <div class="card-tools">
                              <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                  <div id="add-btn" class="btn btn-primary">
                                    <i class="fas fa-user"></i> &nbsp;
                                    Add Client
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="table-responsive mailbox-messages">
                           <!-- table here -->
                           <table id='memListTable'  class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Account ID</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Telephone Number</th>
                                        <th>Contact Person</th>
                                        <th>Contact Number</th>
                                        <th>PO Validity</th>
                                        <th>Status</th>
                                        <th>Contact Person After</th>
                                        <th>Contact Number After</th>
                                        <th style="width:100px;">Signatory</th>
                                        <th style="width:120px;">Action</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                       
                        </div>
                    </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </section>
                  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- MODAL ADD -->
<form id="saveForm">
  <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Account Number</label>
                  <div class="col-md-12">
                    <input type="text" name="account_num" id="account_num" class="form-control" placeholder="Account Number" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Company Name</label>
                  <div class="col-md-12">
                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Address</label>
                  <div class="col-md-12">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" required> 
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Telephone Number</label>
                  <div class="col-md-12">
                    <input type="text" name="telephone_num" id="telephone_num" class="form-control" placeholder="Telephone Number" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Person</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_person" id="contact_person" class="form-control" placeholder="Contact Person" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Number</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Contact Number" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label ">PO Validity</label>
                  <div class="col-md-4 ">
                    <input type="text" name="po_validity" id="po_validity" class="form-control" placeholder="PO Validity" required>
                  </div>
                   <label class="col-md-1 col-form-label">Status</label>
                  <div class="col-md-5">
                    <select class="browser-default custom-select" name="status" id="status">
                      <option value="active">ACTIVE</option>
                      <option value="inactive">INACTIVE</option>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Person After Office</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_person_after" id="contact_person_after" class="form-control" placeholder="Contact Person After Office" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Number After Office</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_num_after" id="contact_num_after" class="form-control" placeholder="Contact Number After Office" required>
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  </form>
<!--END MODAL ADD-->

<form id="editForm">
  <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo ucfirst($page)?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Account Number</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="account_num_edit" id="account_num_edit" class="form-control" placeholder="Product Code" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Company Name</label>
                  <div class="col-md-12">
                    <input type="text" name="company_name_edit" id="company_name_edit" class="form-control" placeholder="Product Name" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Address</label>
                  <div class="col-md-12">
                    <input type="text" name="address_edit" id="address_edit" class="form-control" placeholder="Address" required> 
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Telephone Number</label>
                  <div class="col-md-12">
                    <input type="text" name="telephone_num_edit" id="telephone_num_edit" class="form-control" placeholder="Status" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Person</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_person_edit" id="contact_person_edit" class="form-control" placeholder="Status" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Number</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_number_edit" id="contact_number_edit" class="form-control" placeholder="Status" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label ">PO Validity</label>
                  <div class="col-md-4 ">
                    <input type="text" name="po_validity_edit" id="po_validity_edit" class="form-control" placeholder="PO Validity" required>
                  </div>
                  <label class="col-md-1 col-form-label">Status</label>
                  <div class="col-md-5">
                    <select class="browser-default custom-select" name="status_edit" id="status_edit">
                      <option value="active">ACTIVE</option>
                      <option value="inactive">INACTIVE</option>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Person After Office</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_person_after_edit" id="contact_person_after_edit" class="form-control" placeholder="Address" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-5 col-form-label">Contact Number After Office</label>
                  <div class="col-md-12">
                    <input type="text" name="contact_num_after_edit" id="contact_num_after_edit" class="form-control" placeholder="Address" required>
                  </div>
              </div>
              <div hidden id="testImage"></div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Image Signatory *Opptional</label>
                <input type="file" id="userfile"  class="col-md-5 col-form-label" name="userfile" id="userfile">
                <input type="hidden" name="imageID" id="imageID" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
  </form>

  <form id="signatureForm" enctype="multipart/form-data">
  <div class="modal fade" id="Modal_Signature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Signature Authorization</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input type="hidden" name="imageID"  id="imageID" class="form-control">
            <div class="modal-body">

          </div>
        </div>
      </div>
   </div>
  </form>

  <form>
  <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <strong>Are you sure to delete this record?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="account_num_delete" id="account_num_delete" class="form-control">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>
  </form>

          