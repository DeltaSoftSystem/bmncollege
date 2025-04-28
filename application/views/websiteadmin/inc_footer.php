
    <footer>
        <div class="copyrights">
            <div class="container">
                <div class="copyrights-link text-center">
                    <div>© <?php echo date("d-m-Y")?> BMN College of Home Science   |   All Rights Reserved. </div>
                    
                </div>

            </div>

        </div>
    </footer>



    
    <!--   Video -->
    <div class="modal fade" id="video-wrraper" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content setup-consultation-modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="video-wrraper">
                        <iframe class="video"
                            src="https://www.youtube.com/embed/w9m9USJVg5M?controls=0&rel=0?controls=0&showinfo=0&loop=0"
                            frameborder="0" allowfullscreen title="YouTube video player"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>

  <!--covid19 -->
  <?php
       $code = 'config_home';
       $resultdata = array();
       
       //$ddd = (dd='news-detail')
        
       $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
       $query = $this->db->query($sql);
       if ($query->num_rows() > 0) {
           $resultdata = $query->result_array();
       }
       $darecords = array();
       
       foreach ($resultdata as $key => $value) {
           $records[$value['key_name']] = $value['value'];
       
       }
       ?>
    <div class="modal fade" id="hellow_bar_popup" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content covid19-modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="hellow_bar-wrraper">
                        <h2><?php echo (!empty($records['config_hello_bar'])) ? $records['config_hello_bar'] : ''?></h2>
                        <?php echo (!empty($records['config_hello_bar_popup'])) ? $records['config_hello_bar_popup'] : ''?>
                    </div>

                </div>
            </div>
        </div>
    </div>
       <!-- /covid19 -->

       <script>
        $(document).ready(function(){
   setInterval('updateClock()', 1000);
});

function updateClock (){
 	var currentTime = new Date ( );
  	var currentHours = currentTime.getHours ( );
  	var currentMinutes = currentTime.getMinutes ( );
  	var currentSeconds = currentTime.getSeconds ( );

  	// Pad the minutes and seconds with leading zeros, if required
  	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  	// Choose either "AM" or "PM" as appropriate
  	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  	// Convert the hours component to 12-hour format if needed
  	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  	// Convert an hours component of "0" to "12"
  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  	// Compose the string for display
  	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
  	
  	
   	$("#clock").html(currentTimeString);	  	
 }
        </script>