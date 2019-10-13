<?php
require 'vendor/autoload.php';
use Carbon\Carbon;

Carbon::setLocale('ru');
date_default_timezone_set('Europe/Moscow');
require_once 'connect.php';
$query = $connect->query("SELECT DISTINCT id_user, image, id_dialog
                    FROM user_dialog, user, dialog 
                    WHERE id_user = user.id AND id_dialog = dialog.id AND id_user = 1");
$query2 = $connect->query('SELECT id_message, text, name, location, image, id_dialog 
FROM user, user_dialog, dialog, messages 
WHERE messages.id = id_message 
  AND user.id = user_dialog.id_user 
  AND dialog.id = id_dialog 
  AND id_dialog 
          IN (SELECT id_dialog FROM user_dialog, user, dialog WHERE user.id = user_dialog.id_user AND id_dialog = dialog.id AND id_user = 1) AND id_user != 1');
$dialogs = $query->fetch_all(MYSQLI_ASSOC);
$lastMessages = [];
$i = 0;
foreach ($dialogs as $dialog) {
    $query3 = $connect->query("SELECT DISTINCT text, id_message, time FROM user_dialog, dialog, messages WHERE id_dialog = dialog.id AND id_message = messages.id AND id_dialog = {$dialog['id_dialog']} AND id_user != 1 ORDER BY id_message DESC LIMIT 1");
    $row = $query3->fetch_assoc();
    $lastMessages[$i]['text'] = $row['text'];
    $lastMessages[$i++]['time'] = $row['time'];
}
$i = 0;
while ($rowQuery2 = $query2->fetch_assoc()) {
    $dialogs[$i]['name'] = $rowQuery2['name'];
    $dialogs[$i]['image'] = $rowQuery2['image'];
    $dialogs[$i]['last_message'] = $lastMessages[$i]['text'];

    $date = Carbon::create($lastMessages[$i]['time']);
    $date->timezone('Europe/Moscow');
    $dialogs[$i]['time'] = $date->diffForHumans(null, null, true);
    $dialogs[$i++]['location'] = $rowQuery2['location'];
}
return $dialogs;