<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

Carbon::setLocale('ru');
require_once 'connect.php';
if (!empty($_GET['id_dialog'])) {
    $idDialog = $_GET['id_dialog'];
    $query = $connect->query("SELECT name, text, location, id_user, image, id_dialog, time
                            FROM user_dialog, user, messages, dialog 
                            WHERE id_user = user.id AND id_dialog = dialog.id AND id_message = messages.id AND id_dialog = {$idDialog} ORDER BY messages.time ");
    $currentMessages = $query->fetch_all(MYSQLI_ASSOC);
    $i = 0;
    while ($i < count($currentMessages)) {
        $date = Carbon::create($currentMessages[$i]['time']);
        $currentMessages[$i++]['time'] = $date->format('H:i');
    }
    return $currentMessages;
}
