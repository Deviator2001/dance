<?php

Admin::model(App\Category::class)->title('Галерея изображений')->display(function ()
{
	$display = AdminDisplay::tree();
	$display->value('name');
	return $display;

})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название галереи'),
		FormItem::multiimages('photos', 'Изображения'),
	]);
	return $form;
});