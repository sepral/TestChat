<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col col-4">
            <div class="dialogBlock" id="dialogMobile">
                <?php
                $messages = require_once 'getMessages.php';
                ?>
                <?php $dialogs = require_once 'getDialogs.php'; ?>
                <?php
                foreach ($dialogs as $dialog) {
                    if (!empty($_GET['id_dialog'])) {
                        if ($_GET['id_dialog'] == $dialog['id_dialog']) {
                            $imageInfo = $dialog['image'];
                            $locationInfo = $dialog['location'];
                            $nameInfo = $dialog['name'];
                        }
                    }
                    ?>
                    <a href="?id_dialog=<?php echo $dialog['id_dialog'] ?>">
                        <div>
                            <div class="user"><img src="<?php echo $dialog['image'] ?>" alt="" id="">
                                <p style="margin-top: -50px; margin-left: 67px; color: white; font-weight: 500"><?php echo $dialog['name'] ?></p>
                                <p class="LastMessageDialog"><?php echo mb_substr($dialog['last_message'], 0,
                                            20) . '...'; ?></p>
                                <p class="timeDialogMessage"><?php echo $dialog['time'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col">
            <div class="infoBlock">
                <?php if (!empty($_GET['id_dialog'])) { ?>
                    <div class="userInfo"><img src="<?php echo $imageInfo ?>" alt="">
                        <p style="margin-top: -50px; margin-left: 67px; color: black; font-weight: 500"><?php echo $nameInfo ?></p>
                        <p style="margin-top: -14px; margin-left: 67px; color: black;"><?php echo $locationInfo ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col">
            <div class="chatBlock" id="collectMessages">
                <?php if (!empty($_GET['id_dialog'])) { ?>
                    <?php foreach ($messages as $message) { ?>
                        <?php
                        if ($message['id_user'] == 1) {
                            echo "         
                                    <div class='MessageRight'><img src='img/cat1.png'><p>{$message['text']} <span>{$message['time']}</span></p></div>
                                ";
                        } else {
                            echo "  
                                    <div class='MessageLeft'><img src='{$message['image']}'><p><span>{$message['time']}</span> &nbsp; {$message['text']}</p></div>
                                ";
                        }
                        ?>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col">
            <div class="sendBlock" id="sendToBase">
                <form method="post" action="sendMessage.php">
                    <div><input type="image" image src="img/button.png" alt="1" class="submitButton"/>
                        <input type="text" name="textMessage" class="messageInput" placeholder="Введите ваше сообщение">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="js/mobileFunctions.js"></script>
</body>
</html>