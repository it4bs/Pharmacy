<<<<<<< HEAD
<nav class="navbar navbar-inverse top-navbar" id="top-nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img class="img-responsive" src="./img/pharmacy.png" width="50px" height="50px"></a>
        <a href="javascript:;" class="sidebar-toggle">
        <i class="fa fa-bars"></i></a>
    <span class="close-btn" id="hide-btn"><i class="fa fa-times" aria-hidden="true"></i></span>   
  </div> 
  <div class="navigation-nav">
  <a href="../index.php" id='a' class="button-abtn" >
  <img src="./img/download.png">
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

<!-- side Navbar original-->
<div class="container-1" id="user-profil">                  
<ul id="side" class="nav navbar-nav-1 side-nav">
    
 <li>  
  <img class="img-circle" src="./img/download.png" alt="user image">
    <p class="welcome"><i class="fa fa-user"></i> Welcome 
    <?php
        $position=$_SESSION['SESS_LAST_NAME'];
        if($position=='cashier') {
        ?>
         <span class="last-name"><?php echo $position?></span>
        <?php
        }
        else if($position=='admin') {
         ?>
          <span class="last-name"><?php echo $position?></span>
        <?php
        }
    ?>
    </p>    
 </li>
  <li class="dashboard">
   <a class="active" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
 </li>
    
    <li class="panel">
       <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">
       <i class="fa fa-money"></i> Sales
       </a>
    </li>
    <li class="panel">
           <a href="products.php">
           <i class="fa fa-line-chart"></i> Products
           </a>
    </li>


    
    <li class="panel">
     <a href="supplier.php">
      <i class="fa fa-truck"></i> Suppliers
     </a>
    </li>
    
    <li class="panel">
   <a href="staff.php">
   <i class="fa fa-clipboard"></i> Staff </a>
</li>
    
    <li class="panel">
   <a href="salesreport.php?d1=0&d2=0">
    <i class="fa fa-edit"></i> Report
   </a>
    
  
</li>
    
  <li class="panel">
   <a class="active" href="finance.php"><i class="fa fa-inbox"></i> Finance</a>
</li>
    
    <li class="panel">
   <a class="active" href="about.php"><i class="fa fa-cogs"></i> About</a>
</li>           
</ul>      
    </div><!-- end of side Navbar -->
=======
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><b>Point of Sales</b></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong></a></li>
			 <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d',mktime());
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>

				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
