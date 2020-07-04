<?php

$this->zea->init('param');

$this->zea->setTable('member');
$this->zea->setId($id);
$name = !empty($name) ? $name : uniqid();
$this->zea->setParamName($name);
$this->zea->param_field = 'param';
$this->zea->addInput('nama','text');
$this->zea->addInput('name','hidden');
$this->zea->setValue('name',$name);
$this->zea->addInput('alamat','textarea');
$this->zea->addInput('image_foto_sk','file');
$this->zea->setAccept('image_foto_sk','.jpg, .png, .jpeg');
$this->zea->addInput('image_foto_diri','file');
$this->zea->setAccept('image_foto_diri','.jpg, .png, .jpeg');
$this->zea->addInput('jabatan','text');

$this->zea->addInput('username','text');
$this->zea->addInput('email','text');
$this->zea->setType('email','email');
$this->zea->addInput('password','password');

$this->zea->addInput('user_role_id','dropdown');
$this->zea->setLabel('user_role_id','Level');
$this->zea->removeNone('user_role_id');
$this->zea->tableOptions('user_role_id','user_role','id','title','level > 2');

$this->zea->startCollapse('username','User Detail');
$this->zea->endCollapse('user_role_id');
$this->zea->setCollapse('username',FALSE);
if(!empty($user_id))
{
	$this->zea->addInput('user_id','static');
	$this->zea->setValue('user_id',$user_id);
}

$this->zea->setEnableDeleteParam(false);
$this->zea->setFormName('member_edit');

$this->zea->editJoin([
	'table'=>'user',
	'field'=>['username','password','email','user_role_id'],
	'key'=>'user_id',
]);
$this->zea->setEncrypt(['password']);
$this->zea->setUnique(['username']);
$this->zea->setRequired(['nama','username','password','email','user_role_id']);

$this->zea->form();