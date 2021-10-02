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

<?php

    $rentalCreate = new Rental();
    if (isset($_POST['submit'])) {
        $rentalCreate->store();
        echo    "<div class='container'>
                    <div class='notification is-success' style='margin-top:68px;'>
                        <button class='delete'></button>
                        <h5>New rental successfully created !</h5>
                    </div>
                </div><br>";
    } else {
        echo    "<div class='container'>
                    <div class='notification is-danger' style='margin-top:68px;'>
                        <button class='delete'></button>
                        <h5>Oops ! There was a problem with your new rental...</h5>
                    </div>
                </div><br>";
    }

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
                <h1 class="title is-centered"><span style="color:white;font-weight:bold;">Rent a DVD</span></h1>
            </div>
        </div>
    </nav>

    <br>

    <form class="form" method="POST" action="">

        <div class="field">
            <label class="label" style="color:white;">Rental Date</label>
            <div class="control">
                <input class="input" type="datetime" name="rental_date" value="<?php echo date('Y-m-d h:i:s'); ?>" disabled>
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Inventory</label>
            <div class="control">
                <div class="select">
                    <select name="inventory_id">
                        <?php $id = $_GET['id']; $inventory = Inventory::findById($id); foreach($inventory as $item) : ?>
                        <option value="<?php echo $item['inventory_id'] ?>"><?php echo ucwords(strtolower($item['title'])) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Customer</label>
            <div class="control">
                <div class="select">
                    <select name="customer_id">
                        <option selected disabled></option>
                        <?php $customers = Customer::all(); foreach($customers as $client) : ?>
                            <option value="<?php echo $client['id'] ?>"><?php echo ucwords(strtolower($client['last_name'])) ?> <?php echo ucwords(strtolower($client['name'])) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Return Date</label>
            <div class="control">
                <input class="input" type="date" name="return_date" disabled>
            </div>
        </div>
        <div class="field">
            <label class="label" style="color:white;">Staff</label>
            <div class="control">
                <div class="select">
                    <select name="staff_id">
                        <option selected disabled></option>
                        <?php $staff = Staff::all(); foreach($staff as $employee) : ?>
                            <option value="<?php echo $employee['staff_id'] ?>"><?php echo $employee['first_name'] ?> <?php echo $employee['last_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><br>
        <div class="field is-grouped">
            <div class="control">
                <?php $id = $_GET['id']; $inventory = Inventory::selectById($id); ?>
                    <?php   if (!empty($inventory['inventory_id'])) : 
                                echo '<button class="button is-link" type="submit" name="submit">Create the rental</button>';
                            else : 
                                echo '<button class="button is-link" title="This movie is not available" type="submit" name="submit" disabled>Create the rental</button>';
                            endif; ?>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </form>
</div>

<?php include('../partials/footer.php'); ?>