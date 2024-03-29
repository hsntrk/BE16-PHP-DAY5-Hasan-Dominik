<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row2 = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM `products` left JOIN suppliers ON products.fk_supplierId = suppliers.supplierId;";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr class ='align-middle'>
            <td class = 'text-center d-flex justify-content-center'><img class='img-thumbnail' style = 'width: 10rem' src='pictures/" . $row['picture'] . "'</td>
            <td class = 'text-center'>" . $row['name'] . "</td>
            <td class = 'text-center'>" .$row['sup_name']."</td>
            <td class = 'text-center'>" . "€". $row['price'] . "</td>
            <td class = 'text-center'><a class='btn btn-success' href='booking.php?id=" . $row['id'] . "'>Booking</a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row2['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row2['picture']; ?>" alt="<?php echo $row2['first_name']; ?>">
            <p class="text-white">Hi <?php echo $row2['first_name']; ?></p>
        </div>
        <a href="logout.php?logout" class="btn btn-danger">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-primary">Update your profile</a>
    </div>
    <p class='h2'>Hotelrooms</p>
        <table class='table table-hover'>
            <thead class='table-success'>
                <tr>
                    <th class = "text-center">Picture</th>
                    <th class = "text-center">Room</th>
                    <th class = "text-center">Supplier</th>
                    <th class = "text-center">Price</th>
                    <th class = "text-center">Booking</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
</body>
</html>