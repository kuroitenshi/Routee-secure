<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/home.js"></script>
</head>
    <body>        
        <input name="login_status" id="login_status" type="text" value="<?php echo $login_status;?>" hidden>

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

                    <!-- ROUTING -->

                    <div class = "dissidia"  id="routing">
                        
                        <p id="welcome" align = "left"> Welcome, <?php echo $username; ?>!      <a href="<?php echo base_url(); ?>index.php/pages/logout" align="right">Sign out</a></p>
                        <h2 align = "center"> Routing </h2>
                        <p align = "center"> Routee will assist you in finding the best routes possible.</p>
                        <br>
                        <?php echo form_open('pages/submit_route', array('id' => 'routingForm')); ?>
                        <input name="sourceField" id = "sourceSearchText" type="text" class="form-control" placeholder="Where did you come from?">
                        <br/>
                        <input name="destinationField" id = "destinationSearchText" type="text" class="form-control" placeholder="Where do you want to go?">
                        <br/>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="submitRouting" class="btn btn-success"><i class="fa fa-arrows"> </i> Get Directions</button>
                            </div>
                        </div>

                        </form> <!-- form post end -->

                        <hr class = "gdivider">
                        <p align = "center">If there is a situation going on, please do not hesitate to tell us.</p>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info" id = "btnReporting"><i class="fa fa-map-marker"> </i> Reporting</button>
                            </div>
                        </div>
                    </div> <!--dissidia routing-->
                    <br/>

                    <!-- REPORTING -->

                    <div class ="dissidia" style  = "display:none;" id = "reporting">
                        <p id="welcome" align = "center"> Welcome, <?php echo $username; ?>!</p>
                        <h2 align = "center"> Reporting </h2>
                        <p align = "center">Let us know what is going on.</p><br>
                        <!--Reporting form-->
                        <?php echo form_open('pages/submit_report', array('id' => 'reportForm')); ?>
                        <select name="pType" class="form-control">
                            <option value="Accident">Accident</option>
                            <option value="Flood">Flood</option>
                            <option value="Construction">Construction</option>
                            <option value="Heavy Traffic">Heavy Traffic</option>
                            <option value="Others">Others</option>
                        </select>
                        <br/>
                        <input name="placeName" type="text" id = "eventSearchText" class="form-control" placeholder="Where is it happening?" >
                        <br/>
                        <textarea id="description" name="pDesc" style = "width:100%;" placeholder="What's going on?" class="form-control"></textarea>
                        <br/>                            
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group" >                                                       
                                <button type="submit" name="submitReport" class="btn btn-success"> <i class="fa fa-map-marker"></i> Report</button>
                            </div>
                        </div> <!-- justified buttons end -->
                        <hr class = "gdivider">					
                        <p align = "center"> If you want to find the fastest way to your destination, just ask us.</p>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group" >                                                       
                                <button type="button" class="btn btn-info" id="btnRerouting"> <i class="fa fa-arrows"></i> Routing</button>
                            </div>
                        </div> <!-- justified buttons end -->
                        </form> <!-- form post end -->
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