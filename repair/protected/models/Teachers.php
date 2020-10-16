<?php

/**
 * This is the model class for table "teachers".
 *
 * The followings are the available columns in table 'teachers':
 * @property integer $id
 * @property string $name
 * @property string $dob
 * @property string $address
 * @property string $title
 * @property string $ecnumber
 * @property string $startdate
 */
class Teachers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teachers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dob, address, title, ecnumber, startdate', 'required'),
			array('name', 'length', 'max'=>255),
			array('dob, startdate', 'length', 'max'=>30),
			array('title', 'length', 'max'=>4),
			array('ecnumber', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, dob, address, title, ecnumber, startdate', 'safe', 'on'=>'search'),
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
			'dob' => 'Date of birth',
			'address' => 'Address',
			'title' => 'Title',
			'ecnumber' => 'EC number',
			'startdate' => 'Start date',
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
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('ecnumber',$this->ecnumber,true);
		$criteria->compare('startdate',$this->startdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teachers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
public function getTeachers()
{
$qtxt ="SELECT * FROM teachers";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}
public function getClassTeacher($id) {
/*$qtxt ="SELECT 
class_teacher.*,classes.name AS cname  
FROM 
class_teacher,classes 
WHERE 
class_teacher.teacher_id='$id' 
AND 
classes.id=class_teacher.class_id";*/
$qtxt ="SELECT 
class_teacher.*,classes.name AS cname  
FROM 
class_teacher,classes 
WHERE 
class_teacher.teacher_id='$id' 
AND 
classes.id=class_teacher.class_id";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
if(!empty($res)) {
$details=$res[0];
$teacher_id=$details['cname'];
}else {
	$teacher_id="Not Assigned.";
}	
return $teacher_id;
}

public function assignTeacher($id,$class) {
$ret=$this->checkClassTeacher($id);	
if($ret !=0) {
$qtxt ="SELECT id FROM classes WHERE name='$class'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$details=$res[0];
$class_id=$details['id'];
$str="INSERT INTO class_teacher(class_id,teacher_id) VALUES('$class_id','$id')";
$command =Yii::app()->db->createCommand($str);
$res =$command->query();
if($res) {
echo "Teacher Assigned to class : {$class}";	
}else {
	echo "Could not assign a teacher to class : {$class}";
}		
}
else {
	$this->updateClassTeacher($ret,$id,$class);
}	
}

public function checkClassTeacher($id) {
$qtxt ="SELECT id FROM class_teacher WHERE teacher_id='$id'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$ret=0;
if(!empty($res)) {
	$ret=0;
}
else {
$det=$res[0];	
$ret=$det['id'];	
}	
}

public function updateClassTeacher($row_id,$id,$class) {
$qtxt ="SELECT id FROM classes WHERE name='$class'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$details=$res[0];
$class_id=$details['id'];
$str="UPDATE class_teacher SET class_id='$class_id' AND teacher_id='$id'";
$command =Yii::app()->db->createCommand($str);
$res =$command->query();
if($res) {
echo "Teacher Assigned to class : {$class}";	
}else {
	echo "Could not assign a teacher to class : {$class}";
}
}
}