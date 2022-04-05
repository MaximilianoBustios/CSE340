<div class="logo">
    <img src="/CSE340/phpmotors/images/site/logo.png" alt="Logo">
</div>
<div class="account">
    <div class="welcome">
        <?php  
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                echo "<span><a class='name-link' href='/CSE340/phpmotors/accounts/'>". $_SESSION['clientData']['clientFirstname']." |</a></span>";
                echo "<a class='logout-link' href='/CSE340/phpmotors/accounts/index.php?action=logout'>Logout</a>";
            } else {
                echo "<a class='name-link' href='/CSE340/phpmotors/accounts/index.php?action=login'>My Account</a>";

            }
        ?>
    </div>
</div>
