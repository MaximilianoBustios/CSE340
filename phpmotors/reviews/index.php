<?php
/*
* Reviews controller
*/

session_start();

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../library/functions.php';
require_once '../model/reviews-model.php';

$classifications = getClassifications();

$navList = createNavList($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
}

switch ($action){
    case 'add-review':
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW | FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_STRIP_BACKTICK | FILTER_FLAG_ENCODE_AMP);

        $clientId = validateInt($clientId);
        $invId = validateInt($invId);

        if(empty($reviewText)) {
            $_SESSION['reviewMessage'] = "<p class='error-message'>Please include something in the review field.</p>";
            header("Location: /CSE340/phpmotors/vehicles/?action=vehicle&invId=$invId");
            exit;
        }

        $reviewDate = time();

        $addReview = insertReview($reviewText, $reviewDate, $invId, $clientId);

        if ($addReview === 1) {
            $_SESSION['reviewMessage'] = "<p class='success-message'>Thank you for submitting a review! It is displayed below.</p>";
            header("Location: /CSE340/phpmotors/vehicles/?action=vehicle&invId=$invId");
            exit;
        }
        break;

    case 'edit-review':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $reviewId = validateInt($reviewId);
        if(empty($reviewId)) {
            header('Location: /CSE340/phpmotors/accounts/');
            exit;
        } 
        $review = getReviewById($reviewId);
        include '../view/review-update.php';
        break;

    case 'update-review': 
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW | FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_STRIP_BACKTICK | FILTER_FLAG_ENCODE_AMP);

        if(empty($reviewText)) {
            $_SESSION['reviewMessage'] = "<p class='error-message'>Please include something in the review field. If you'd like to delete this review, <a href='/phpmotors/reviews/?action=delete-review&reviewId=$reviewId'>click here</a>.</p>";
            header("Location: /CSE340/phpmotors/reviews/?action=edit-review&reviewId=$reviewId");
            exit;
        }

        $reviewUpdate = updateReview($reviewId, $reviewText);

        if($reviewUpdate === 1) {
            $_SESSION['message'] = "<p class='success-message'>Your review was updated successfully.</p>";
            header('Location: /CSE340/phpmotors/accounts/');
        } else {
            $_SESSION['reviewMessage'] = "<p class='error-message'>Error updating review. Please try again.</p>";
            header("Location: /CSE340/phpmotors/reviews/?action=edit-review&reviewId=$reviewId");
            exit;
        }
        break;
        
    case 'delete-review': 
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $reviewId = validateInt($reviewId);
        if(empty($reviewId)) {
            header('Location: /CSE340/phpmotors/accounts/');
            exit;
        } 
        $review = getReviewById($reviewId);
        include '../view/review-delete.php';
        break;
        
    case 'review-deleted':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

        $reviewDeleted = deleteReview($reviewId);
        
        if($reviewDeleted === 1) {
            $_SESSION['message'] = "<p class='success-message'>Review deleted successfully.</p>";
            header('Location: /CSE340/phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='error-message'>Unable to delete review. Please try again.</p>";
            header('Location: /CSE340/phpmotors/accounts/');
            exit;
        }
        break;

    default:
        header('Location: /CSE340/phpmotors/accounts/');
        break;
    }
?>