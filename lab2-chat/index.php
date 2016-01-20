<?php
    $dbConn = new PDO("mysql:host=159.203.233.236;dbname=info344chat", "info344student", "GoHawks123");
    $sql = "select * from message order by sent_timestamp desc";
    $stmt = $dbConn->prepare($sql);
    $success = $stmt->execute();
    if (!success) {
        var_dump($stmt->errorInfo());
        //trigger_error($stmt->errorInfo());
        return false;
    } else {
        $messages = $stmt->fetchAll();
    }

    if (count($_POST) > 0) {
        // $date = new DateTime();
        $timestamp = "too lazy";
        $sql2 = "insert into message (nickname, content, sent_timestamp) values (?, ?, now())";
        $stmt2 = $dbConn->prepare($sql2);
        $success2 = $stmt2->execute(array($_POST['nickname'], $_POST['message']));
        $_POST = array();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>344 Chat</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
<h1>INFO 344 Lab 2 Chat</h1>
<form action="" method="POST">
    <div class="form-group">
        <input type="text" 
            id="nicknameInp" 
            name="nickname"
            class="form-control" 
            placeholder="nickname"
            >
    </div>
    <div class="form-group">
        <input type="text" 
            id="messageInp" 
            name="message"
            class="form-control" 
            placeholder="message"
            >
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Send</button>
    </div>
</form>
<h2>Past Messages</h2>
<ul>
<?php
    foreach($messages as $message):
?>
    <li><?=$message['nickname'] ?> <?=$message['content'] ?> <?=$message['sent_timestamp'] ?></li>
<?php
    endforeach;
?>
</ul>


</body>
</html>