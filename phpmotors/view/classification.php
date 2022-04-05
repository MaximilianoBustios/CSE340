<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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
            <h1><?php echo $classificationName; ?> vehicles</h1>
            
            <?php if(isset($message)){
                echo $message; }
            ?>

            <?php 
                if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;
                }
            ?>




        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
</body>
</html>
