<?php 

require('./helpers/Database.php');
require('./classes/CRUD.php');
require('./classes/Film.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<?php include('partials/header.php'); ?>

<section class="hero is-info">
    <div class="hero-body">
        <h1 class="title">Sakila</h1>
        <h3 class="subtitle">The Online DVD Rental Store</h3>
    </div>
</section>

<div class="container">
    
    <br>
    
    <div class="row columns is-multiline">

    <?php $films = Film::all(); foreach($films as $film) : ?>

        <div class="column post is-3">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4"><?php echo $film['title'] ?></p>
                            <p class="subtitle is-6"></p>
                        </div>
                    </div>

                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                        <a href="#">#css</a> <a href="#">#responsive</a>
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>

                <footer class="card-footer">
                    <a href="#" class="card-footer-item">Save</a>
                    <a href="#" class="card-footer-item">Edit</a>
                    <a href="#" class="card-footer-item">Delete</a>
                </footer>
            </div>
        </div>
        
    <?php endforeach; ?>

    </div>
</div>

<?php include 'partials/footer.php';?>