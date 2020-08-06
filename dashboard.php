<?php
require 'database.php';
include('session.php');
$errors = "";
$result = $conn->prepare("SELECT content, id FROM todoListItems WHERE (userId = $user_check)");
$result->execute();

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO todoListItems (userId, content) values ($user_check, :input_text)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':input_text', $_POST['input_text']);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}

if (isset($_GET['complete_task'])) {
    $sql = "UPDATE todoListItems SET inprogress = 0 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['complete_task']);
    $stmt->execute();
}

if (isset($_GET['uncomplete_task'])) {
    $sql = "UPDATE todoListItems SET inprogress = 1 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['uncomplete_task']);
    $stmt->execute();
}

if($_GET['del']) {
    $sql = "DELETE FROM todoListItems WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['del']);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Focus</title>
    <meta charset="utf-8">
    <meta name="Joseph Wright" content="Stoic inspired to-do list application.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
    <script defer src="js.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.14.0-web 2/css/all.css">
</head>
<body>
    <h1 class="title" id="title"></h1>
    <div class="to-do-list">
        <div class="to-do-header">
            <h2 class="header"><em>Make It Happen</em></h2>
            <div class="tick-mark"></div>
            <form action="logout.php" method="post" id="new-task-form">
                <button id="submit_button" type="submit" name="submit">Logout</button>
            </form>
        </div>
        <div class="enter-task">
            <form action="dashboard.php" method="post" id="new-task-form">
                <input type="text" id="task-input" name="input_text" class="new-task" placeholder="Add a task" aria-label="Add a task">
                <button type="submit" name="submit" class="new-task-button" aira-label="Create new task">+</button>
            </form>
        </div>
        <div class="to-do-body" id="task_body">
            <?php
                require 'database.php';
                include('session.php');
                $result = $conn->prepare("SELECT content, id FROM todoListItems WHERE (userId = $user_check) && inprogress = '1'");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){?>

                <form id="complete-task-form" action="dashboard.php?complete_task=<?php echo $row['id'];?>" method="post"></form>
                <form action="dashboard.php?delete_task=<?php echo $row['id'];?>" method="post"></form>

                <div class="task">
                    <input type="checkbox" id="<?php echo $row['id'];?>"></input>
                    <label for="<?php echo $row['id']?>">
                        <span class="custom-checkbox"></span>
                        <?php echo $row['content'];?>
                    </label>
                    <i id="trash" type="button" class="fas fa-trash" style="cursor: pointer" onclick="return Deleteqry(<?php echo $row[id]; ?>);"></i>
                </div>


            <?php $i++; } ?>
        </div>
        <div class="completed-task-accordion">
            <p id="completed-task-header" class="accordion-btn">Completed Tasks<i id="arrow" class="fas fa-angle-up"></i></p>
            <div id="completed-task-body" class="accordion-body">
                <?php
                    require 'database.php';
                    include('session.php');
                    $result = $conn->prepare("SELECT content, id FROM todoListItems WHERE (userId = $user_check) && inprogress = '0'");
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){?>
                    <!-- // query and display all in progress tasks, receive a click on a task and fire a form submission, should change value of in progress in DB -->

                    <form action="dashboard.php?uncomplete_task=<?php echo $row['id'];?>" method="post">
                        <div class="task">
                            <input type="checkbox" id="<?php echo $row['id'];?>" checked></input>
                            <label for="<?php echo $row['id']?>">
                                <span class="custom-checkbox"></span>
                                <?php echo $row['content'];?>
                            </label>
                            <i id="trash" type="button" class="fas fa-trash" style="cursor: pointer" onclick="return Deleteqry(<?php echo $row[id]; ?>);"></i>
                        </div>
                    </form>

                <?php $i++; } ?>
            </div>
        </div>
    </div>
</body>
</html>