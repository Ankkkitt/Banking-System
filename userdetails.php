<?php
    include 'connection.php';

    if(isset($_POST['submit'])){

        $sender = $_GET['id'];                // id from which amount is send getting from url
        $receiver = $_POST['to'];             // id to whom amount is send 
        $amount = $_POST['amount'];           // amount send

        $sender_sql = " SELECT * FROM users WHERE ID='$sender' ";
        $sender_query = mysqli_query($con, $sender_sql);
        $sender_result = mysqli_fetch_assoc($sender_query);      // returns all the data of the sender in array format.

        $receiver_sql = " SELECT * FROM users WHERE ID='$receiver' ";
        $receiver_query = mysqli_query($con, $receiver_sql);     // returns all the data of the sender in array format.
        $receiver_result = mysqli_fetch_assoc($receiver_query);

        // checking whether amount enter by user is negative
        if( $amount < 0){
            ?>
            <script>
                alert("Sorry! Negative values cannot be transferred.\nEnter amount which is greater than zero.")
            </script>
            <?php
        }

        // condition to check insufficient balance 
        else if( $amount > $sender_result['balance']){
            ?>
            <script>
                alert("Insufficient balance !!")
            </script>
            <?php
        }

        //  condition to check zero balance
        else if( $amount == 0){
            ?>
            <script>
                alert("Amount cannot be a zero value.\nEnter amount which is greater than zero")
            </script>
            <?php
        }

        else{
            // Updating balance from sender's account
            $newBalance = $sender_result['balance'] - $amount;
            $sender_sql = "UPDATE users SET balance='$newBalance' WHERE ID='$sender' ";
            mysqli_query($con, $sender_sql);

            // Updating balance from receiver's account
            $newBalance = $receiver_result['balance'] + $amount;
            $receiver_sql = "UPDATE users SET balance='$newBalance' WHERE ID='$receiver' ";
            mysqli_query($con, $receiver_sql);

            $sender_name = $sender_result['name'];
            $receiver_name  = $receiver_result['name'];
            $sql = "INSERT INTO transaction_history(`sender`, `receiver`, `amount`) VALUES ('$sender_name','$receiver_name','$amount')";
            $final_query = mysqli_query($con, $sql);

            if($final_query){
                ?>
                <script>
                  alert("Hurray !! 🤩\nAmount has been successfully transeferred. ");
                  window.location.href='transaction_history.php';
                </script>
                <?php
            }
            $newBalance = 0;
            $amount = 0;
        }

        

        
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Bank</title>
    <!-- <link rel="stylesheet" href="./CSS/stle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    thead{
            background: #4834d4;
            color: white;
        }
        tbody td{
            font-weight: 500;
        }
        label{
            font-weight: 500;
            letter-spacing: 1px;
        }
        .container{
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            margin-top: 15px;
            padding-bottom: 15px;
            max-width: 600px;
            height: 530px;
        }
        .card{
           /* border: 1px solid black; */
           border: none;
        }
        input, select{
            padding: 10px;
            font-size: 1.5rem;
            border: .1rem solid rgba(0, 0, 0, 0.3);
            border-radius: .5rem;
        }
        .btn{
            padding: 10px;
            background: #4834d4;
            color: white;
            width: 100px;
            letter-spacing: 1px;
            position: fixed;
            left: 46%;
        }
        .btn:hover{
            color: white;

        }
        
    </style>
</head>
<body>
<?php 
    include 'navbar.php' ;
    include 'connection.php';
?>

<div class="container">  
            <?php

                $sid = $_GET['id'];
                $sql = "SELECT * FROM users WHERE ID=$sid ";
                $res = mysqli_query($con, $sql);
                if(!$res){
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $row=mysqli_fetch_assoc($res);
                
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div>
                <table class="table table-striped table-condensed table-bordered">
                <thead>    
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Balance</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="py-3 text-center"><?php echo $row['ID'] ?></td>
                    <td class="py-3"><?php echo $row['name'] ?></td>
                    <td class="py-3"><?php echo $row['email'] ?></td>
                    <td class="py-3">&#8377; <?php echo $row['balance'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <div class="card mx-auto">
        <label class="text-center my-2 ">Transfer To :</label>
        <select name="to" required class="mx-3">
            <option value="" disabled selected>Choose</option>
            <?php
                $sid = $_GET['id'];
                $sql = "SELECT * FROM users WHERE ID!=$sid ";
                $res = mysqli_query($con, $sql);
                if(!$res){
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option class="table" value="<?php echo $row['ID'];?>" >
                        <?php echo $row['name'] ;?> (Balance: &#8377;<?php echo $row['balance'] ;?>) 
                    </option>
                    <?php
                }
            ?>
            
         </select>
                <label class="text-center my-2">Amount :</label>
                <input type="number" name="amount" required class="mx-3">   
                <br><br>
                <div>
                <button class="btn d-flex justify-content-center" name="submit" type="submit" id="myBtn"><span>Transfer</span> </button>
            </div>
        </form>
    </div>
</div>


<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>