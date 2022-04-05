<?php
if ((!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) || ($_SESSION['clientData']['clientLevel'] < 2) ){
    //include '/CSE340/phpmotors/index.php';
    header('Location: /CSE340/phpmotors/');
    exit;
}
?>
<?php
$classificationList = '<select name="classificationId">';
foreach ($classifications as $classification){
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)){
        if ($classification['classificationId'] === $classificationId) {
            $clasifiList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Vehicle</title>
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
            <h2>Add Vehicle</h2>
            <p>*All Fields are Required</p>

            <!--This will display the $message value-->
            <?php if (isset($message)){ echo $message; } ?>

            <form method="post" action="/CSE340/phpmotors/vehicles/index.php">
                <?php echo $classificationList; ?>
                <br><br>
                <label for="invMake">Make</label><br>
                <input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required><br><br>

                <label for="invModel">Model</label><br>
                <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required><br><br>

                <label for="invDescription">Description</label><br>
                <input type="text" id="invDescription" name="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";}  ?> required><br><br>

                <label for="invImage">Image Path</label><br>
                <input type="text" id="invImage" name="invImage" value="/CSE340/phpmotors/images/vehicles/"  required><br><br>

                <label for="invThumbnail">Thumbnail Path</label><br>
                <input type="text" id="invThumbnail" name="invThumbnail" value="/CSE340/phpmotors/images/vehicles/"  required><br><br>

                <label for="invPrice">Price</label><br>
                <input type="text" id="invPrice" name="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required><br><br>

                <label for="invStock"># In Stock</label><br>
                <input type="text" id="invStock" name="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required><br><br>

                <label for="invColor">Color</label><br>
                <input type="text" id="invColor" name="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required><br><br>

                <input type="submit" name ="submit" value="Add New Vehicle">
                <input type="hidden" name="action" value="add-new-vehicle">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
</body>
</html>