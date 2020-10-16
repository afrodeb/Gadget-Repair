<?php

class StockController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','delete','deletes','get','support',
				'ticket','tickets','alltickets','respond','done','doneapp','deleteticket'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Stock;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			//$att=$model->attributes;
			$phone=$_POST['phone'];
			$model->phone=$phone;
			
			if($model->save()){
			   $model->register($phone);
			   $url=$this->createUrl("stock/index");
if($model->status == "Done") {            
 $model->sendNotification($phone."@localhost","Hie,we have received your device and will notify you when its ready.");
}   
           $string = '<script type="text/javascript">';
            $string .= 'window.location = "' . $url . '"';
            $string .= '</script>';
            echo $string;
}
				//$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			$phone=$_POST['phone'];
			if($model->save()){	
$url=$this->createUrl("stock/index");
if($model->status == "Done") {      
$ids=$model->id;      
 $model->sendNotification($phone."@localhost","{$ids}-Hie,your device is now ready for collection,please come to Litegel Technologies and collect.");
}   
            $string = '<script type="text/javascript">';
            $string .= 'window.location = "' . $url . '"';
            $string .= '</script>';
            echo $string;		
			}
				//$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
		public function actionDeletes()
	{
		$id=$_REQUEST['id'];
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Stock');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Stock the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Stock::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Stock $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='stock-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
public function actionGet(){
$str="";
$id=$_REQUEST['id'];
$site=new Stock();
$blogs=$site->getJob($id);	
$count=count($blogs);
	for($x=0;$x<$count;$x++) {
	$blog=$blogs[$x];
	$id=$blog['id'];
	$name=$blog['name'];
	$description=$blog['description'];
	//$price=$blog['price'];
	$date=$blog['created'];
	//$img=$blog['image'];
$str .= $name."-".$id."-".$description;	
	//$str .= $name."-".$id."-".$date."-".$description."-".$price.";";
}		
 echo $str;

}

public function actionSupport(){
$str="";
$text=$_REQUEST['text'];
$number=$_REQUEST['number'];
//$number="888777666";
$site=new Stock();
$site->setProblem($number,$text);
echo "Done";

}	

public function actionTicket(){
$str="";
$myres="";
$id=$_REQUEST['id'];
$site=new Stock();
$blogs=$site->getTicket($id);	
$count=count($blogs);
	for($x=0;$x<$count;$x++) {
	$blog=$blogs[$x];
	$id=$blog['id'];
	$number=$blog['number'];
	$text=$blog['text'];
	$str .= $number."-". $text."<br><br><br><hr>";	
	$response=$site->getResponses($id);
	$rcount=count($response);
	for($y=0;$y<$rcount;$y++) {
		$res=$response[$y];
		$myres .=$res['name']."-".$res['text']."<br><br>";
		}
		$str=$str.$myres;
	}		
 echo $str;

}
	

public function actionTickets(){
$str="";
$id=$_REQUEST['id'];
$site=new Stock();
$blogs=$site->getTickets($id);	
$count=count($blogs);
	for($x=0;$x<$count;$x++) {
	$blog=$blogs[$x];
	$id=$blog['id'];
	$name=$blog['text'];
$str .= substr($name,0,30)."-".$id.";";	
}		
 echo $str;

}	
	public function actionAllTickets()
	{
$this->render('tickets');	
	
	}
public function actionRespond()
{
$id=$_REQUEST['id'];
$stock=new Stock();
$ticket=$stock->getTicket($id);
$this->render('respond',array('ticket'=>$ticket));
}

public function actionDone()
{
if(isset($_POST))
		{	
$stock=new Stock();	
$text=$_POST['response'];
$id=$_POST['id'];
$name=$_POST['name'];
$stock->setResponse($name,$id,$text);
$url=$this->createUrl("stock/respond/id/{$id}");
$this->redirect($url);
}
}
public function actionDoneApp()
{
$stock=new Stock();	
$text=$_REQUEST['text'];
$id=$_REQUEST['id'];
$name=$_REQUEST['number'];
$stock->setResponse($name,$id,$text);
//$url=$this->createUrl("stock/respond/id/{$id}");
//$this->redirect($url);

}
public function actionDeleteTicket() {
	$id=$_REQUEST['id'];
	$stock=new Stock();
	$stock->deleteTicket($id);
	$url=$this->createUrl("stock/alltickets");
   $this->redirect($url);
	}
}




