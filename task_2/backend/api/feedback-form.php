<?php
$data = json_decode(file_get_contents('php://input'), true);

// Обработка полученных данных
// Например, сохранение в базу данных или другие операции

// Отправка ответа
echo json_encode([
    'success' => true,
    'message' => 'Feedback form data was successfully received by the server'
]);

?>