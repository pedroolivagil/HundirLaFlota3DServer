<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
if(strtolower($user) == 'oliva'){
    echo '{'
    .'"response":200,'
    . '"user" :{'
            .'"name":"'.$user.'",'
            .'"age":21'
        .'}'
    .'}';
}else{
    echo '{"response" : 404}';
}