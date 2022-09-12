<?php
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
    if((!empty($_POST['name']))&&(!empty($_POST['loan-amount']))&&(!empty($_POST['number-of-years']))){
        if($_POST['number-of-years']<=3){
            $interest=($_POST['loan-amount']*(10 * $_POST['number-of-years']))/100;
        }else{
            $interest=($_POST['loan-amount']*(15 * $_POST['number-of-years']))/100;
        }
        $months=$_POST['number-of-years'] * 12 ;
        $loanAfterInterest= ($_POST['loan-amount'] + $interest);
        $monthly= $loanAfterInterest / $months;
    }else{
        $errorMessage="You have to Enter the Inputs";
    }

}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-image: url('./images/bank.webp');
        }

        form {
            background-image: url('./images/2.jpg');
        }
    </style>
</head>

<body>





    <div class="container my-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="" class="form card p-4" method="post">
                    <label for="name" class="form-label text-primary fs-5 fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
                        value="<?=$_POST['name']??""?>">
                    <label for="loan" class="form-label text-primary fs-5 fw-bold">Loan Amount</label>
                    <input type="number" class="form-control" name="loan-amount" id="loan" value="<?=$_POST['loan-amount']??""?>">
                    <label for=" no-years" class="form-label text-primary fs-5 fw-bold">Number of Years</label>
                    <input type="number" class="form-control" name="number-of-years" id="no-years"value="<?=$_POST['number-of-years']??""?>">
                    <small id="emailHelpId" class="form-text text-danger fs-6 fw-bold"><?=$errorMessage??""?></small>
                    <button type="submit" class="btn btn-primary mt-4">Calculate</button>
                </form>
            </div>
        </div>
        <?php if(isset($interest)&&isset($months)){
            ?>
        <div class="container">
            <div class="row my-2">
                <div class="col-6 offset-3  alert alert-success p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-primary" scope="col">User Name</div>
                        <div class="text-primary" scope="col">Interest Rate</div>
                        <div class="text-primary" scope="col">Loan After Interest</div>
                        <div class="text-primary" scope="col">Monthly</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div><?=$_POST['name']??""?></div>
                        <div><?=$interest??""?></div>
                        <div><?=$loanAfterInterest??""?></div>
                        <div><?=$monthly??""?></div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>
</body>

</html>