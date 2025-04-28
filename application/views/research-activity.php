<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('inc_header_title'); ?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/easy-responsive-tabs.css">
<style>
    .session {
    margin: 15px 0 15px 0!important;
    padding: 15px 0 15px 0!important;
    border-top: 1px dashed #CCC!important;
}
</style>    
</head>
<body>
     
 <!--header start here-->    

 <?php $this->load->view('inc_header_menu'); ?>
   
   <!--header close here-->
    
<section class="page_name">
    <h3 class="page_name_title">Activities</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i>  Activities</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="quick_link mobile">
                    <ul class="quick_menu research">
                        <li><a href="research-committee"><i class="fa fa-paperclip" aria-hidden="true"></i>  Committee </a></li>
                        <li><a href="research-page"><i class="fa fa-paperclip" aria-hidden="true"></i> Research</a></li>
                        <li><a href="research-activity" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i> Activities</a></li>
                        <li><a href="research-collaborations"><i class="fa fa-paperclip" aria-hidden="true"></i> Collaborations  </a></li>
                        <li><a href="research-critical-thinking"><i class="fa fa-paperclip" aria-hidden="true"></i> Critical Thinking  </a></li>                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                
                <h3 class="research_title space">Activities</h3>
                <p class="abt_txt">The Research Capacity Building Centre has been striving to make research culture an inseparable part of the institutional ethos. In order to do so, the Centre organizes an array of activities that cater not only to students, but also to faculty members. Apart from the various sessions and lectures where the attendees get to listen to and interact with excellent academics and industry experts, the Centre also offers research courses for undergraduate and postgraduate students to enable them to understand the process and importance of research.</p>
                
                <div class="research_tabs">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                <li>Workshop/Seminar</li>
                <li>Courses Offered</li>
                </ul>
                <div class="resp-tabs-container">
                <!--1st tab-->
                <div>
                    <div class="objectives_bx">
                        <?php
                      //  print_r($results);
                        if($results['TeachersActivities']){
                        ?>
                        <h3 class="research_title small bca">Teachers Activities</h3>
                        
                        <?php
                        //print_r($results);  
                        foreach($results['TeachersActivities'] as $keyYear => $recordsYear){
                        ?>
                        <!--<?php echo $keyYear?>-->
                        <div class="yearwise_tab">
                            <div class="activity_year"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo $keyYear?></div>
                            <div class="row">
                                <?php
                                foreach($recordsYear['BLANK'] as $key => $records){
                                ?>
                                <div class="col-sm-6">
                                    <div class="event_tab">
                                    
                                <img src="<?php echo base_url();?><?php echo isset($records['main_image']) ? '/uploads/cms/research/'.$records['main_image'] : '/assets/images/no-image.jpg'; ?>"
            alt="<?php echo isset($records['main_image']) ? $records['main_image'] : 'activity-event'; ?>">
                                              
                                        <h4><?php echo isset($records['heading']) ? $records['heading'] : ''; ?></h4>
                                        <?php
                      if(isset($records['pdf_file']) && $records['pdf_file']!=""){
                    ?>
                                        <a href="<?php echo base_url();?>uploads/cms/research/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>" target="_blank" class="iqac_link pdf">Read More</a>
                                        <?php } ?> 
                                        
                                        <?php
                      if(isset($records['video_url']) && $records['video_url']!=""){
                    ?>
                   <a href="<?php echo isset($records['video_url']) ? $records['video_url'] : ''; ?>" target="_blank" class="iqac_link online">Online Recording</a>
                    <?php }?>

                                        
                                    </div>
                                </div>
                                <?php } ?>  
                            </div>
                        </div>
                        <?php } ?>  
                      
                        <?php } ?>  
                    </div>
                    
                    
                    <div class="objectives_bx">
                        <?php
                       // print_r($results);
                       if($results['StudentsActivities']){
                        ?>
                        <h3 class="research_title small bca">Students Activities</h3>
                          <?php
                        //print_r($results);  
                       foreach($results['StudentsActivities'] as $keyYear => $recordsYear){
                        ?>
                        <!--<?php echo $keyYear?>-->
                        <div class="yearwise_tab">
                            <div class="activity_year"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo $keyYear?></div>

                            <!--blank start-->
                            <?php
                            if(isset($recordsYear['BLANK'])){
                            ?>
                            <div class="row">
                                <?php
                                 foreach($recordsYear['BLANK'] as $keyYearInner => $recordsInner){
                                ?>
                                <div class="col-sm-6">
                                    <div class="event_tab">
                                    <img src="<?php echo base_url();?><?php echo isset($recordsInner['main_image']) ? '/uploads/cms/research/'.$recordsInner['main_image'] : '/assets/images/no-image.jpg'; ?>"
            alt="<?php echo isset($recordsInner['main_image']) ? $recordsInner['main_image'] : 'activity-event'; ?>">
                                        <h4><?php echo isset($recordsInner['heading']) ? $recordsInner['heading'] : ''; ?></h4>
                                        <?php
                      if(isset($recordsInner['pdf_file']) && $recordsInner['pdf_file']!=""){
                    ?>
                                        <a href="<?php echo base_url();?>uploads/cms/research/<?php echo isset($recordsInner['pdf_file']) ? $recordsInner['pdf_file'] : ''; ?>" target="_blank" class="iqac_link pdf">Read More</a>
                                        <?php } ?> 
                                        
                                        <?php
                      if(isset($recordsInner['video_url']) && $recordsInner['video_url']!=""){
                    ?>
                   <a href="<?php echo isset($recordsInner['video_url']) ? $recordsInner['video_url'] : ''; ?>" target="_blank" class="iqac_link online">Online Recording</a>
                    <?php }?>
                                    </div>
                                </div>
                                <?php }
                                ?>
                            </div>
                            <?php }
                            ?>
                            <!--end-->
                            <!---ug start-->
                             <?php
                            if(isset($recordsYear['UG_SESSIONS'])){
                            ?>
                            <div class="session">UG Sessions</div>
                            <div class="row">
                            <?php
                                 foreach($recordsYear['UG_SESSIONS'] as $keyYearInner => $recordsInner){
                                    ?>
                                    <div class="col-sm-6">
                                        <div class="event_tab">
                                        <img src="<?php echo base_url();?><?php echo isset($recordsInner['main_image']) ? '/uploads/cms/research/'.$recordsInner['main_image'] : '/assets/images/no-image.jpg'; ?>"
                alt="<?php echo isset($recordsInner['main_image']) ? $recordsInner['main_image'] : 'activity-event'; ?>">
                                            <h4><?php echo isset($recordsInner['heading']) ? $recordsInner['heading'] : ''; ?></h4>
                                            <?php
                          if(isset($recordsInner['pdf_file']) && $recordsInner['pdf_file']!=""){
                        ?>
                                            <a href="<?php echo base_url();?>uploads/cms/research/<?php echo isset($recordsInner['pdf_file']) ? $recordsInner['pdf_file'] : ''; ?>" target="_blank" class="iqac_link pdf">Read More</a>
                                            <?php } ?> 
                                            
                                            <?php
                          if(isset($recordsInner['video_url']) && $recordsInner['video_url']!=""){
                        ?>
                       <a href="<?php echo isset($recordsInner['video_url']) ? $recordsInner['video_url'] : ''; ?>" target="_blank" class="iqac_link online">Online Recording</a>
                        <?php }?>
                                        </div>
                                    </div>
                                    <?php }
                                ?>
                            </div>
                            <?php }
                                ?>
                            <!--end-->    
                           <!---pg start-->
                           <?php
                            if(isset($recordsYear['PG_SESSIONS'])){
                            ?>
                            <div class="session">PG Sessions</div>
                            <div class="row">
                            <?php
                                 foreach($recordsYear['PG_SESSIONS'] as $keyYearInner => $recordsInner){
                                    ?>
                                    <div class="col-sm-6">
                                        <div class="event_tab">
                                        <img src="<?php echo base_url();?><?php echo isset($recordsInner['main_image']) ? '/uploads/cms/research/'.$recordsInner['main_image'] : '/assets/images/no-image.jpg'; ?>"
                alt="<?php echo isset($recordsInner['main_image']) ? $recordsInner['main_image'] : 'activity-event'; ?>">
                                            <h4><?php echo isset($recordsInner['heading']) ? $recordsInner['heading'] : ''; ?></h4>
                                            <?php
                          if(isset($recordsInner['pdf_file']) && $recordsInner['pdf_file']!=""){
                        ?>
                                            <a href="<?php echo base_url();?>uploads/cms/research/<?php echo isset($recordsInner['pdf_file']) ? $recordsInner['pdf_file'] : ''; ?>" target="_blank" class="iqac_link pdf">Read More</a>
                                            <?php } ?> 
                                            
                                            <?php
                          if(isset($recordsInner['video_url']) && $recordsInner['video_url']!=""){
                        ?>
                       <a href="<?php echo isset($recordsInner['video_url']) ? $recordsInner['video_url'] : ''; ?>" target="_blank" class="iqac_link online">Online Recording</a>
                        <?php }?>
                                        </div>
                                    </div>
                                    <?php }
                                ?>
                            </div>
                            <?php }
                                ?>
                           <!--end-->
                        </div>
                     
                        <?php 
                         } //  foreach
                     ?>  
                      
                        
                     <?php 
                     } //  if($results['StudentsActivities'])
                     ?>   
                    </div>    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                    
                <!--2nd tab-->    
                <div>
                    <div class="skill_list marg_zero">
                   <h3 class="research_title small bca">Courses Offered</h3>        
                    <ul>   
                    <?php
                    //print_r($results_courseoffered);  
                    foreach($results_courseoffered as $key => $records){
                    ?>                     
                        <li>
                            <a href="<?php echo isset($records['pdf_file']) ? base_url().'uploads/cms/research/'.$records['pdf_file'] : ''; ?>" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo isset($records['name']) ? $records['name'] : ''; ?></a>
                        </li>
                        <?php } ?>  
                    </ul>
                </div>    
                </div>
                
                </div>
                </div>
        </div>
                
            </div>
        </div>
    </div>
</section>   
    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
<script src="<?php echo base_url()?>assets/js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
    
</body>
</html>
