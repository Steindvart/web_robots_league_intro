<?php
function validation($data) {
    $name = $data['name'];
    if (empty($name)) {
        return ['error' => 'Пожалуйста, заполните поле "ФИО".'];
    }

    $phone = $data['phone'];
    if (empty($phone)) {
        return ['error' => 'Пожалуйста, заполните поле "Мобильный телефон".'];
    }

    $email = $data['email'];
    if (!empty($email) && strpos($email, '@gmail.com') !== false) {
        return ['error' => 'Использование "@gmail.com" в email, к сожалению, недоступно. Используйте другое доменное имя.'];
    }

    return ['success' => true];
  }

$data = json_decode(file_get_contents('php://input'), true);

 $response = validation($data);
if (isset($response['error'])) {
    http_response_code(400);
    echo json_encode($response);
    exit;
}

// Обработка полученных данных
// Например, сохранение в базу данных или другие операции

// Send OK response
$response = [
    'success' => true,
    'message' => 'Feedback form data was successfully received by the server'
];
echo json_encode($response);

?>