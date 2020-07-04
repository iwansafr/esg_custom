<?php

if(!empty($user))
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$form = new zea();
	$form->init('edit');
	$form->setTable('produk');

	$form->setId($id);
	if(!empty($id))
	{
		$where = ' AND user_id = '.$user['id'];
		$form->setWhere($where);
	}
	$form->addInput('nama','text');
	$form->setLabel('nama','Nama*');
	$form->addInput('deskripsi','textarea');
	$form->addInput('lebar','text');
	$form->setType('lebar','number');
	$form->setAttribute('lebar',['placeholder'=>'lebar dalam Cm(CentiMeter)']);
	$form->addInput('tinggi','text');
	$form->setType('tinggi','number');
	$form->setAttribute('tinggi',['placeholder'=>'tinggi dalam Cm(CentiMeter)']);
	$form->addInput('panjang','text');
	$form->setType('panjang','number');
	$form->setAttribute('panjang',['placeholder'=>'panjang dalam Cm(CentiMeter)']);

	$form->startCollapse('lebar','Volume');
	$form->endCollapse('panjang');
	$form->setCollapse('lebar',FALSE);

	$form->addInput('lokasi','textarea');
	$form->setAttribute('lokasi',['placeholder'=>'Provinsi, Kabupaten, Kecamatan, Desa']);

	$form->addInput('foto','file');
	$form->setAccept('foto','.jpg, jpeg, .png');

	$form->addInput('gallery','files');
	$form->setAccept('gallery','.jpg,.jpeg,.png');

	$form->addInput('kontak','text');

	$form->addInput('status','dropdown');
	$form->setOptions('status',['1'=>'Beli','2'=>'Jual']);

	$form->addInput('user_id','static');
	$form->setValue('user_id',$user['id']);

	$form->setRequired(['nama']);

	if(empty($form->getData()) && !empty($id))
	{
		msg('Maaf Sepertinya URL yang sedang anda akses tidak valid, silahkan periksa kembali','danger');
	}else{
		$form->form();
	}
}