$(function() {
        $("#provincias").autocomplete({
         source: "search.php",    
         focus: function( event, ui ) {
                 $(this ).val( ui.item.label );
                 $("#id").val( ui.item.value );
                 return false;
               },     
          select: function( event, ui ) {
                  event.preventDefault();
                  this.value = ui.item.label;
                  $("#id").val( ui.item.value );
                  //$(this).next().val(ui.item.value);
                  $('form').submit();
                }
        });
      });
      
      
      jQuery(function($) {
          // Asynchronously Load the map API 
          var script = document.createElement('script');
          script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyAnECgqzCYcIcbxa0YzccsuvQFrEAF9bCc";
          document.body.appendChild(script);
      });

      function initialize() {
          var map;
          var bounds = new google.maps.LatLngBounds();
          var mapOptions = {
              mapTypeId: 'roadmap'
          };
           //              
          // Display a map on the page
          map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
          map.setTilt(45);
              
     
              
          // Display multiple markers on a map
          var infoWindow = new google.maps.InfoWindow(), marker, i;
          
          // Loop through our array of markers & place each one on the map  
          for( i = 0; i < markers.length; i++ ) {
              var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  title: markers[i][0]
              });
              
              // Allow each marker to have an info window    
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                     // infoWindow.setContent(infoWindowContent[i][0]);
                    //  infoWindow.open(map, marker);
                  }
              })(marker, i));

              // Automatically center the map fitting all markers on the screen
              map.fitBounds(bounds);
          }

          // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
          var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
              this.setZoom(7);
              google.maps.event.removeListener(boundsListener);
          });
          
      }