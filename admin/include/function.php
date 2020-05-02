<?php

function user_online(){
    global $dbconn;
    $session = session_id();
    $time = time();
    $timeOutInSeconds = 60;
    $timeOut = $time - $timeOutInSeconds;
    $usersOnline = mysqli_query($dbconn,"SELECT * FROM users_online WHERE session = '$session'");
    $countUsers = mysqli_fetch_assoc($usersOnline);
    $countUsers = mysqli_num_rows($usersOnline);
    if ($countUsers == 0) {
        $insertUser = mysqli_query($dbconn,"INSERT INTO users_online(session,date) VALUES('$session','$time')");
    }else {
        $updatetUser = mysqli_query($dbconn,"UPDATE users_online SET date = '$time' WHERE session = '$session'");
    }
    $usersOnlineQuery = mysqli_query($dbconn,"SELECT * FROM users_online WHERE date > '$timeOut'");
    return $countOnlineUsers = mysqli_num_rows($usersOnlineQuery);
}

