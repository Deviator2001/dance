<?php

Admin::model('App\FileEntry')->title('Вложения')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('id'),
		Column::string('filename')->label('Filename'),
		Column::string('mime')->label('Mime'),
		Column::string('original_filename')->label('Original_filename'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('post_id', 'Post'),
		FormItem::text('filename', 'Filename'),
		FormItem::text('mime', 'Mime'),
		FormItem::text('original_filename', 'Original Filename'),
	]);
	return $form;
});