
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/home_login.js"></script>
</head>
    <body>        
        <div class = "container">            
            <div class = "row">                
                <div class = "col-md-4 col-md-offset-1">
                    <h2 align="center" id = "me"><img src ="<?php echo base_url(); ?>/assets/images/routee.png" align = "center"></h2>
                    <div class = "intros">                        
                        <h3 align="center" style="font-weight: bold;">Need some routing assistance?</h3>
                        <p>Routee can help you scout out the routes with less obstructions to allow you to pass with ease.</p>
                        <h3 align="center" style="font-weight: bold">Encountered problems on the road?</h3>
                        <p>Routee encourages users to participate in contributing reports regarding what is happening on the road.
                            This ignites the people's willingness to help inform their fellow drivers to avoid obstructions on the road.</p>                                                  
                    </div>
                </div>
                <br/>
                <div class = "col-md-5 col-md-offset-1">

                    <!-- LOGIN -->

                    <div class = "dissidia"  id="login">
                        
                        <h2 align = "center"> Login </h2>
                        <br>
                        <?php echo form_open('pages/login', array('id' => 'loginForm')); ?>
                        <input name="userField" id = "userField" type="text" class="form-control" placeholder="Username">
                        <br/>
                        <input name="passField" id = "passField" type="password" class="form-control" placeholder="Password">
                        <br/>
                        <br>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="submitLogin" class="btn btn-success"><i class="fa fa-arrows"> </i> Submit</button>
                            </div>
                        </div>

                        </form> <!-- form post end -->

                        <hr class = "gdivider">
                        <p align = "center">Not registered yet?</p>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info" id = "btnLogin"><i class="fa fa-map-marker"> </i> Sign up!</button>
                            </div>
                        </div>
                    </div> <!--dissidia routing-->

                    <!-- REGISTER -->

                    <div class = "dissidia" style  = "display:none;" id="register">
                        
                        <h2 align = "center"> Register </h2>
                        <br>
                        <?php echo form_open('pages/register', array('id' => 'registerForm')); ?>
                        <input name="userRegisterField" id = "userRegisterField" type="text" class="form-control" placeholder="Username">
                        <br/>
                        <input name="passRegisterField" id = "passRegisterField" type="password" class="form-control" placeholder="Password">
                        <br/>
                        <input name="emailRegisterField" id = "emailRegisterField" type="text" class="form-control" placeholder="Email">
                        <br>
                        <br>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="submitRegister" class="btn btn-success"><i class="fa fa-arrows"> </i> Submit</button>
                            </div>
                        </div>

                        </form> <!-- form post end -->

                        <hr class = "gdivider">
                        <p align = "center">Already have an account?</p>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info" id = "btnRegister"><i class="fa fa-map-marker"> </i> Sign in!</button>
                            </div>
                        </div>
                    </div> <!--dissidia routing-->

                     <div id="error_box">
                        
                        <?php echo validation_errors(); ?>

                     </div>  
                    </div> <!--dissidia reporting-->

                </div><!--col-lg-5-end-->	

                <br/>
            </div> <!-- row end -->
        </div> <!-- container-end -->        
    </body>
   

</html>