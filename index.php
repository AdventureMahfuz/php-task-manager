<?php
include_once "data.php";
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
                <h3>All Tasks</h3>
                <form action="">
                    <table>
                        <tr>
                            <th></th>
                            <th>id</th>
                            <th>Task</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>Bring medicine for dad</td>
                            <td>28 april, 2022</td>
                            <td><span>Delete</span> | <span>Edit</span> | <span>Complete</span></td>
                        </tr>
                        
                    </table>
                </form>
                <select name="" id="">
                    <option value="">select with</option>
                    <option value="">All</option>
                    <option value="">Completed</option>
                    <option value="">Incomplete</option>
                </select>
                <button>submit</button>
            </div>
            <div class="add-task-wrapper" style="margin-top:15px;">
                <h3>Add Tasks</h3>
                <form action="">
                    <label for="task">Task</label>
                    <input type="text" id="task" placeholder="Task Details">
                    <label for="date">Date</label>
                    <input type="text" id="date" placeholder="Task Date">
                    <button>add task</button>
                </form>
            </div>
        </div>
    </div>
</div>
<body>

</body>

</html>