	

    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item">Customers</li>
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

        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Users<span class="fw-300"><i>registration</i></span>
                </h2>    
            </div>
            <div class="panel-container show">
                <div class="panel-content">
      
                </div>
                <div class="panel-content p-0">
                    <form class="needs-validation" action="<?php echo base_url(); ?>/customers/editCustomerToDB/<?php echo $result['idCustomers'] ?>" method="post" novalidate>

                        <input type="hidden" name="idCustomers" value="<?php echo $result['idCustomers'] ?>">

                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">First name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="validationCustom01" name="firstname" value="<?php echo $result['firstname'] ?>"  placeholder="First name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom02">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom02" name="lastname" value="<?php echo $result['lastname'] ?>" placeholder="Last name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">mobile <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="validationCustom03" placeholder="mobile" name="mobile" value="<?php echo $result['mobile'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid mobile.
                                    </div>
                                </div>


                 
                            </div>
                            <div class="form-row form-group">
                                <div class="col-md-5 mb-3">
                                    <label class="form-label" for="validationCustom04">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="City" name="city" value="<?php echo $result['city'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="validationCustom05">State <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="state" required="">
                                        <option value="" <?php echo ($result['state']  == '')?'selected':''; ?>>State</option>
                                        <option value="Michigan" <?php echo ($result['state']  == 'Michigan')?'selected':''; ?>>Michigan</option>
                                        <option value="New York" <?php echo ($result['state']  == 'New York')?'selected':''; ?>>New York</option>
                                        <option value="Oklahoma" <?php echo ($result['state']  == 'Oklahoma')?'selected':''; ?>>Oklahoma</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div> 

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom06">Zip <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom06" placeholder="Zip" name="zip" value="<?php echo $result['zip'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Username <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="email" value="<?php echo $result['email'] ?>" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>

                                      
              

                                <div class="col-12">
                                    <label class="form-label mb-2">Please disclose your gender profile <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input" id="GenderMale" name="gender" value="Male" <?php if($result['gender'] == 'Male'){ echo 'checked';}else{ echo '';} ?> required="">
                                        <label class="custom-control-label" for="GenderMale">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input" id="GenderFemale" name="gender" value="Female" <?php if($result['gender'] == 'Female'){ echo 'checked';}else{ echo '';} ?> required="">
                                        <label class="custom-control-label" for="GenderFemale">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="genderPrivate" name="gender" value="Prefer not to say" <?php if($result['gender'] == 'Prefer not to say'){ echo 'checked';}else{ echo '';} ?> required="">
                                        <label class="custom-control-label" for="genderPrivate">Prefer not to say</label>
                                        <div class="invalid-feedback">Please select at least one</div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">             
              
                            <button class="btn btn-primary ml-auto" type="submit">Submit form</button>
                        </div>

                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function()
                        {
                            'use strict';
                            window.addEventListener('load', function()
                            {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form)
                                {
                                    form.addEventListener('submit', function(event)
                                    {
                                        if (form.checkValidity() === false)
                                        {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();

                    </script>
                </div>
            </div>
        </div>


    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->