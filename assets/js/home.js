
$(document).ready(function() {

        $("#btnReporting").click(function() {
            $("#routing").fadeOut("fast", function() {
                $("#reporting").fadeIn("5000");
            });
        });
   
        $("#btnRerouting").click(function() {
            $("#reporting").fadeOut("fast", function() {
                $("#routing").fadeIn("5000");
            });
        });

        

        if($('#error_box').text().trim() == ""){
            $('#error_box').hide();
        }else
            $('#error_box').show();

    
    
});

function initialize() {
    var sourceInput = document.getElementById('sourceSearchText');
    var destinationInput = document.getElementById('destinationSearchText');
    var eventInput = document.getElementById('eventSearchText');
    var options = {
        componentRestrictions: {country: "ph"}
    };
    var autocomplete = new google.maps.places.Autocomplete(sourceInput, options);
    var autocomplete2 = new google.maps.places.Autocomplete(destinationSearchText, options);
    var autocomplete3 = new google.maps.places.Autocomplete(eventSearchText, options);

    autocomplete.bindTo('bounds', map);
    autocomplete2.bindTo('bounds', map);
    autocomplete3.bindTo('bounds', map);

    autocomplete.setComponentRestrictions({country: 'ph'});
    autocomplete2.setComponentRestrictions({country: 'ph'});
    autocomplete3.setComponentRestrictions({country: 'ph'});


    var infowindow = new google.maps.InfoWindow();

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
    });

    google.maps.event.addListener(autocomplete2, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete2.getPlace();
    });

    google.maps.event.addListener(autocomplete3, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete3.getPlace();
    });

    setupClickListener('changetype-all', []);
}

google.maps.event.addDomListener(window, 'load', initialize);
        
function ReportingErrorHandlers() {
    document.getElementById("reportForm").onsubmit = function() {

        if (document.getElementById("eventSearchText").value === "" || document.getElementById("description").value === "") {

            if (document.getElementById("eventSearchText").value === "")
            {
                $('#eventSearchText').qtip({
                    prerender: true,
                    content: {
                        text: "We need to know the place"
                    },
                    position: {
                        my: 'bottom right',
                        at: 'top left',
                        target: $('#eventSearchText'),
                        viewport: $(window)
                    },
                    show: {
                        ready: true
                    },
                    hide: {
                        event: false,
                        inactive: 4000
                    }

                });
            }
            if (document.getElementById("description").value === "")
            {
                $('#description').qtip({
                    prerender: true,
                    content: {
                        text: "Please do provide details"
                    },
                    position: {
                        my: 'bottom right',
                        at: 'top left',
                        target: $('#description'),
                        viewport: $(window)
                    },
                    show: {
                        ready: true
                    },
                    hide: {
                        event: false,
                        inactive: 4000
                    }

                });
            }


            return false;
        }
    };
}

function RoutingErrorHandlers() {
    document.getElementById("routingForm").onsubmit = function() {
        if (document.getElementById("sourceSearchText").value === "" || document.getElementById("destinationSearchText").value === "") {
            if (document.getElementById("sourceSearchText").value === "")
            {
                $('#sourceSearchText').qtip({
                    prerender: true,
                    content: {
                        text: "We need to know where you came from"
                    },
                    position: {
                        my: 'bottom right',
                        at: 'top left',
                        target: $('#sourceSearchText'),
                        viewport: $(window)
                    },
                    show: {
                        ready: true
                    },
                    hide: {
                        event: false,
                        inactive: 4000
                    }

                });
            }

            if (document.getElementById("destinationSearchText").value === "")
            {
                $('#destinationSearchText').qtip({
                    prerender: true,
                    content: {
                        text: "We need to know where you want to go"
                    },
                    position: {
                        my: 'bottom right',
                        at: 'top left',
                        target: $('#destinationSearchText'),
                        viewport: $(window)
                    },
                    show: {
                        ready: true
                    },
                    hide: {
                        event: false,
                        inactive: 4000
                    }

                });
            }
            return false;
        }
    };

}
window.onload = function() {
    ReportingErrorHandlers();
    RoutingErrorHandlers();
};

