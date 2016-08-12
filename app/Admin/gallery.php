<?php

Admin::model('App\gallery')->title('Галерея')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('title'),
		Column::string('published')->label('Published'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::checkbox('published', 'Published'),
		FormItem::multiimages('photos', 'Фото'),
	]);
	return $form;
});