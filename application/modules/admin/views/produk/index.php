<?php

$form = new zea();

$form->init('roll');
$form->setTable('produk');

$form->search();


$form->addInput('id','plaintext');
$form->setLabel('id','Action');
$form->setPlaintext('id',[
	base_url('admin/produk/edit?id={id}') => 'Edit',
]);
$where = '';
if(is_member())
{
	$where = ' user_id = '.$user['id'];
	$form->setEdit(true);
}else{
	$form->addInput('user_id','dropdown');
	$form->tableOptions('user_id','user','id','username');
	$form->setAttribute('user_id','disabled');
	$form->setLabel('user_id','username');
}
$form->setDelete(true);
$form->setWhere($where);
$form->setNumbering(true);
$form->addInput('nama','plaintext');
$form->addInput('lokasi','plaintext');
$form->addInput('kontak','plaintext');

$form->addInput('status','dropdown');
$form->setOptions('status',['1'=>'Beli','2'=>'Jual']);
$form->setAttribute('status','disabled');

$form->setUrl('admin/produk/clear_list');

$form->form();