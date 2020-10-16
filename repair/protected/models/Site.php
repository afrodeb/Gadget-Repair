<?php
class Site
{

public function createRegNumber()
{
$ids = "C".strtoupper(substr(number_format(time() * mt_rand(),0,'',''),0,5).chr(97 + mt_rand(0, 25))); 
return $ids;
}
//$name,$sname,$class,$pname,$address,$phone,$email
public function createStudent($name,$surname,$class,$pname,$address,$phone,$email,$dob)
{
$id=$this->createRegNumber();	
$qtxt ="INSERT 
         INTO 
         students(name,surname,class,parent,phone,email,address,dob,student_id) 
          VALUES('$name','$surname','$class','$pname','$phone','$email','$address','$dob','$id')";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
}	

public function getSystemDetails()
{
$qtxt ="SELECT * FROM system";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function updateTime($login)
{
$qtxt ="UPDATE user SET  lastlogin=NOW() WHERE id=$login";

$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
return $res;
}


public function getStudents($class)
{
$qtxt ="SELECT * FROM students WHERE class='$class'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}

public function getClasses()
{
$qtxt ="SELECT * FROM classes";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;

}

public function insertResults($name,$class,$subjects,$marks)
{
$count=count($subjects);	
for($x=0;$x<$count;$x++) {
$subject=$subjects[$x];	
$mark=$marks[$x];
if($subject != ""){
$qtxt ="INSERT INTO reports(name,class,subject,mark) VALUES('$name','$class','$subject','$mark')";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
}
}
}

public function getResults($student) {
$qtxt ="SELECT * FROM reports WHERE name='{$student}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function insertPayments($id,$amount,$charge,$login) {
$qtxt ="INSERT INTO payments(amount,student_id,charge_id,employee_id) VALUES('$amount','$id','$charge','$login')";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
return $res;
}

public function searchStudents($id) {
$qtxt ="SELECT * FROM students WHERE student_id='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function getCharges() {
$qtxt ="SELECT * FROM charges WHERE status='a'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
return $res;
}

public function updateAccounts($id,$amount) {
$qtxt ="SELECT * FROM accounts WHERE student_id='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$details=$res[0];	
$balance=$details['balance'];	
$balance=$balance+$amount;	
	
$qtxt ="UPDATE accounts SET balance={$balance} WHERE student_id='{$id}'";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->query();
//return $res;
}

public function getLocation() {
$qtxt ="SELECT location FROM system";
$command =Yii::app()->db->createCommand($qtxt);
$res =$command->queryAll();
$details=$res[0];
$location=$details['location'];
return $location;
}


}

?>