<?php

$form = new zea();

$form->init('roll');

$form->setTable('member');
$form->search();
$form->join('user','ON(member.user_id = user.id)',
	'member.id, member.name, member.param->>"$.nama" AS nama,
	 member.param->>"$.alamat" AS alamat,
	 member.param->>"$.jabatan" AS jabatan,
	 user.username,
	 member.param->>"$.email" AS email,
	 member.param->>"$.user_role_id" AS user_role_id
	 ');
$form->setParamName(uniqid());
$form->param_field = 'param';
$form->addInput('id','plaintext');
$form->setLabel('id','action');
$form->setPlaintext('id',
	[base_url('admin/member/detail/{name}')=>'detail'],
	[base_url('admin/member/edit?id={id}')=>'edit']
);
$form->addInput('nama','plaintext');
$form->addInput('name','plaintext');
$form->setLabel('name','kode');
$form->addInput('alamat','plaintext');
$form->addInput('jabatan','plaintext');

$form->addInput('username','plaintext');
$form->addInput('email','plaintext');
$form->setType('email','email');

$form->addInput('user_role_id','dropdown');
$form->setLabel('user_role_id','Level');
$form->tableOptions('user_role_id','user_role','id','title','level > 2');
$form->setAttribute('user_role_id','disabled');

$form->startCollapse('username','User Detail');
$form->endCollapse('user_role_id');
$form->setCollapse('username',FALSE);

$form->setDelete(true);
$form->setEdit(true);
$form->setEditLink('member/edit?id=');

$form->setEnableDeleteParam(false);
$form->setNumbering(true);
$form->setUrl('admin/member/clear_list');

$form->form();