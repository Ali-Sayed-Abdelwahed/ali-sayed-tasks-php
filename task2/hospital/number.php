<?php
$title = 'Number Page';

include './layouts/header.php';
include("middlewares/auth.php");
include './layouts/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST) {
    if (!empty($_POST['mobile-number'])) {
        if (strlen($_POST['mobile-number']) == 11) {
            $_SESSION['number'] = $_POST['mobile-number'];
            header('location:review.php');
            die;
        } else {
            $messageError = "The Mobile Number Must be 11 Digit!";
        }
    } else {
        $messageError = "You have to Enter Your Mobile Number!";
    }
}
?>

<main style="background-image: url('images/1.jpg'); height: 500px; background-position: center;
        background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5">
        <h3 class=" text-primary">Welcome to NTI Hospitals!</h3>
        <p class="mb-5">Please Enter Your Mobile Number</p>
        <div class="card w-50 m-auto p-3" style="background-color:transparent;border-color:#5f93ad;">
            <form action="" method="post">
                <div class="my-2 text-center">
                    <label for="mNumber" class="form-label text-primary h4">Mobile Number</label>
                    <input type="number" class="form-control" name="mobile-number" id="mNumber" value="<?= $_POST['mobile-number'] ?? "" ?>">
                    <small id="emailHelpId" class="fs-5 fw-bold text-danger"><?= $messageError ?? "" ?></small>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary w-25 my-2">Confirm</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php
include './layouts/footer.php';
include './layouts/scripts.php';

?>