<?php

Admin::model('App\Schedule')->title('Расписание')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Заголовок'),
		Column::string('schedule')->label('Расписание'),
		Column::string('published')->label('Опубликовано'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Заголовок'),
		FormItem::file('schedule', 'Файл'),
		FormItem::checkbox('published', 'Опубликовано'),
	]);
	return $form;
});