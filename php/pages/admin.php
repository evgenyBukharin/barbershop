<?php
    session_start();
    if ($_SESSION['role'] !== 'admin') {
        header('Location: /');
    }
?>

<?php require_once('../scripts/db.php'); ?>
<?php require_once('../header.php'); ?>
<?php require_once('modal.php'); ?>



<script src="/js/global.js"></script>
