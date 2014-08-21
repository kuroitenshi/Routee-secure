

<body>

    <div class = "navbar navbar-default navbar-fixed-top visi">
        <a href = "index.php" class = "navbar-brand"><img src = "<?php echo base_url(); ?>assets/images/routee.png" class ="headpic"></a>
        <form class="navbar-form navbar-left appear" role="search" id="navRoute">
            <div class="form-group">
                <input id="sourceTextBox" name="sourceField" type="text" class="form-control" placeholder = "Where did you come from?" >
                <input id="destinationTextBox" name="destinationField" type="text" class="form-control" placeholder = "Where do you want to go?">
                <input id="findItButton" type="button" onclick="validate_route_fields();" class="btn btn-default" value="Show me the way!">
            </div>                 
        </form>
        <a class = "navbar-brand navbar-right appear" id="helpbutton" href = "#getIns" data-toggle="modal"><img src = "<?php echo base_url(); ?>assets/images/quest.png" class = "headpic"></a>
        <a class = "navbar-brand navbar-right appear"  id="logoutbutton" href = "<?php echo base_url(); ?>index.php/pages/logout" data-toggle="modal"><img src = "<?php echo base_url(); ?>assets/images/logout-icon.png" class = "headpic"></a>
    </div>


    <div class = "modal fade" id = "getIns" role = "dialog">
        <div class = "modal-dialog">
            <div class = "modal-content">

                <div class = "modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class = "modal-title" align = "center"> Hello there!</h4>
                </div>

                <div class = "modal-body">
                    <p align = "center">Salutations, driver! Thank you for using Routee! I will show you some instructions on how to use this map module of Routee. First and foremost, if you want to know the routes available, just enter where you came from and where you are from in the forms respectively and to see these again, click the right-most help icon.<br><br>
                    </p>

                    <img src = "<?php echo base_url(); ?>assets/images/instruction.jpg" class="img-responsive">
                    <br><br> 

                    <p align = "center"> Another neat feature is the '<em>Reporting</em>' aspect of Routee! How do we do this? Just left-click on the location in the map and select the situation. Simple!<br><br>
                    </p>

                    <img src = "<?php echo base_url(); ?>assets/images/instruction2.jpg" class="img-responsive">

                    <br><br>

                    <p align = "center"> If you're using a tablet or phone, click on the '<em>Information</em>' tab and a slider should appear containing the <em> Instructions </em> and the two forms to do another routing query. Tapping on a location will allow you to report. </p>

                    <img src = "<?php echo base_url(); ?>assets/images/instruction3.jpg" class="img-responsive">
                    <br><br>

                    <p align = "center"> Here are the legends when reporting for a situation: </p>
                    <br>

                    <div class="media">

                        <a class="pull-left">
                            <img class="media-object" src="<?php echo base_url(); ?>assets/images/custom_markers/marker_accident.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Accident</h4>
                            <p>If a road accident had occured, this marker will represent that on the map. This type of event takes a while to resolve.</p>
                        </div>

                        <a class="pull-left">
                            <img class="media-object" src="<?php echo base_url(); ?>assets/images/custom_markers/marker_construction.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Construction</h4>
                            <p>When there is a construction project on-going, it will be represented by this marker. This event takes a very long time to resolve and should be avoided as much as possible.</p>
                        </div>

                        <a class="pull-left">
                            <img class="media-object" src="<?php echo base_url(); ?>assets/images/custom_markers/marker_flood.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Flood</h4>
                            <p>On days when there is heavy rain present, floods are likely to occur. Areas that are affected will be presented with this. Some areas are passable depending on the terrain.</p>
                        </div>

                        <a class="pull-left">
                            <img class="media-object" src="<?php echo base_url(); ?>assets/images/custom_markers/marker_traffic.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Traffic</h4>
                            <p>This is a common problem in the Philippines and is considered more of a nuisance. Areas with heavy traffic are represented by this marker.</p>
                        </div>

                        <a class="pull-left">
                            <img class="media-object" src="<?php echo base_url(); ?>assets/images/custom_markers/marker_others.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Others</h4>
                            <p>If a situation arises and it is not listed within the choices, you can present it using this marker.</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class = "col-lg-3 appear">
        <div class = "well">
            <div id="directions-panel-main" class="directions-panel">

                <div id="color-table" class="container-fluid">

                </div>
                <div id="instruction-table" class="container-fluid">

                </div>

            </div>
        </div>
    </div>

    <div class = "hideslide">
        <div id="slideout">
            <img src="<?php echo base_url(); ?>assets/images/info.png" alt="Information" />
        </div>
        <div id="slideout_inner">
            <div class = "infoslide">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button name="submitPath" class="btn btn-info" data-toggle="modal" data-target="#getIns"><i class="fa fa-arrows"> </i>Instructions</button>
                    </div>
                </div>
                <hr class = "gdivider">
                
                <form role="search">

                    <div class="form-group">
                        <input id="sourceTextBox_pop" name="sourceField" type="text" class="form-control" placeholder="Where did you come from?">
                        <br/>
                        <input id="destinationTextBox_pop" name="destinationField" type="text" class="form-control" placeholder="Where do you want to go?">
                        <br/>
                        <input id="findItButton_pop" type="button" onclick="validate_route_fields();" class="btn btn-success btn-group-justified" value="Show me the way!">                            
                    </div>

                </form>
                <hr class = "gdivider">

                <div id="directions-panel-small" class="directions-panel">

                    <div id="color-table" class="container-fluid">

                    </div>
                    <div id="instruction-table" class="container-fluid">

                    </div>

                </div>
            </div>
        </div> 
    </div>   

    <div class = "col-lg-9 linkappear vis1">             
        <div id="map-canvas"></div>
    </div>

</body>



</html>