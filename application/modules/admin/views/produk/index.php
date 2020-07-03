<?php

$form = new zea();

$form->init('roll');
$form->setTable('produk');

$form->search();

$form->addInput('id','plaintext');
$form->setNumbering(true);
$form->addInput('nama','plaintext');

$form->form();