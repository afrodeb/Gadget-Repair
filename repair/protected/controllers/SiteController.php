<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
if(YII::app()->user->isGuest) {		
$login=$this->createUrl("site/login");
$this->redirect($login);  	  	
}
else { 
$site=new Site();
$location=$site->getLocation();
$this->render(
'index',
array(
'location'=>$location,
));
	}
	}
	
public function actionReports()
{
$site=new Site();		

if(isset($_REQUEST['class'])) {
$thisClass=$_REQUEST['class'];
$students=$site->getStudents($thisClass);
$classes=$site->getClasses();
$this->render('reports',array('thisClass'=>$thisClass,'classes'=>$classes,'students'=>$students,));
}
else {	
$classes=$site->getClasses();
$this->render('reports',array('classes'=>$classes,));
}	
}

public function actionCreateReport()
{
$site=new Site();
$classroom=$_POST['thisClass'];
$name=$_POST['student'];
$subjects=$_POST['subject'];
$marks=$_POST['mark'];
$site->insertResults($name,$classroom,$subjects,$marks);
$url=$this->createUrl("site/reports");
$this->redirect($url);
}

public function actionViewReport() {
$site=new Site();	
$classes=$site->getClasses();
if(isset($_REQUEST['name'])){
$name=$_REQUEST['name'];
$results=$site->getResults($name);
$this->render('results',
		array(
		'results'=>$results,
		'name'=>$name,
		));
}
elseif(isset($_REQUEST['class'])) {
$thisClass=$_REQUEST['class'];
$students=$site->getStudents($thisClass);
$this->render('results',array('classes'=>$classes,'students'=>$students,));
}
else {
$this->render('results',array('classes'=>$classes));
}

}

public function actionRegister()
	{
		$site=new Site();
		$classes=$site->getClasses();
		$this->render('registration',
		array(
		'classes'=>$classes
		));
	}

public function actionPerformances()
	{
	
		$this->render(
		'performance');
	}

public function actionStudents()
	{
		
$site=new Site();
$classes=$site->getClasses();
$count=count($classes);

		
		$this->render(
		'students',
		array(
		'classes'=>$classes,
//		'students'=>$students,
		));
	}

public function actionClass()
{
$site=new Site();
$classes=$site->getClasses();
$count=count($classes);
$this->render('class',
array('classes'=>$classes,
));

}	

public function actionNewClass()
{
$this->render('newclass');
}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
public function actionRegistration() {
$site=new Site();
$name=$_POST['fname'];
$sname=$_POST['sname'];
$class=$_POST['classroom'];
$pname=$_POST['pname'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$site->createStudent($name,$sname,$class,$pname,$address,$phone,$email,$dob);
$url=$this->createUrl("site/register");
$this->redirect($url);

//echo $name ." ".$sname." ".$class;

}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$site=new Site();
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$site->updateTime(YII::app()->session['id']);
				$this->redirect(Yii::app()->user->returnUrl);
				
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$url=$this->createUrl("site/login");
		$this->redirect($url);
	}
	
public function actionPayments() {
$site=new Site();
$charges=$site->getCharges();
$this->render(
"payments",
array(
"charges"=>$charges,
));

//echo $name ." ".$sname." ".$class;

}
public function actionAccountPayments() {	
   $site=new Site();
	$id=$_POST['idNumber'];
	$charge=$_POST['charge'];
	$amount=$_POST['amount'];
	$login=$_POST['login'];
	$site->insertPayments($id,$amount,$charge,$login);
	$site->updateAccounts($id,$amount);
	//echo $id ." ".$charge." ".$amount;
}

public function actionSearchStudent() {	
   $site=new Site();
	$id=$_POST['idNumber'];
	$arr=array();
	$arr=$site->searchStudents($id);
	$count=count($arr);
   $details=$arr[0];
   $name=$details['name'];
   $sname=$details['surname'];
   $class=$details['class'];
   $parent=$details['parent'];
   $address=$details['address'];
   
   echo $name.",".$sname.",".$class.",".$parent.",".$address;
	//for() {
   
   //print_r($arr);
}
public function actionTest() {
$this->render("test");
}
}