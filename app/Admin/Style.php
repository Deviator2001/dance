<?php

Admin::model('App\Style')->title('Стили')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('filename')->label('filename'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('filename', 'Filename'),
		FormItem::multiimages('photos', 'Фото'),
	]);
	return $form;
});