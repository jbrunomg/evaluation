                    <!-- BEGIN Page Content -->

                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">List</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>

                        <?php if (\Config\Services::validation()->getErrors()){?>
                        <div class="alert alert-danger" role="alert">
                        <?= \Config\Services::validation()->listErrors();?>
                        </div>
                        <?php } ?> 

                        <?php
                        if (session()->get('messageRegisterOk')){ ?>
                            <div class="alert alert-info" role="alert">                               
                                    <?php echo "<strong>". session()->getFlashdata('messageRegisterOk')."</strong>"; ?>
                            </div>
                        <?php } ?> 

                        <?php
                        if (session()->get('loginFail')){ ?>
                            <div class="alert alert-danger" role="alert">
                                    <?php echo "<strong>". session()->getFlashdata('loginFail')."</strong>"; ?>
                            </div>
                        <?php } ?> 

   
                        <div class="row">
                            <div class="col-xl-12">
                                  

                                <div id="panel-1" class="panel">
                                                                        

                                    <div class="panel-hdr">                                     
                                        <h2>
                                            <a class="btn btn-primary" href="<?php echo base_url(); ?>/users/addUser" role="button"><i class="fal fa-plus mr-1"></i> Add Users</a>
                                       
                                            <span class="fw-300"><i> </i></span>
                                        </h2> 
                             
                                    </div>
																	
									
									
                                    <div class="panel-container show">

                                        <div class="panel-content">
                             											
                                            <!-- datatable start -->
                                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Firstname</th>
                                                        <th>Lastname</th>
                                                        <th>Mobile</th>
                                                        <th>City</th>
                                                        <th>Level</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php foreach ($result as $vl) {   ?>                                               

                                                    <tr>
                                                        <td><?php echo $vl['firstname']; ?></td>
                                                        <td><?php echo $vl['lastname']; ?></td>
                                                        <td><?php echo $vl['mobile']; ?></td>
                                                        <td><?php echo $vl['city']; ?></td>
                                                        <td><?php echo $vl['level'] ; ?></td>
                                                        <td>
                                                                                                          
                                                        <a href="<?php echo base_url(); ?>/users/editUser/<?php echo $vl['idUsers']; ?>" class="btn btn-success btn-icon rounded-circle">
                                                            <i class="fal fa-pencil fs-md"></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>/users/viewUser/<?php echo $vl['idUsers']; ?>" class="btn btn-default btn-icon rounded-circle">
                                                            <i class="fal fa-search"></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>/users/deleteUser/<?php echo $vl['idUsers']; ?>" class="btn btn-danger btn-icon rounded-circle">
                                                            <i class="fal fa-times"></i>
                                                        </a>

                                                        </td>
                                                    </tr>

                                                    <?php }?>

                                                   
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Firstname</th>
                                                        <th>Lastname</th>
                                                        <th>Mobile</th>
                                                        <th>City</th>
                                                        <th>Level</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- datatable end -->
											
											
											
											
											
											
											
											
											
											
                                        </div>
                                    </div>
									
									
									
									
									
									
									
									
									
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->