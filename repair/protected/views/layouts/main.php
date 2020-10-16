<?php
$class=$this->createUrl("site/class");
$performance=$this->createUrl("site/performances");
$students=$this->createUrl("site/students");
$reports=$this->createUrl("site/reports");
$register=$this->createUrl("site/register");
$home=$this->createUrl("index");
$allStudents=$this->createUrl("site/all");
$logout=$this->createUrl("site/logout");
$viewreport=$this->createUrl("site/repairs");
$payments=$this->createUrl("site/payments");
$teachers=$this->createUrl("teachers/index");
$test=$this->createUrl("site/test");
$product=$this->createUrl("product/index");
$repairs=$this->createUrl("stock/index");
$ticket=$this->createUrl("stock/alltickets");
$site=new Site();
$systemDetails=$site->getSystemDetails();
$system=$systemDetails[0];
$name=$system['name'];
$logo=$system['logo'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.10.2.js"></script>
     <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/school.js"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.datetimepicker.css"/>
 

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<a class="navbar-brand" href="<?php echo $home; ?>">
<img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $logo; ?>" height="40" width="40" style="float:left;">
<?php echo $name; ?></a> 
            </div>
<?php 
if(!Yii::app()->user->isGuest) {       
?>     
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access :   <?php echo substr(YII::app()->session['lastlogin'],0,11); ?> &nbsp; <a href="<?php echo $logout; ?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/find_user.png" class="user-image img-responsive"/>
                    <?php echo YII::app()->session['name']."(".YII::app()->session['role'].")"; ?>
					</li>
				
					<?php
					if(YII::app()->session['role'] != "Teacher") {
					?>
                    <li>
                        <a href="<?php echo $home; ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="<?php echo $product; ?>"><i class="fa fa-dashboard fa-3x"></i>Products</a>
                    </li>
                    <li>
                        <a href="<?php echo $repairs; ?>"><i class="fa fa-dashboard fa-3x"></i>Repairs</a>
                    </li>
 <li>
                        <a href="<?php echo $ticket; ?>"><i class="fa fa-dashboard fa-3x"></i>Tickets</a>
                    </li>                    
                    
                    <?php
                    }
                    else {
                    	?>
                    	 <li>
                        <a  href="<?php echo $reports; ?>"><i class="fa fa-edit fa-3x"></i> Make Reports </a>
                    </li>		
                     <li>
                        <a  href="<?php echo $viewreport; ?>"><i class="fa fa-th-list fa-3x"></i> View Reports</a>
                    </li>		
                    	<?php
                    	}
                    ?>
                </ul>
               
            </div>
            
        </nav>  

  <?php
  }
  ?>          
            
            
            
      <?php echo $content; ?>      
            
            
            
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/custom.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.datetimepicker.js"></script>
<script>
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1991/03/07'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	//formatTime:'H:i',
	formatDate:'d.m.Y',
	defaultDate:'7.3.1991', // it's my birthday
	//defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

/*--------------------------*/
$('#datetimepicker2').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
//disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker2').datetimepicker({value:'2015/04/15',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker2').datetimepicker({
	//formatTime:'H:i',
	formatDate:'d.m.Y',
	defaultDate:'7.3.1991', // it's my birthday
	//defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker2_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});




var logic = function( currentDateTime ){
	if( currentDateTime.getDay()==6 ){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};

$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>   
</body>
</html>
