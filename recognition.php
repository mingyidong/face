<style>
body
{
	text-align:left; 
	height:500px;
	width:600px;
	top:50%;
	margin-top:330px;
	margin-left:650px;
	background-image:url(./imgs/back.jpg);
	background-position:center;
	background-repeat:repeat-y;
}
</style>
<?php

//face = array(array('attribute'=>array('age','gender'),'face_id'=>'abcd','position'=>array('center'),'tag'=>""));
//print_r($face);
require_once 'face.php';
require_once 'dir.php';
$facepp = new Facepp();
$facepp->api_key       = '4b50af19005588bbf1244b99014a5613';
$facepp->api_secret    = '-ztE4oSbzxE_Qg-BraSVzDFYNhLgYx_I';
/*
$img_url = array();
$person_name = array();
listDir("E:/test", $person_name, $img_url);
//var_dump($img_url);
foreach ($img_url as $url){
$response = $facepp->execute('/recognition/identify', array('group_name' => 'oldpeople_qiaoxi', 'img' => $url));
// $url."<br>";
$face_body = json_decode($response['body'], 1);
	//var_dump($face_body);
	$face = $face_body['face'];
	$face1 = $face[0];
	$candidates = $face1['candidate'];
	$person_identify = $candidates[0];
	$identify_name = $person_identify['person_name'];
echo $identify_name."<br>";
*/
$img_url = $_GET["testImgPath"];
/*-----------------------------------
中英文名字的映射就在下面
-----------------------------------*/
$person_name = array("ami" => "艾米", "dongjian" => "张东健", "xiaowang" => "小王");
//$img_url = $_GET["testImgDir"];
$response = $facepp->execute('/recognition/identify', array('group_name' => 'oldpeople_qiaoxi', 'img' => $img_url));
$face_body = json_decode($response['body'], 1);
$face = $face_body['face'];
$face1 = $face[0];
$candidates = $face1['candidate'];
$person_identify = $candidates[0];
$identify_name = $person_identify['person_name'];
//echo $identify_name;
echo "识别结果为:<br><br>".$person_name[$identify_name]."<br><br>";

?>
<form action = "test.php">
<input type = "submit" value = "继续测试">
</form>