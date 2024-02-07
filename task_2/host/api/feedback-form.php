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
    return ['error' => 'Использование "@gmail.com" в email, к сожалению, невозможно. Используйте другое доменное имя.'];
  }

  return ['success' => true];
}

function insertToFeedbackTable($data, $db_path) {
  try {
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO feedback (name, address, phone, email, comment) VALUES (:name, :address, :phone, :email, :comment)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name' => $data['name'],
        ':address' => $data['address'],
        ':email' => $data['email'],
        ':phone' => $data['phone'],
        ':comment' => $data['comment']
    ]);
  } catch (PDOException $e) {
    return ['error' => $e->getMessage()];
  }

  return ['success' => true];
}

function createFeedbackDb($db_path) {
  $pdo = new PDO('sqlite:' . $db_path);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db_schema = "CREATE TABLE feedback (
    id INTEGER PRIMARY KEY,
    name TEXT,
    address TEXT,
    phone TEXT,
    email TEXT,
    comment TEXT
  )";

  $pdo->exec($db_schema);
}

$data = json_decode(file_get_contents('php://input'), true);

$response = validation($data);
if (isset($response['error'])) {
  http_response_code(400);
  echo json_encode($response);
  exit;
}

$db_path = "feedback.db";
if (!file_exists($db_path)) {
  createFeedbackDb($db_path);
}

$response = insertToFeedbackTable($data, $db_path);
if (isset($response['error'])) {
  http_response_code(400);
  echo json_encode($response);
  exit;
}

// Send OK response
$response = [
  'success' => true,
  'message' => 'Feedback form data was successfully received by the server'
];
echo json_encode($response);

?>