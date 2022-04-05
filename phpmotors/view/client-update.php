<?php
    // Store client data into new variable
    if(isset($_SESSION['clientData'])) {
        $clientData = $_SESSION['clientData'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Update</title>
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
            <h2>Manage Account</h2>
            <hr>
            <section class="account-section">
                <h3>Update Account</h3>
                <?php
                    if (isset($_SESSION['accountMessage'])) {
                        $accountMessage = $_SESSION['accountMessage'];
                        unset($_SESSION['accountMessage']);
                    }
                    if (isset($accountMessage)) {
                        echo $accountMessage;
                    }
                ?>
                <form method="post" action="/CSE340/phpmotors/accounts/index.php">
                    <label for="clientFirstname">First Name:</label><br>
                    <input type="text" id="clientFirstname" name="clientFirstname" required
                        <?php 
                            if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($clientData['clientFirstname'])) {echo "value='$clientData[clientFirstname]'"; } 
                        ?>
                    ><br><br>
                    
                    <label for="clientLastname">Last Name:</label><br>
                    <input type="text" id="clientLastname" name="clientLastname" required
                        <?php 
                            if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($clientData['clientLastname'])) {echo "value='$clientData[clientLastname]'"; }
                        ?> 
                    ><br><br>
            
                    <label for="clientEmail">Email:</label><br>
                    <input type="email" id="clientEmail" name="clientEmail" required pattern="[\w\\.\+_-*]+@[\w]+\.[\w]{2,4}"
                        <?php 
                            if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($clientData['clientEmail'])) {echo "value='$clientData[clientEmail]'"; } 
                        ?> 
                    ><br><br>
            
                    <input type="submit" name="submit" value="Update Account">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="update-account-info">
                    <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                </form>                
            </section>
            
            <hr>

            <section class="password-section">
                <h3>Update Password</h3>
                <?php
                    if (isset($_SESSION['passwordMessage'])) {
                        $passwordMessage = $_SESSION['passwordMessage'];
                        unset($_SESSION['mpasswordMssage']);
                    }
                    if (isset($passwordMessage)) {
                        echo $passwordMessage;
                    }
                ?>
                <form method="post" action="/CSE340/phpmotors/accounts/index.php">
                    <label for="clientPassword">New Password:</label><br>
                    <input type="password" id="clientPassword" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                    <span>Submitting this form will change the password for your account. New password must be at least 8 characters and contain at least 1 number, 1 capitalletter, and 1 special character.</span><br><br>

                    <input type="submit" name="submit" value="Update Password">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="update-password">
                    <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                </form>
            </section>
            
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/CSE340/phpmotors/snippets/footer.php'?>
        </footer>
    </div>
</body>
</html>
