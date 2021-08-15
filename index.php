<?php 

require('./helpers/Database.php');
require('./classes/CRUD.php');
require('./classes/Film.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<?php include('partials/header.php'); ?>

<div class="container" style="margin-top:68px;">
    
    <br>
    
    <div class="row columns is-multiline">

    <?php $films = Film::all(); foreach($films as $film) : ?>

        <div class="column post is-2">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-2by3">
                        <img src="<?php echo "https://picsum.photos/200/300?random=" . $film['film_id'] ?>" alt="Placeholder image">
                    </figure>
                </div>
            </div>
            <div style="text-align:center;">
                <p><?php echo ucwords(strtolower($film['title'])) ?></p>
                <p style="color:#E50914;">(<?php echo $film['release_year'] ?>)</p>
            </div> 
        </div>
        
    <?php endforeach; ?>

    </div>
</div>

<?php include 'partials/footer.php';?>