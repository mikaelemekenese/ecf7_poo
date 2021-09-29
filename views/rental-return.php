<?php 

require('../helpers/database.php');
require('../classes/CRUD.php');
require('../classes/film.php');
require('../classes/category.php');
require('../classes/actor.php');
require('../classes/rental.php');
require('../classes/store.php');
require('../classes/inventory.php');
require('../classes/customer.php');
require('../classes/staff.php');

?>

<style>
    select, .select { width: 100%; }
</style>

<?php include('../partials/header.php'); ?>

<div class="container is-max-desktop" style="margin-top:68px;">

    <br>

    <nav class="level" style="margin-bottom:0;">
        <div class="level-left">
            <div class="level-item">
                <a href="javascript:history.go(-1)" style="text-decoration:none;">
                    <button class="button is-rounded"><b>← Back</b></button>
                </a>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <h1 class="title is-centered"><span style="color:white;font-weight:bold;">Return the DVD</span></h1>
            </div>
        </div>
    </nav>

    <br>

    <form class="form is-light" method="POST" action="rental-create.php">
        <div class="field">
            <label class="label" style="color:white;">Rental Date</label>
            <div class="control">
                <input class="input" type="date" name="rental_date">
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Inventory</label>
            <div class="control">
                <input class="input" type="number" name="inventory_id" placeholder="Inventory">
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Customer</label>
            <div class="control">
                <input class="input" type="number" name="customer_id" placeholder="Customer">
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Rental Date</label>
            <div class="control">
                <input class="input" type="date" name="return_date">
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Staff</label>
            <div class="control">
                <input class="input" type="number" name="staff_id" placeholder="Staff">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Return the DVD</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </form>
</div>

<?php include('../partials/footer.php'); ?>