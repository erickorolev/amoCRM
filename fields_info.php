<?php/** * Тестовое задание. * Используя данные аккаунты amoCRM и документацию для разработчиков написать небольшой скрипт, * который парсит выдачу метода GET accounts/current и возвращает результат: название воронки продаж,  * название статуса сделки, ID статуса сделки в формате JSON и кодом ответа сервера 200 в случае успеха.  * Код скрипта предоставить. Использование сторонних классов для api amocrm не разрешается. */ $id = array();$name = array();$pipelines = array(); if(isset($account['pipelines'])) {	foreach($account['pipelines'] as $field) {		array_push($pipelines, $field['name']);	}		foreach($account['leads_statuses'] as $field) {		array_push($id, $field['id']);	}		foreach($account['leads_statuses'] as $field) {		array_push($name, $field['name']);	}	} else {	die('Невозможно получить поля');}$leads_statuses = array($id, $name); $fields = array($pipelines, $leads_statuses);echo '<pre>'; print_r($fields); echo '</pre>';// echo json_encode($fields);?>