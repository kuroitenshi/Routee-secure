<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="utf-8">
        <title><?php $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Towards road less obstructed">
        <meta name="author" content="Shawarma Proteges">


        <link href="<?php echo base_url(); ?>/assets/css/cover.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>/assets/css/fonts.css" type = "text/css" rel = "stylesheet">
        <link href="<?php echo base_url(); ?>/assets/css/jquery.qtip.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel= "shortcut icon" href="<? echo base_url(); ?>/assets/images/routee.png">

        <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>     
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDQFSdn0OTS5bgEVYvfGMBWmkC54uk-6PM&sensor=false&libraries=places&region=ph"></script>                
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.qtip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/imagesloaded.pkg.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/home.js"></script>
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
                    <div class = "dissidia" id="routing">
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

                        </form>


                        <hr class = "gdivider">
                        <p align = "center">If there is a situation going on, please do not hesitate to tell us.</p>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info" id = "btnReporting"><i class="fa fa-map-marker"> </i> Reporting</button>
                            </div>
                        </div>
                    </div> <!--dissidia routing-->
                    <br/>
                    <div class ="dissidia" style  = "display:none;" id = "reporting">
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

                    </div> <!--dissidia reporting-->

                </div><!--col-lg-5-end-->	

                <br/>
            </div> <!-- row end -->
        </div> <!-- container-end -->        
    </body>


</html>