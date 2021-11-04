	

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
                    <form class="needs-validation" action="<?php echo base_url(); ?>/users/addUserToDB" method="post" novalidate>
                        

                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01">First name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="validationCustom01" name="firstname" value=""  placeholder="First name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom02">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom02" name="lastname" value="" placeholder="Last name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">mobile <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="validationCustom03" placeholder="mobile" name="mobile" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid mobile.
                                    </div>
                                </div>


                 
                            </div>
                            <div class="form-row form-group">
                                <div class="col-md-5 mb-3">
                                    <label class="form-label" for="validationCustom04">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="City" name="city" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="validationCustom05">State <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="state" required="">
                                        <option value="">State</option>
                                        <option value="Michigan">Michigan</option>
                                        <option value="New York">New York</option>
                                        <option value="Oklahoma">Oklahoma</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div> 

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom06">Zip <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="validationCustom06" placeholder="Zip" name="zip" value="" required>
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
                                        <input type="text" class="form-control" id="validationCustomUsername" name="email" value="" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom07">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="validationCustom07" placeholder="password" name="password" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid password.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="example-select">Level</label>
                                    <select class="form-control" id="example-select" name="level" >
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>        
                                    </select>
                                </div>

              

                                <div class="col-12">
                                    <label class="form-label mb-2">Please disclose your gender profile <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input" id="GenderMale" name="gender" value="Male" required="">
                                        <label class="custom-control-label" for="GenderMale">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input" id="GenderFemale" name="gender" value="Female" required="">
                                        <label class="custom-control-label" for="GenderFemale">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="genderPrivate" name="gender" value="Prefer not to say" required="">
                                        <label class="custom-control-label" for="genderPrivate">Prefer not to say</label>
                                        <div class="invalid-feedback">Please select at least one</div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
               
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="newsletter" value="1" >
                                <label class="custom-control-label" for="invalidCheck">Agree to newsletter </label>                            
                            </div>

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