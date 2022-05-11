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
        }else if("bulkComplete" == $action){
            $bcTaskIds = $_POST['taskIds'];
            $_bcTaskIds = join(',', $bcTaskIds);
            if($_bcTaskIds){
                $bcQuery = "UPDATE tasks SET complete = 1 WHERE id IN ($_bcTaskIds)";
                mysqli_query($conn, $bcQuery);
            }
            header("location: index.php");
        }else if("bulkIncomplete" == $action){
            $bicTaskIds = $_POST['taskIds'];
            $_bicTaskIds = join(",", $bicTaskIds);
            if($_bicTaskIds){
                $bicQuery = "UPDATE tasks SET complete = 0 WHERE id IN ($_bicTaskIds)";
                mysqli_query($conn, $bicQuery);
            }
            header("Location: index.php");
        }else if("bulkDelete" == $action){
            $bdTaskIds = $_POST['taskIds'];
            $_bdTaskIds = join(",", $bdTaskIds);
            if($_bdTaskIds){
                $bdQuery = "DELETE FROM tasks WHERE id IN ($_bdTaskIds)";
                mysqli_query($conn, $bdQuery);
            }
            header("Location: index.php");
        }
    }
}