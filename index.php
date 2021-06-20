<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Bank</title>
    <link rel="stylesheet" href="./CSS/stle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="row">
        <div class="col">
            <div class="img">
                <img src="./images/main_content.svg" alt="image">
            </div> 
            <div class="content">
                <h2 class="mt3">Get the access of your account
                    now in the comfort of your home
                </h2>
                <p class="mt-3">No more waiting in the long queues ,transfer the money very conveniently with the help
                   of our Sparks Bank System , a digital wallet platform and online payment system developed 
                   to power in-app, online, and in-person contactless transactions with mobile phones.
                </p>
                <button class="button mt-4"><a href="users.php" >View Users</a></button>
            </div>
        </div>
    </div>

    <div class="feature_row ">
        <h2 class="text-center pb-1">Our Features</h2>
        <div class="feature_col">
            <div class="features">
                <img src="./images/customers.svg" alt="image">
                <p class="text-center">View Users</p>
                <button class="button mt-4"><a href="users.php">View Users</a> </button>
            </div> 
            <div class="features">
                <img src="./images/Customer.svg" alt="image">
                <p class="text-center mt-1">Make a transaction</p>
                <button class="button mt-4"><a href="transaction.php">Transaction</a></button>
            </div> 
            <div class="features">
                <img src="./images/transaction.svg" alt="image">
                <p class="text-center mt-1">View transaction history</p>
                <button class="button mt-4"><a href="transaction_history.php" >Transact History</a></button>
            </div> 
           
        </div>
    </div>

    </div>

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>