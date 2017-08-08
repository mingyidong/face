<?php

// 引入人脸检测Face SDK
require_once '../AipFace.php';

// 定义常量
const APP_ID = '9955816';//'你的 App ID';
const API_KEY = 'Lj3RYBQInWSxvrd3VuSn4n0x';//'你的 Api Key';
const SECRET_KEY = 'YpGUpVLsy2zMtalGebt0judMuSi7AAfL';//'你的 Secret Key';

// 初始化
$aipFace = new AipFace(APP_ID, API_KEY, SECRET_KEY);
$data=array();
//人脸检测 获取所有属性
$arr=$aipFace->detect(file_get_contents('littlelight2.png'), array(
    'face_fields' => 'age,beauty,expression,faceshape,gender,glasses,landmark,race,qualities',
));
$data['age']=$arr['result'][0]['age'];
$data['beauty']=$arr['result'][0]['beauty'];
$data['gender']=$arr['result'][0]['gender'];
$data['glasses']=$arr['result'][0]['glasses'];
$data['race']=$arr['result'][0]['race'];
var_dump($data);
//人脸比对
// var_dump($aipFace->match(array(
    // file_get_contents('littlelight.png'),
    // file_get_contents('littlelight2.png'),
// )));

//人脸注册
// var_dump($aipFace->addUser(
    // '1', //人脸ID
    // '明依东', //人脸信息
    // 'man', //分组
    // file_get_contents('littlelight.png') //人脸
// ));

//人脸认证
// var_dump($aipFace->verifyUser(
//     '123', //人脸ID
//     'women', //分组
//     file_get_contents('face.jpg') //人脸
// ));

//人脸识别
// print_r($aipFace->identifyUser(
    // 'women', //分组
    // file_get_contents('face.jpg'),//人脸
	// array('ext_fields'=>'faceliveness')
// ));

//人脸更新
// var_dump($aipFace->updateUser(
//     '123', //人脸ID
//     'angela babay', //人脸信息
//     'women', //分组
//     file_get_contents('face.jpg') //人脸
// ));

//人脸删除
// var_dump($aipFace->deleteUser(
//     '123' //人脸ID
// ));

//人脸组内删除
// var_dump($aipFace->deleteGroupUser(
//     array('women', 'girls'), //分组
//     '123' //人脸ID
// ));

//人脸组内用户添加
// var_dump($aipFace->addGroupUser(
//     'women', //从这个分组
//     'girls', //到这个分组
//     '123' //复制这个ID的用户
// ));

//人脸ID信息查询
// var_dump($aipFace->getUser(
//     '123' //用户ID
// ));

//分组信息查询
// var_dump($aipFace->getGroupList());

//组内用户列表查询
// var_dump($aipFace->getGroupUsers(
    // 'man'
// ));
