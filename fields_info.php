<?php

/**
 * Тестовое задание.
 * Используя данные аккаунты amoCRM и документацию для разработчиков написать небольшой скрипт,
 * который парсит выдачу метода GET accounts/current и возвращает результат: название воронки продаж, 
 * название статуса сделки, ID статуса сделки в формате JSON и кодом ответа сервера 200 в случае успеха. 
 * Код скрипта предоставить. Использование сторонних классов для api amocrm не разрешается.
 */
 
$pipelines = array();
$id = array();
$name = array();
 
if(isset($account['pipelines']) && isset($account['leads_statuses'])) {

	foreach($account['pipelines'] as $field) {
		if(is_array($field) && isset($field['name'])) {
			array_push($pipelines, $field['name']);
		} else {
			die('Невозможно получить поле "Имя воронки продаж"');
		} 
	}
	
	foreach($account['leads_statuses'] as $field) {
		if(is_array($field) && isset($field['id'])) {
			array_push($id, $field['id']);
		} else {
			die('Невозможно получить поле "ID статуса сделки"');
		} 
	}
	
	foreach($account['leads_statuses'] as $field) {
		if(is_array($field) && isset($field['name'])) {
			array_push($name, $field['name']);
		} else {
			die('Невозможно получить поле "Имя статуса сделки"');
		} 
	}
	
} else {
	die('Невозможно получить поля "Воронка продаж" и "Статусы сделки"');
}

if(isset($pipelines) && isset($id) && isset($name)) {
	$leads_statuses = array($id, $name);
	$fields = array($pipelines, $leads_statuses);
	$result = json_encode($fields, JSON_UNESCAPED_UNICODE);
	http_response_code(200);
} else {
	http_response_code(404);
}
?>