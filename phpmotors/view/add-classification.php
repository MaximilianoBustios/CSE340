<?php
if ((!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) || ($_SESSION['clientData']['clientLevel'] < 2) ){
    //include '/CSE340/phpmotors/index.php';
    header('Location: /CSE340/phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Classification</title>
    <link rel="stylesheet" href="../css/styles.css" media="screen">
</head>
<body>
    <div class="body-container">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/header.php'?>
        </header>
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/nav.php'?>
        </nav>
        <main>
            <h2>Add Car Classification</h2>
            
            <!--This will display the $message value-->
            <?php if (isset($message)){ echo $message; } ?>

            <form method="post" action="/CSE340/phpmotors/vehicles/index.php" >
                <label for="classificationName">Classification Name</label><br>
                <span class="span-message">30 character maximum</span>
                <input type="text" id="classificationName" name="classificationName" maxlength="30" required><br><br>

                <input type="submit" name="submit" value="Add New Classification">
                <input type="hidden" name="action" value="add-new-classification">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
</body>
</html>