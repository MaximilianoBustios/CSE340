<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Error</title>
    <link rel="stylesheet" href="../css/styles.css " media="screen">
</head>
<body>
    <div class="body-container">
        <!--Aca deberian ir los snippets header y nav pero los saque por que no creo que
        tenga sentido tener problemas con el servidor y ofrecer las funcionalidades
        que el header y el nav contienen. De hecho estas interactuan con el servidor por el MVC
        por lo que si no anda el servidor estas tampoco.-->
        <main>
            <h2>Server Error</h2>
            <p>Sorry our servers seems to be experiecing some technical difficulties.</p>
        </main>  
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
    
</body>
</html>
