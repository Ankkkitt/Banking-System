<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    thead{
            background: #4834d4;
            color: white;
        }
        tbody td{
            font-weight: 500;
        }
        .btn{
            background: #4834d4;
            color: white;
        }
        table{
            margin-top: 30px;
        }
    </style>
</head>
<body>

<?php 
    include 'connection.php';
    $sql = 'SELECT * FROM users';
    $res = mysqli_query($con, $sql);
?>
<?php include 'navbar.php'; ?>

<div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-3">ID</th>
                            <th scope="col" class="text-center py-3">Name</th>
                            <th scope="col" class="text-center py-3">E - Mail</th>
                            <th scope="col" class="text-center py-3">Balance</th>
                            <th scope="col" class="text-center py-3">Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                        <tr>
                            <td class="py-3 text-center"><?php echo $row['ID'] ?></td>
                            <td class="py-3 text-left"><?php echo $row['name']?></td>
                            <td class="py-3 text-left"><?php echo $row['email']?></td>
                            <td class="py-3 text-center">&#8377; <?php echo $row['balance']?></td>
                            <td class="py-2 text-center"><a href="userdetails.php?id= <?php echo $row['ID'];?>"> <button type="button" class="btn">Transact</button></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>


<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>