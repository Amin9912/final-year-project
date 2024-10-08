<?php
include "../navigation.php";
include "../mohazDatabase.php";

/*echo '<pre>';
echo 'GET Data';
print_r($_GET);
echo 'POST Data';
print_r($_POST);
echo '</pre>';*/

// Update payment status in the database
$status_id = $_GET['status_id'];
$billcode = $_GET['billcode'];

$orderStatusPayment = updateOrderStatus($status_id);

$sqlInsertQuery = "UPDATE `order_item` SET `orderStatusPayment`='$orderStatusPayment' WHERE `billcode`='$billcode'";
$res = mysqli_query($conn, $sqlInsertQuery);

if ($res) {
    ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Your order has been <?php echo $orderStatusPayment; ?>!',
            text: 'You are now being redirected to the My Order page',
            showConfirmButton: false,
            timer: 2000 // Show the success message for 2 seconds
        }).then(function() {
            window.location.replace("../myOrder");
        });
    </script>
    <?php
    exit;
} else {
    ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'warning',
            title: 'An error has occurred!',
            text: 'You are now being redirected to the My Order page',
            showConfirmButton: false,
            timer: 2000 // Show the success message for 2 seconds
        }).then(function() {
            window.location.replace("../myOrder");
        });
    </script>
    <?php
    exit;
}

function updateOrderStatus($status_id)
{
    $statusDefault = "";

    if ($status_id == 1) {
        $statusDefault = "PAID";
    } elseif ($status_id == 2) {
        $statusDefault = "PENDING";
    } elseif ($status_id == 3) {
        $statusDefault = "FAIL";
    }

    return $statusDefault;
}
?>
