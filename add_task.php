<?php
include_once "config.php";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn){
    throw new Exception('Connection failed');
}else{
    $action = $_POST['action'] ?? '';
    if(!$action){
        header('Location: index.php');
        die();
    }else{
        if('add' == $action){
            $task = $_POST['task'];
            $date = $_POST['date'];
            
            if($task && $date){
                $query = "INSERT INTO ".DB_TABLE." (task, date) VALUES ('{$task}', '{$date}')";
                 //echo $query;
                mysqli_query($conn, $query);
                header('Location: index.php?added=true');
            }else{
                header('Location: index.php');
                die();
            }
        }else if('complete' == $action){
            $taskid = $_POST['taskid'];
            if($taskid){
                $cquery = "UPDATE tasks SET complete=1 WHERE id = {$taskid} LIMIT 1";
                mysqli_query($conn, $cquery);
            }
            header('Location: index.php');
        }else if('incomplete' == $action){
            $iTaskId = $_POST['iTaskId'];
            if($iTaskId){
                $iQuery = "UPDATE tasks SET complete = 0 WHERE id = $iTaskId LIMIT 1";
                mysqli_query($conn, $iQuery);
            }
            header("Location: index.php");
        }else if('delete' == $action){
            $dTaskId = $_POST['dTaskId'];
            if($dTaskId){
                $iQuery = "DELETE FROM tasks WHERE id = $dTaskId LIMIT 1";
                mysqli_query($conn, $iQuery);
            }
            header("Location: index.php");
        }
    }
}