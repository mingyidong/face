<style>
body
{
  text-align:left; 
 height:500px;
 width:600px;
 top:50%;
 margin-top:330px;
  margin-left:590px;
  background-image:url(./imgs/back.jpg);
  background-position:center;
  background-repeat:repeat-y;
}
</style>
<html>
<body>
<?php
require_once 'face.php';
require_once 'dir.php';
########################
###     example      ###
########################
$facepp = new Facepp();
$facepp->api_key       = '4b50af19005588bbf1244b99014a5613';
$facepp->api_secret    = '-ztE4oSbzxE_Qg-BraSVzDFYNhLgYx_I';
#detect local image 
$img_url = array();
$person_name = array();
$trainDir = $_GET["trainDir"];
listDir($trainDir, $person_name, $img_url);
echo "从目录中我们得到了 ".sizeof($img_url)." 张图片\n";

//var_dump($img_url);
//$person_name = array('lili','wangda');
$face_ids = array();
$i = 0;
$response = $facepp->execute('/group/delete', array('group_name' => 'oldpeople_qiaoxi'));
$response = $facepp->execute('/group/create', array('group_name' => 'oldpeople_qiaoxi'));

foreach ($img_url as $img){
	$params['img']          = $img;
	$params['attribute']    = 'gender,age,race,smiling,glass,pose';
	$response               = $facepp->execute('/detection/detect',$params);
	
	$face_body = json_decode($response['body'], 1);
	//var_dump($face_body);
	$face = $face_body['face'];
	//$face_id = $face[1];

	$face_1 = $face['0'];
	$face_id = $face_1['face_id'];
	array_push($face_ids, $face_id);
	$response = $facepp->execute('/person/delete', array('person_name' => $person_name[$i],'group_name' => 'oldpeople_qiaoxi'));
	$response = $facepp->execute('/person/create', array('person_name' => $person_name[$i],'group_name' => 'oldpeople_qiaoxi'));
	//var_dump($response);
	$response = $facepp->execute('/person/add_face', array('person_name' => $person_name[$i], 'face_id' => $face_id, 'group_name' => 'oldpeople_qiaoxi'));
	$i = $i + 1;
	
}
$response = $facepp->execute('/train/identify', array('group_name' => 'oldpeople_qiaoxi'));
//var_dump($response);
echo "哈哈，训练成功啦！\n";
?>

<form action = "test.php" name = "test" method = "get">
<input type = "submit" name = "submit" value = "开始测试吧">
</form>
</body>
</html>
<?
//$response = $facepp->execute('/group/create', array('group_name' => 'oldpeople_qiaoxi'));
//$response = $facepp->execute('/group/add_people', array('group_name' => 'oldpeople_qiaoxi'));

#detect image by url
//$params['url']          = 'http://www.faceplusplus.com.cn/wp-content/themes/faceplusplus/assets/img/demo/1.jpg';
//$response               = $facepp->execute('/detection/detect',$params);
//print_r($response);
/*
	if($response['http_code'] == 200) {
    #json decode 
    $data = json_decode($response['body'], 1);
	//var_dump($data);
	//print_r(array_keys($data));
	
	//var_dump($data["face"]);
    //print_r($data1);
    //print_r($data1);
    #get face landmark
    foreach ($data['face'] as $face) {
        $response = $facepp->execute('/detection/landmark', array('face_id' => $face['face_id']));
        //print_r($response);
    }
    
    #create person 
	
    //$response = $facepp->execute('/group/create', array('person_name' => 'unique_person_name'));
    print_r($response);
    #delete person
    //$response = $facepp->execute('/person/delete', array('person_name' => 'unique_person_name'));
    //print_r($response);
}
*/
?>

