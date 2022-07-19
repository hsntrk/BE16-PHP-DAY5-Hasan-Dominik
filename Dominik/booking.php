<?php
session_start();


if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require_once "components/db_connect.php";


if (isset($_POST["submit"])) {
    $room_id = $_GET["id"];
    $user_id = $_SESSION["user"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];

    $sql = "INSERT INTO book_room (fk_user_id, fk_product_id, booking_date_start, booking_date_end) VALUES ($user_id, $room_id, '$date_start', '$date_end' )";
    // $sql2 = "UPDATE products set status = 'reserved' WHERE id = $room_id";
    // $result2 = mysqli_query($connect, $sql2);
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "Success";
        mysqli_close($connect);
        header("refresh:3; url= home.php");
    } else {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <p>Booking start</p>
        <input type="date" name="date_start">
        <p>Booking end</p>
        <input type="date" name="date_end">
        <input type="submit" name="submit">
    </form>
</body>

</html>