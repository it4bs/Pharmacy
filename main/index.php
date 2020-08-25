
<!DOCTYPE html>
<html>
<head>

<link rel='icon' href='./img/download.png'/>
    <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta name="author" content="sumit kumar"> 
  <title>admin-template</title> 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
  <link href="styles.css" rel="stylesheet" type="text/css">
  <link href="../style.css" rel="stylesheet" type="text/css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
	<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<script language="javascript" type="text/javascript">
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
</SCRIPT>	
    </head>

	<body>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<h3>your are <?php echo $position?></h3>
<?php
}
else if($position=='admin') {
?>
	<nav class="navbar navbar-inverse top-navbar" id="top-nav">
  <div class="container-fluid">
    <div class="navbar-header">      
      <a class="navbar-brand" href="#"><img class="img-responsive" src="https://icons.iconarchive.com/icons/icons-land/medical/256/Documents-Caduceus-icon.png" width="50px" height="50px"></a>
        <a href="javascript:;" class="sidebar-toggle">
        <i class="fa fa-bars"></i></a>
		<span class="close-btn" id="hide-btn"><i class="fa fa-times" aria-hidden="true"></i></span>		
	</div> 
	<div class="navigation-nav">
  <a href="../index.php" id='a' class="button-abtn" >
	<img src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">
<div class="logout-out">LOGOUT</div>
  </a>

</div>
<li class="pull-right">
           <div id="reportrange" class="btn btn-green btn-square date-picker">
            <i class="fa fa-calendar"></i>
             <span ><?php
								$Today = date('y:m:d',time());
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
</span>
           </div>
          </li>
	</div>  

	



</nav> 
<?php
}
?>

<!-- side Navbar original-->
<div class="container-1" id="user-profil">                  
<ul id="side" class="nav navbar-nav-1 side-nav">
    
 <li>  
  <img class="img-circle" src="./img/download.png" alt="user image">
    <p class="welcome"><i class="fa fa-key"></i> Welcome 
    <span class="last-name">Admin</span>
    <a href="#"><i class="fa fa-log-out"></i></a>
    </p>    
 </li>
  <li class="dashboard">
   <a class="active" href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
 </li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#charts">
   <i class="fa fa-bar-chart-o"></i> Charts <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="charts">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#calendar">
   <i class="fa fa-calendar"></i> calendar <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="calendar">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#clipboard">
   <i class="fa fa-clipboard"></i> clipboard <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="clipboard">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#edit">
   <i class="fa fa-edit"></i> edit <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="edit">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#inbox">
   <i class="fa fa-inbox"></i> inbox <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="inbox">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#cogs">
   <i class="fa fa-cogs"></i> cogs <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="cogs">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#paper">
   <i class="fa fa-paper-plane"></i> paper <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="paper">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>
                 
</ul>      
    </div><!-- end of side Navbar -->    
   
    
    <div class="container-2">
     <div id="page-wrapper">   
      <div class="row">
     <div class="col-md-12">
      <div class="page-title">
	  <ol class="breadcrumb">  
	  <h2>Dashboard<small>Content Overview</small></h2>
        </ol>
       </div>
      </div>
     </div> 
                                
        <div class="row" >
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-2x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Users
                                </div>
                                <div class="circle-tile-number text-faded">
                                    265
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-money fa-fw fa-2x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Revenue
                                </div>
                                <div class="circle-tile-number text-faded">
                                    $32,384
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-2x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Alerts
                                </div>
                                <div class="circle-tile-number text-faded">
                                    9 New
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-tasks fa-fw fa-2x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Tasks
                                </div>
                                <div class="circle-tile-number text-faded">
                                    10
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-shopping-cart fa-fw fa-2x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Orders
                                </div>
                                <div class="circle-tile-number text-faded">
                                    24
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
					</div>
				</div>
    </div><!-- page-wrapper END-->
   </div><!-- container-1 END-->
 
    
    


 

    
    
    <script src="js/jquery-3.1.1.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script> 
   
    


<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();
            
           $("#user-profil").show();
            
           $("#hide-btn").show();
            
           $(".container-2").css("width", "85%");
            
             
        });
        
        $("#hide-btn").click(function(){
            $(this).hide();
            
           $("#user-profil").hide();
            
           $(".sidebar-toggle").show();
            
           $(".container-2").css("width", "100%");
            
             
        });
    });
</script>  
</body>
</html>