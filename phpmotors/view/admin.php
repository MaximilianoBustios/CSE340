<?php
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
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
    <title>Admin</title>
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
            <h2>Admin User: 
                <?php 
                    echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'];
                ?>
            </h2>

            <?php
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                }
                if (isset($message)) {
                    echo $message;
                }
                unset($_SESSION['message']);
            ?>

            <p>You are logged in.</p>
            <ul>
                <li><span class="label">First Name:</span> <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li><span class="label">Last Name:</span> <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li><span class="label">Email:</span> <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>

            <h2>Account Management</h2>
            <p>
                Use this link to update your info account: <a class="link" href='/CSE340/phpmotors/accounts/index.php?action=update-account'>Update Account Information</a>
            </p>

            <?php
                if($_SESSION['clientData']['clientLevel'] > 1) {
                    echo "
                        <h2>Inventory Management</h2>
                        <p>
                            Use this link to manage the inventory: <a class='link' href='/CSE340/phpmotors/vehicles/'>Vehicle Management</a>
                        </p>
                        "; 
                }

                $clientReviews = getReviewsByClientId($_SESSION['clientData']['clientId']);
                if($clientReviews) {
                    echo "<h2>Your Reviews</h2>";
                    $reviews = buildClientReviewsList($clientReviews);
                    echo $reviews;
                }
            ?>
        </main>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
</body>
</html>
