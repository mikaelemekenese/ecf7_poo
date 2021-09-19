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

<div class="container is-max-desktop" style="margin-top:68px;">
    
    <br><?php $id = $_GET['id']; $rental = Rental::findById($id); ?>

    <a href="javascript:history.go(-1)" style="text-decoration:none;">
            <button class="button is-rounded"><b>← Back</b></button>
    </a>

    <br><br>

    <div class="card has-text-light" style="background-color:#212529;">
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <nav class="level" style="margin-bottom:0;">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="title is-1" style="color:#E50914;"><?php echo ucwords(strtolower($rental['movie'])) ?></p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <a href="rental-return.php?id=<?php echo $rental['id'] ?>" style="text-decoration:none;">
                                    <button class="button is-success is-light is-rounded"><b>Return the DVD</b></button>
                                </a>
                            </div>
                        </div>
                    </nav>   
                </div>
            </div>

            <div class="content">
                <div class="columns">
                    <div class="column is-three-quarters">
                        <h2 class="subtitle is-5">
                            Rented by :
                            <br><br>
                            First Name : <span style="color:white;"><?php echo ucwords(strtolower($rental['name'])) ?></span><br>
                            Last Name : <span style="color:white;"><?php echo ucwords(strtolower($rental['last_name'])) ?></span><br>
                            Email : <span style="color:white;"><?php echo strtolower($rental['email']) ?></span><br>
                            Address : <span style="color:white;"><?php echo $rental['address'] ?></span>
                        </h2>
                    </div>
                    <div class="column" style="display:flex;justify-content:flex-end;text-align:end;">
                        <h2 class="subtitle is-5">
                            On : <span style="color:white;"><?php echo date('M d, Y', strtotime($rental['rental_date'])) ?></span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('../partials/footer.php'); ?>