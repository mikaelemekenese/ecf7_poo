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
    
    <br><?php $id = $_GET['id']; $movie = Film::findById($id); ?>

    <div class="card has-text-light" style="background-color:#212529;">
        <a href="javascript:history.go(-1)" style="text-decoration:none;position:absolute;z-index:1;top:10px;left:10px;">
            <button class="button is-rounded"><b>← Back</b></button>
        </a>
        <div class="card-image" style="position:relative;">
            <figure class="image is-4by1">
                <img src="https://picsum.photos/1000/250/?random" alt="Movie image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <nav class="level" style="margin-bottom:0;">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="title is-1"style="color:#E50914;"><?php echo ucwords(strtolower($movie['title'])) ?></p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <a href="rental-create.php?id=<?php echo $id ?>" style="text-decoration:none;">
                                    <button class="button is-success is-light is-rounded"><b>Rent</b>&nbsp;|&nbsp;$<?php echo $movie['price'] ?></button>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <p class="subtitle is-5">(<?php echo $movie['category'] ?>, <?php echo $movie['year'] ?>, <?php 
                    
                    $minutes = $movie['duration'] % 60;
                    $hours = floor($movie['duration'] / 60);
                    
                    if ($hours < 1) : echo sprintf("%02d", $minutes)."m";
                    else : echo $hours."h ".sprintf("%02d", $minutes)."m";
                    endif;
                    
                    ?>)</p>
                    <span class="tag is-light is-medium" style="font-weight:bold;"><?php echo $movie['rating'] ?></span>      
                </div>
            </div>

            <div class="content">
                <div class="columns">
                    <div class="column is-three-quarters">
                        <h2 class="subtitle is-5">
                            Description :
                            <br>
                            <span style="color:white;"><?php echo $movie['description'] ?>.</span>
                        </h2>
                    </div>
                    <div class="column" style="display:flex;justify-content:flex-end;text-align:end;">
                        <h2 class="subtitle is-6">
                            Starring :<br>
                            
                            <?php $actor = Actor::findByFilm($id); foreach($actor as $star) : ?>
                                <span style="color:white;"><?php echo ucwords(strtolower($star['actorFirstName'])) ?> <?php echo ucwords(strtolower($star['actorLastName'])) ?><br></span>
                            <?php endforeach; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('../partials/footer.php'); ?>