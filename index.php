<?php
    include_once "config.php";
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$conn){
        throw Exception("Connection faild");
    }
    $query = "SELECT * FROM ".DB_TABLE." WHERE complete = 0 ORDER BY date";
    $result = mysqli_query($conn, $query);

    $completeTaskQuery = "SELECT * FROM ".DB_TABLE." WHERE complete = 1 ORDER BY date";
    $cresult = mysqli_query($conn, $completeTaskQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>PHP First Project</title>
</head>
<div class="container">
    <div class="row">
        <div class="column-60 column-offset-20">
            <h1>Task Manager</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus, quaerat.</p>
            <div class="task-wrapper">
                <?php
                    if(mysqli_num_rows($cresult) > 0){
                        ?>
                        <h3>Completed tasks</h3>
                        <table>
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Task</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <?php
                             while($cdata = mysqli_fetch_assoc($cresult)): 
                             $timestamp = strtotime($cdata['date']);
                             $cdate = date("jS M, Y", $timestamp);
                             ?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $cdata['id']; ?>"></td>
                                <td><?php echo $cdata['id']; ?></td>
                                <td><?php echo $cdata['task']; ?></td>
                                <td><?php echo $cdate; ?></td>
                                <td><a href="#" class="delete" data-dtaskid="<?php echo $cdata['id']; ?>">Delete</a> | <a href="#" class="incomplete" data-itaskid="<?php echo $cdata['id']; ?>">Incomplete</a></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        <?php
                    }
                ?>

                <h3>Upcomming Tasks</h3>
                <?php
                if(mysqli_num_rows($result) == 0){
                    echo "<b>No result found</b>";
                }else{
                    ?>
                    <table>
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Task</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <?php
                             while($data = mysqli_fetch_assoc($result)): 
                             $timestamp = strtotime($data['date']);
                             $date = date("jS M, Y", $timestamp);
                             ?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $data['id']; ?>"></td>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['task']; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><a href="#" class="delete" data-dtaskid="<?php echo $data['id']; ?>">Delete</a> | <a href="#" class="complete" data-taskid="<?php echo $data['id']; ?>"><span>Complete</span></a></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        <select name="" id="">
                            <option value="">select with</option>
                            <option value="">All</option>
                            <option value="">Completed</option>
                            <option value="">Incomplete</option>
                        </select>
                        <button>submit</button>
                    <?php
                }
                ?>
            </div>
            <div class="add-task-wrapper" style="margin-top:15px;">
                <h3>Add Tasks</h3>
                <form method="post" action="add_task.php">
                    <label for="task">Task</label>
                    <input type="text" id="task" name="task" placeholder="Task Details">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" placeholder="Task Date">
                    <button>add task</button>
                    <input type="hidden" name="action" value="add">
                </form>
            </div>
        </div>
    </div>
</div>
<form action="add_task.php" method="post" id="completeTask">
    <input type="hidden" id="caction" name="action" value="complete">
    <input type="hidden" id="taskid" name="taskid">
</form>
<form action="add_task.php" method="post" id="incompleteTask">
    <input type="hidden" name="action" value="incomplete">
    <input type="hidden" id="iTaskId" name="iTaskId">
</form>
<form action="add_task.php" method="post" id="deleteTask">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" id="dTaskId" name="dTaskId">
</form>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script>
    ;(function($){
        $(document).ready(function(){
            $(".complete").on("click",function(){
                var id = $(this).data("taskid");
                $("#taskid").val(id);
                $("#completeTask").submit();
            });
            $(".incomplete").on("click", function(){
                var id = $(this).data("itaskid");
                $("#iTaskId").val(id);
                $("#incompleteTask").submit();
            });
            $(".delete").on("click", function(){
                var id = $(this).data("dtaskid");
                if(confirm('Are you sure to delete')){
                    $("#dTaskId").val(id);
                    $("#deleteTask").submit();
                }
            })
        })
    })(jQuery);
</script>
</body>
</html>