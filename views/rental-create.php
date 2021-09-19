<?php 

require('../helpers/database.php');
require('../classes/CRUD.php');
require('../classes/film.php');
require('../classes/category.php');
require('../classes/actor.php');
require('../classes/rental.php');
require('../classes/store.php');

?>

<?php include('../partials/header.php'); ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rental = new Rental([
            'rental_date' => $_POST['rental_date'],
            'inventory_id' => $_POST['inventory_id'],
            'customer_id' -> $_POST['customer_id'],
            'return_date' => $_POST['return_date'],
            'staff_id' => $_POST['staff_id'],
        ]);

        header('Location: ./rentals.php');
        exit();
    }
?>

<form method="POST" action="">
    <input type="date" name="rental_date">
    <input type="number" name="inventory_id" placeholder="Inventory">
    <input type="number" name="customer_id" placeholder="Customer">
    <input type="date" name="return_date">
    <input type="number" name="staff_id" placeholder="Staff">
    <input type="submit" value="Create the rental">
</form>

<?php include('../partials/footer.php'); ?>