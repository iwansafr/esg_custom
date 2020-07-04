<?php
$add = new zea();

$add->init('edit');
$add->setTable('produk_lelang');

$add->addInput('produk_id','dropdown');
$add->setLabel('produk_id','Produk');
$add->removeNone('produk_id');
$add->tableOptions('produk_id','produk','id','nama','user_id = '.$user['id'].' AND status = 2 AND id NOT IN(SELECT produk_id FROM produk_lelang WHERE user_id = '.$user['id'].')');

$add->addInput('user_id','static');
$add->setValue('user_id',$user['id']);
$add->setFormName('lelang_edit_form');
$add->setUnique(['produk_id']);

$form = new zea();

$form->init('roll');
$form->setTable('produk_lelang');

$form->setNumbering(true);

$form->addInput('id','plaintext');

$form->addInput('produk_id','dropdown');
$form->setLabel('produk_id','Produk');
if(is_member())
{
	$form->tableOptions('produk_id','produk','id','nama','user_id = '.$user['id'].' AND status = 2');
}else{
	$form->tableOptions('produk_id','produk','id','nama',' status = 2');

	$form->addInput('user_id','dropdown');
	$form->tableOptions('user_id','user','id','username');
}
$form->setDelete(true);
$form->setAttribute('produk_id','disabled');
$form->setFormName('lelang_list_form');


?>
<a href="<?php echo base_url('admin/produk/lelang') ?>" class="btn btn-sm btn-warning" style="margin-bottom: 10px;"><i class="fa fa-refresh"></i> Refresh</a>
<div class="row">
	<div class="col-md-3">
		<?php $add->form();?>
	</div>
	<div class="col-md-9">
		<?php $form->form();?>
	</div>
</div>