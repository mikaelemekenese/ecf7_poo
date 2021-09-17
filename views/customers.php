<?php 

require('../helpers/database.php');
require('../classes/CRUD.php');
require('../classes/film.php');
require('../classes/category.php');
require('../classes/actor.php');
require('../classes/rental.php');
require('../classes/store.php');
require('../classes/customer.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<?php include('../partials/header.php'); ?>

<div class="container" style="margin-top:68px;">

    <br>

    <nav class="level" style="margin-bottom:0;">
        <div class="level-left">
            <div class="level-item">
                <a href="index.php" style="text-decoration:none;">
                    <button class="button is-rounded"><b>← Back</b></button>
                </a>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <h1 class="title is-centered"><span style="color:white;font-weight:bold;">Complete list of customers (sorted by last names)</span></h1>
            </div>
        </div>
    </nav>

    <br>

    <!-- The complete list of the customers -->

    <table class="table table-dark table-striped has-text-primary-light">
        <thead class="has-text-white-ter">
            <tr class="text-center">
                <th class="is-vcentered" style="color:#E50914;">Customer Ref.</th>
                <th class="is-vcentered" style="color:#E50914;">First Name</th>
                <th class="is-vcentered" style="color:#E50914;">Last Name</th>
                <th class="is-vcentered" style="color:#E50914;">Email</th>
                <th class="is-vcentered" style="color:#E50914;">Address</th>
                <th class="is-vcentered" style="color:#E50914;"></th>
            </tr>
        </thead>
        <tbody>
        <?php $customers = Customer::all(); foreach($customers as $client) : ?>
            <tr class="text-center">
                <td class="is-vcentered"><?php echo $client['id'] ?></td>
                <td class="is-vcentered"><?php echo ucwords(strtolower($client['name'])) ?></td>
                <td class="is-vcentered"><?php echo ucwords(strtolower($client['last_name'])) ?></td>
                <td class="is-vcentered"><?php echo strtolower($client['email']); ?></td>
                <td class="is-vcentered"><?php echo $client['address']; ?></td>
                <td class="is-vcentered">
                    <a href="single.php?id=<?php echo $client['id'] ?>" style="text-decoration:none;"><button class="button is-small is-info is-rounded" style="background-color:white;color:#212529;font-weight:bold;">Return DVD</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>   
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    
</script>

<?php include('../partials/footer.php'); ?>