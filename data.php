<?php
include_once "config.php";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn){
    throw new Exception('Connection failed');
}else{
    //echo mysqli_query($conn, "INSERT INTO tasks (task, date) VALUES ('Tomorrow will go to dhamaich', '2022-05-01')");
    // mysqli_query($conn, "DELETE FROM tasks WHERE id = 2");
    // $result = mysqli_query($conn, "SELECT * FROM tasks");
    // while($data = mysqli_fetch_assoc($result)){
    //     echo "<pre>";
    //     print_r($data);
    //     echo "</pre>";
    // }

    mysqli_close($conn);
}

// $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASWORD,DB_NAME);

// if(!$connection){
//     throw new Exception('Connection faild');
// }else{
//     echo "Connected succussfully" . "<br/>";

    //echo mysqli_query($connection, "INSERT INTO tasks (task, date) VALUES ('Another task','30-04-2022')");
    //$result = mysqli_query($connection, "SELECT * FROM tasks");
    // while($data = mysqli_fetch_assoc($result)){
    //     echo "<pre>";
    //     print_r($data);
    //     echo "</pre>";
    // }
    // mysqli_query($connection, "DELETE FROM tasks WHERE id = 6");

    // mysqli_close($connection);
// }