<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string $created
 */
class Stock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, status', 'required'),
			array('name', 'length', 'max'=>255),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, status,phone, created', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'phone'=>'Phone Number',
			'status' => 'Status',
			'created' => 'Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

public function getJobs()
{
$qtxt ="SELECT * FROM stock";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}	

public function sendNotification($user,$message) {	
$dir=dirname(__FILE__)."/library/";	
include("{$dir}XMPPHP/XMPP.php");
$conn = new XMPPHP_XMPP('127.0.0.1', 5222, 'admin', 'gabby&kudaprezha', 'desk', '127.0.0.1', $printlog=true, $loglevel=XMPPHP_Log::LEVEL_INFO);
try {
    $conn->connect();
    $conn->processUntil('session_start');
    $conn->presence();
    $conn->message($user,$message);
    $conn->disconnect();
       
    
} catch(XMPPHP_Exception $e) {
    die($e->getMessage());
}	
}

public function register($user) {
 $dir=dirname(__FILE__)."/library/";	
include("{$dir}XMPPHP/XMPP.php");
$conn = new XMPPHP_XMPP('127.0.0.1', 5222, 'anonymous', '', 'xmpphp', '127.0.0.1', true, $loglevel=XMPPHP_Log::LEVEL_INFO);
try {
    $conn->connect();
    $conn->register("{$user}", "{$user}", "{$user}@127.0.0.1");
    $conn->disconnect();
    $url="http://localhost/repair/library/register.php?user={$user}";
     $string = '<script type="text/javascript">';
            $string .= 'window.location = "' . $url . '"';
            $string .= '</script>';
            echo $string;
} catch(XMPPHP_Exception $e) {
    die($e->getMessage());
    }
}

public function addToRoaster($user,$conn) {
 $dir=dirname(__FILE__)."/library/";	
 //include "{$dir}XMPPHP/XMPP.php";
// $conn = new XMPPHP_XMPP('127.0.0.1', 5222, 'admin', 'gabby&kudaprezha', 'xmpphp', '127.0.0.1', true, $loglevel=XMPPHP_Log::LEVEL_DEBUG);
try {
    $conn->connect();
    $conn->processUntil('session_start');
    $conn->presence();
    $groups=array();
    $conn->disconnect();
} catch(XMPPHP_Exception $e) {
    die($e->getMessage());
    }
}

public function getJOb($id)
{
$qtxt ="SELECT * FROM stock WHERE id='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function setProblem($number,$text)
{
$qtxt ="INSERT INTO tickets(number,text) VALUES('$number','$text')";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
return $res;
}

public function getTicket($id)
{
$qtxt ="SELECT * FROM tickets WHERE id='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}
public function getResponses($id)
{
$qtxt ="SELECT * FROM response WHERE tid='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function getTickets($id)
{
$qtxt ="SELECT * FROM tickets WHERE number='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}

public function getAllTickets()
{
$qtxt ="SELECT * FROM tickets";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}

public function setResponse($name,$id,$text)
{
$qtxt ="INSERT INTO response(name,tid,text) VALUES('$name','$id','$text')";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
return $res;
}
public function deleteTicket($id)
{
$qtxt ="DELETE FROM tickets WHERE id={$id}";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
return $res;
}

public function getPhoneNumber($id)
{
$qtxt ="SELECT * FROM stock WHERE id={$id}";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$det=$res[0];
$phone=$det['phone'];
return $phone;
}


}
