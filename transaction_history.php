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
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead class="bg-liht">
            <tr>
                <th class="py-3 text-center">S.No.</th>
                <th class="py-3 text-center">SENDER</th>
                <th class="py-3 text-center">RECEIVER</th>
                <th class="py-3 text-center">AMOUNT</th>
                <th class="py-3 text-center">DATE & TIME</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'connection.php';
            $sql ="select * from transaction_history";
            $query =mysqli_query($con, $sql);
            while($rows = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
            <td class="py-3 text-center"><?php echo $rows['no']; ?></td>
            <td class="py-3 text-left"><?php echo $rows['sender']; ?></td>
            <td class="py-3 text-left"><?php echo $rows['receiver']; ?></td>
            <td class="py-3 text-left">&#8377;<?php echo $rows['amount']; ?> </td>
            <td class="py-3 text-center"><?php echo $rows['time']; ?> </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    </div>
</div>

<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>