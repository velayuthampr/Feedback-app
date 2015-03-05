<!DOCTYPE html>
<html>

    <head>
        <title>My Race India</title>
        <?php $this->load->helper('url') ?>
        
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/Style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/web%20fonts/font-style.css"> 
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/jquery.ajaxcomplete.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/bootstrap/css/jquery-ui.css">    
      
        
      	<script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery.validate.js"></script>
       
        <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery-ui.js"></script>
         <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery-1.10.2.js"></script>
  

<script type="text/javascript"  language="javascript">
function drawTable(data) {
 $('#results').append('<tr><th class="text-center" id="head-label">RANK</th><th class="text-center" id="head-label">GENDER RANK</th><th class="text-center" id="head-label">BIB#</th><th class="text-center" id="head-label">NAME</th><th class="text-center" id="head-label">GENDER</th><th class="text-center" id="head-label">NET TIME</th></tr>');
                        var len =  data.length;
						var incrvar =0;
                       
						for(var i=0;i<len;i++ ){
                             tr = $('<tr/>');
                            if(i%2 == 0) {
                                var rowclass = 'active';
                            }else {
                                var rowclass = 'passive';
                            }
							
                            tr.append("<td class='"+rowclass+"'>" + data[i].Contest_Rank	 + "</td>");
							tr.append("<td class='"+rowclass+"'>" + data[i].Gender_Rank + "</td>");
							tr.append("<td class='"+rowclass+"' onclick=getbibfunctn('"+data[i].Bib+"') style='cursor:pointer; color:#00f'>" + data[i].Bib + "</td>");
                            tr.append("<td class='"+rowclass+"'>" + data[i].Name + "</td>");
							tr.append("<td class='"+rowclass+"'>" + data[i].Sex + "</td>");
							tr.append("<td class='"+rowclass+"'>" + data[i].Net_Time + "</td>");
							
							//tr.append("<td class='"+rowclass+"'><a href='" + data[i].Certificate_link + "' target='_blank'><div class='pull-left download-button'><img src='<?php echo base_url() ?>skin/images/social-icons/download_button.png' height='25'>Download Certificate</div></a></td>");
							$('#download-certificate').attr('href', data[i].Certificate_link);
                            $('#results').append(tr);
							
							
						} 
}

function drawTableResult(data){
	
                        var incrvar =0;
						len =  data.length;
						
					   $('#split-results').append('<tr><th class="text-center" id="head-label" colspan="4" style="background-color:#666666">SPLIT TIME</th></tr><tr><th class="text-center" id="head-label">MYRACE POINT</th><th class="text-center" id="head-label">TIME</th><th class="text-center" id="head-label">AVERAGE PACE</th><th class="text-center" id="head-label">AVERAGE SPEED</th></tr>');
					    for(i=0;i<len;i++ ){
							
                       
                            tr = $('<tr/>');
                            if(i%2 == 0) {
                                var rowclass = 'active';
                            }else {
                                var rowclass = 'passive';
                            }
							if(data[i].Split_Time_12km != "0")
							{
						        incrvar =1;
								$('#split-results').append("<tr><td class="+rowclass+"> 12km </td><td class='"+rowclass+"'>" + data[i].Split_Time_12km + "</td><td class='"+rowclass+"'>" + data[i].Avg_Pace_12km + "</td><td class='"+rowclass+"' colspan='2'>" + data[i].Avg_Speed_12km + "</td></tr>");
							}
							if(data[i].Split_Time_10km != "0")
							{
						       incrvar =1;
								$('#split-results').append("<tr><td class="+rowclass+"> 10km </td><td class='"+rowclass+"'>" + data[i].Split_Time_10km + "</td><td class='"+rowclass+"'>" + data[i].Avg_Pace_10km + "</td><td class='"+rowclass+"' colspan='2'>" + data[i].Avg_Speed_10km + "</td></tr>");
							}
							if(data[i].Split_Time_21km != "0")
							{
						        incrvar =1;
								$('#split-results').append("<tr><td class="+rowclass+"> 21km </td><td class='"+rowclass+"'>" + data[i].Split_Time_21km + "</td><td class='"+rowclass+"'>" + data[i].Avg_Pace_21km + "</td><td class='"+rowclass+"' colspan='2'>" + data[i].Avg_Speed_21km + "</td></tr>");
							}
							if(data[i].Split_Time_5km != "0")
							{
						        incrvar =1; 
								$('#split-results').append("<tr><td class="+rowclass+"> 5km </td><td class='"+rowclass+"'>" + data[i].Split_Time_5km + "</td><td class='"+rowclass+"'>" + data[i].Avg_Pace_5km + "</td><td class='"+rowclass+"' colspan='2'>" + data[i].Avg_Speed_5km + "</td></tr>");
							}
								//alert("te_st123.99".parseFloat(replace (/[^\d.]/g, '' )));
							
							
							$('#split-results').append(tr);
						}
						
						if(incrvar ==0)
						{
							//$('#split-results').append("<tr><td class='passive text-center' colspan='4'>No Split Time</td></tr>");
							$('#split-results').empty();
							}
					
						
							
	}


function leftsidtable(data){
	
                        var len =  data.length;
						row = $('<tr/>');
                        for(var i=0;i<len;i++ ){
							
                            row.append('<tr><td><input type="button" class="text-center" style="width:250px" id="table-btn"  onclick="return getcontestfun(this.value)" value="'+data[i].Contest_Name+'" </input></td></tr>');
							addgenderName(data[i].Contest_Name);
							
						
						} 
						 $('#leftside-table').append(row);
	}
	
	function addgenderName(gendername){
		alert(gendername);
		}
</script>


        
        <script type="text/javascript" language="JavaScript">
	
             $(document).ready(function () {

				 $('#get_result').click(function(e) {
                     var Bib = $("#bib-no").val();
					var Year = $("#year").val();
					//var Event_Name = $("#event-name").val();
                    var Event_Name = $("#event-name").val();


					
					$('#download-certificate').css({'display': 'none'}); 
					
					if(Year != '' && Event_Name != '' && Bib == '') {
						
						var geturl = '<?php echo site_url() ?>/ControlApi/Recordtwo/Year/'+Year+'/Event_Name/'+Event_Name;
						var geturltr = '<?php echo site_url() ?>/ControlApi/RecordContest2/Year/'+Year+'/Event_Name/'+Event_Name;
						$('#results').empty();
						$('#leftside-table').empty();
						$('#split-results').empty();
						
					}else if(Year != '' && Event_Name != '' && Bib != '') {
						var geturl = '<?php echo site_url() ?>/ControlApi/Recordrbibname/Bib/'+Bib+'/Year/'+Year+'/Event_Name/'+Event_Name;
						//var geturl = '<?php echo site_url() ?>/ControlApi/Recordrslt/Bib/'+Bib+'/Year/'+Year+'/Event_Name/'+Event_Name;
						//var geturltr = '<?php echo site_url() ?>/ControlApi/RecordContest3/Bib/'+Bib+'/Year/'+Year+'/Event_Name/'+Event_Name;
						var geturltr = '<?php echo site_url() ?>/ControlApi/RecordContest2/Year/'+Year+'/Event_Name/'+Event_Name;
						
						$('#results').empty();
						$('#leftside-table').empty();
						$('#split-results').empty();
					}else if(Year != '' && Event_Name == '' && Bib != '') {
						//alert("please select event name");
						$('#event-name').css({
							'box-shadow':'inset 0 0 2px 2px #f00',
							  '-webkit-box-shadow':'inset 0 0 2px 2px #f00',
							  'moz-box-shadow':'inset 0 0 2px 2px #f00'	
						});
						return false;
					}
					else if(Year != '' && Event_Name == '' && Bib == '') {
						/*$('#bib-no').css({
							'box-shadow':'inset 0 0 2px 2px #f00',
							  '-webkit-box-shadow':'inset 0 0 2px 2px #f00',
							  'moz-box-shadow':'inset 0 0 2px 2px #f00'
							});*/
						$('#event-name').css({
							'box-shadow':'inset 0 0 2px 2px #f00',
							  '-webkit-box-shadow':'inset 0 0 2px 2px #f00',
							  'moz-box-shadow':'inset 0 0 2px 2px #f00'							
							});
						return false;
					}
					
					if(Event_Name != '') {
						$('#result-event').val(Event_Name);
					$('#event-name').css({
							'box-shadow':'inset 0 0 4px #0f0',
							  '-webkit-box-shadow':'inset 0 0 4px #0f0',
							  'moz-box-shadow':'inset 0 0 4px #0f0'							
							});
					}
					
					
					  $.when(
							$.ajax({
								type: 'GET', 
								url: geturl, 
								dataType: 'json',
								success: function(data) {
									$('#result-content').css({'display': 'block'});
									$('#result-text').css({'display': 'none'});
									drawTable(data);
									if(Year != '' && Event_Name != '' && Bib != ''){
										drawTableResult(data);
										$('#download-certificate').css({'display': 'block'});
									}
									
								},
								error: function() {
									
									$('#results').empty();
									$('#split-results').empty();
									$('#result-content').css({'display': 'block'});
									$('#results').append('<tr><th class="text-center" id="head-label">RANK</th><th class="text-center" id="head-label">GENDER RANK</th><th class="text-center" id="head-label">BIB#</th><th class="text-center" id="head-label">NAME</th><th class="text-center" id="head-label">GENDER</th><th class="text-center" id="head-label">NET TIME</th></tr><tr class="active"><td class="text-center" colspan="6">No records found</td></tr>');
								} 
               	}),
							
					
								$.ajax({
									type: 'GET', 
									url: geturltr,
									dataType: 'json',
									success: function(data) {
										$('#result-content').css({'display': 'block'});
										$('#result-text').css({'display': 'none'});
										
										if(Year != '' && Event_Name != '' && Bib == ''){
											$('#leftside-table').append('<tr><th class="text-center"  id="table-label">LEADERBOARD</th></tr>');
											leftsidtable(data);
											}
										else if(Year != '' && Event_Name != '' && Bib != ''){
										  
											row = $('<tr/>');
											$('#leftside-table').append("<tr><th class=text-center  id=table-label>RACER NAME</th></tr>");
											$('#leftside-table').append("<tr><th class=text-center id=table-btn style=width:350px>MY RESULTS</th></tr>");	
											$('#leftside-table').append('<tr><th class="text-center"  id="table-label">LEADERBOARD</th></tr>');
											leftsidtable(data);
											$('#leftside-table').append(row);
											
											} 
										
									},
								error: function() {
									
									$('#results').empty();
									$('#split-results').empty();
									$('#result-content').css({'display': 'block'});
									
								} 
								})
							
							
						).then( function(){
							//alert('all complete');
						});
					
                });
				
			}); 
			
			
        </script>
        
        
        <script type="text/javascript" language="javascript">
        
				
		function getcontestfun(btnvalue)
		 {
			//alert(btnvalue);
			
					var Year = $("#year").val();
					var Event_Name = $("#event-name").val();
					
					$('#download-certificate').css({'display': 'none'});
					
					if(Event_Name == '') {
						$('#event-name').css({
							'box-shadow':'inset 0 0 2px 2px #f00',
							  '-webkit-box-shadow':'inset 0 0 2px 2px #f00',
							  'moz-box-shadow':'inset 0 0 2px 2px #f00'							
							});
						return false;
					}
					
					if(Event_Name != '') {
					$('#event-name').css({
							'box-shadow':'inset 0 0 4px #0f0',
							  '-webkit-box-shadow':'inset 0 0 4px #0f0',
							  'moz-box-shadow':'inset 0 0 4px #0f0'							
							});
							
							var geturl = '<?php echo site_url() ?>/ControlApi/Recordfiltr/Contest_Name/'+btnvalue+'/Year/'+Year+'/Event_Name/'+Event_Name;
							$('#results').empty();
							$('#split-results').empty();
                    	}
				//alert(geturl);
				//return false;
				$.ajax({
						type: 'GET', 
						url: geturl, 
						dataType: 'json',
						success: function(data) {
							$('#result-content').css({'display': 'block'});
							drawTable(data);
							
							
						},
						error: function() {
							
							$('#results').empty();
							$('#split-results').empty();
							$('#result-content').css({'display': 'block'});
							$('#results').append('<tr><th class="text-center" id="head-label">RANK</th><th class="text-center" id="head-label">GENDER RANK</th><th class="text-center" id="head-label">BIB#</th><th class="text-center" id="head-label">NAME</th><th class="text-center" id="head-label">GENDER</th><th class="text-center" id="head-label">NET TIME</th></tr><tr class="active"><td class="text-center" colspan="6">No records found</td></tr>');
				        } 
                  })
							
		}
		
		
		function getbibfunctn(bibnumvalue){
			//alert(bibnumvalue);
			var geturl = '<?php echo site_url() ?>/ControlApi/Record/Bib/'+bibnumvalue;
			var Year = $("#year").val();
			var Event_Name = $("#event-name").val();
			
			var geturltr = '<?php echo site_url() ?>/ControlApi/RecordContest2/Year/'+Year+'/Event_Name/'+Event_Name;
						
			$('#leftside-table').empty();
			
			$('#split-results').empty();
			$('#results').empty();
			
			$.when(
				$.ajax({
					type: 'GET', 
					url: geturltr,
					dataType: 'json',
					success: function(data) {
						$('#result-content').css({'display': 'block'});
					   $('#result-text').css({'display': 'none'});
					
						row = $('<tr/>');
						$('#leftside-table').append("<tr><th class=text-center  id=table-label>RACER NAME</th></tr>");
						$('#leftside-table').append("<tr><th class=text-center id=table-btn style=width:350px>MY RESULTS</th></tr>");	
						$('#leftside-table').append('<tr><th class="text-center"  id="table-label">LEADERBOARD</th></tr>');
						leftsidtable(data);
						$('#leftside-table').append(row);
					},
					error: function() {
									
									$('#results').empty();
									$('#split-results').empty();
									$('#result-content').css({'display': 'block'});
									
								} 
				}),
				$.ajax({
					type: 'GET', 
					url: geturl, 
					dataType: 'json',
					success: function(data) {
						$('#result-content').css({'display': 'block'});
						
						drawTable(data);
						
						drawTableResult(data);
						$('#download-certificate').css({'display': 'block'});
						
						
					},
					error: function() {
						
						$('#results').empty();
						$('#split-results').empty();
						$('#result-content').css({'display': 'block'});
						$('#results').append('<tr><th class="text-center" id="head-label">RANK</th><th class="text-center" id="head-label">GENDER RANK</th><th class="text-center" id="head-label">BIB#</th><th class="text-center" id="head-label">NAME</th><th class="text-center" id="head-label">GENDER</th><th class="text-center" id="head-label">NET TIME</th></tr><tr class="active"><td class="text-center" colspan="6">No records found</td></tr>');
					} 
               	})
				).then( function(){
						//alert('all complete');
				});
			
			}
		
     </script>
        
        
   </head>


    <body class="results">


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo site_url() ?>">
                    <img class="image-responsive" src="<?php echo base_url() ?>skin/images/logo_my_race.png" alt="My Race India" height="50">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right" id="navbar-links">
                    <li><a data-scroll href="<?php echo site_url() ?>">Home</a>
                    </li>
                    <li><a data-scroll href="<?php echo site_url() ?>/#scroll-about">About Us</a>
                    </li>
                    <li><a data-scroll href="<?php echo site_url() ?>/#scroll-services">Services</a>
                    </li>
                    <li><a data-scroll href="<?php echo site_url() ?>/#scroll-gallery">MyRace Gallery</a>
                    </li>
                    <li><a data-scroll href="<?php echo site_url() ?>/#scroll-footer">Testimonials</a>
                    </li>
                    <li class="active"><a href="<?php echo site_url() ?>/home/results">Race Results</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Form strip -->
    <div class="container-fluid content-wrapper form-result" id="value-div">
        <div class="row">
            <div class="container">
                <form role="form" id="form_id">
                    <select class="col-xs-2 form-control" id="year">
                        <?php for($i=date('Y'); $i>2012; $i--){ ?>
                        <option><?php echo $i ?></option>
                        <?php }  ?>
                    </select>
                  <select class="col-xs-4 form-control" id="event-name">
                        <option selected value="">Select Event Name</option>
                        <option value="Tanjore Marathon 2015">Tanjore Marathon 2015</option>
                        <option value="Cool Runners Republic Day Half Marathon 2015">Cool Runners Republic Day Half Marathon 2015</option>
                    </select>
                    <!--<input type="text" class="col-xs-4 form-control" placeholder="Enter your event name" aria-describedby="basic-addon1" id="event-name"> -->
                    <input type="text" class="col-xs-3 form-control" placeholder="Enter your BIB no." aria-describedby="basic-addon1" id="bib-no">
                    <button class="btn pull-right" type="button" id="get_result">Get My Race Results</button>
                    <!--onclick="return getresults()"-->

                </form>
            </div>
        </div>
    </div>

    <!-- Results Content -->
    <br>
    <p id="result-text" class="text-center" style="display:block; font-size:16px;"> Please Enter Event Name to Search </p>
    <div class="container results-content" id="result-content" style="display:none;">
        <div class="form-group">
            <input type="text" class="col-sm-12" id="result-event" >
          
         </div>
        <div class="row">
            <div class="container">
                <div class="col-sm-3">
                    <table class="table table-border" id="leftside-table" >
                       
                    </table>
                </div>
                <div class="col-sm-9">
                    <table class="table table-border" id="results">
                    </table>
                    
                    <table class="table table-border" id="split-results">

                        
                    </table>
                </div>
            </div>

        </div>




        <!-- Social Icons -->
        <a id="download-certificate" style="display:none">
            <div class="pull-left download-button" style="margin-left:35px;">
                <img src="<?php echo base_url() ?>skin/images/social-icons/download_button.png" height="25">Download Certificate
            </div>
        </a>
        <div class="pull-right social-links">
            <img src="<?php echo base_url() ?>skin/images/social-icons/Mail.png" height="25">
            <img src="<?php echo base_url() ?>skin/images/social-icons/Facebook.png" height="25">
            <img src="<?php echo base_url() ?>skin/images/social-icons/Twitter.png" height="25">
        </div>
    </div>

         <script type="text/javascript" src="<?php echo base_url() ?>skin/bootstrap/js/jquery.ajaxcomplete.js"></script>

       
    </body>

</html>