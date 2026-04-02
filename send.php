<?php
// ТВОЇ ДАНІ
$token = "ТУТ_ТВІЙ_ТОКЕН_БОТА";
$chat_id = "ТУТ_ТВІЙ_ID_ЧАТУ";

// Отримання даних з форми
$order_id = $_POST['order_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'] ? $_POST['city'] : "Не вказано";
$service = $_POST['service'];

// Текст повідомлення
$message = "🚜 <b>НОВА ЗАЯВКА №{$order_id}</b>\n\n";
$message .= "<b>Техніка:</b> {$service}\n";
$message .= "<b>Клієнт:</b> {$name}\n";
$message .= "<b>Телефон:</b> {$phone}\n";
$message .= "<b>Місто:</b> {$city}";

// Відправка в Telegram
$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=" . urlencode($message);
$send = file_get_contents($url);

if ($send) {
    // Після успіху повертаємо клієнта на сайт з міткою успіху
    header('Location: index.html?status=success');
}
?>