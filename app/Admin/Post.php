<?php

Admin::model('App\Post')->title('Новости')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Заголовок'),
		Column::string('content')->label('Содержание'),
		Column::string('created_at')->label('Создано'),
		Column::string('published')->label('Опубликовано'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Заголовок'),
		FormItem::timestamp('created_at', 'Создано')->format('d.m.Y'),//->seconds(true),
		FormItem::checkbox('published', 'Опубликовано'),
		FormItem::ckeditor('content', 'Содержание'),
		FormItem::multiimages('photos', 'Фото'),
	]);
	return $form;
});