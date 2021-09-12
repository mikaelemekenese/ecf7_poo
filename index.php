<?php 

require('./helpers/Database.php');
require('./classes/CRUD.php');
require('./classes/film.php');
require('./classes/category.php');
require('./classes/actor.php');
require('./classes/rental.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<?php include('partials/header.php'); ?>

<div class="container" style="margin-top:68px;">
    
    <br>

    <div class="columns" style="text-align: center;">
        <div class="column">
            <form class="form" method="POST">
                <div class="select is-rounded">
                    <select name="store">
                        <option selected disabled>Store</option>
                        <?php $stores = Rental::all_store(); foreach($stores as $store) : ?>
                            <option value="<?php echo $store['id'] ?>"><?php echo $store['city'] ?>, <?php echo $store['country'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="button is-primary is-rounded" type="submit" onclick="allByStore($store['id'])">Go</button>
            </form>
        </div>  
        <div class="column">
            <form class="form" method="POST">
                <div class="select is-rounded">
                    <select name="category">
                        <option selected disabled>Category</option>
                        <?php $categories = Category::all(); foreach($categories as $style) : ?>
                            <option value="<?php echo $style['cat_id'] ?>"><?php echo $style['cat_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="button is-primary is-rounded" type="submit">Go</button>
            </form>
        </div>
        <div class="column">
            <form class="form" method="POST">
                <div class="select is-rounded">
                    <select name="actor">
                        <option selected disabled>Actors</option>
                        <?php $actors = Actor::all(); foreach($actors as $star) : ?>
                            <option value="<?php echo $star['actor_id'] ?>"><?php echo ucwords(strtolower($star['actorFirstName'])) ?> <?php echo ucwords(strtolower($star['actorLastName'])) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="button is-primary is-rounded" type="submit">Go</button>
            </form>
        </div>      
    </div>
    <div class="column" style="text-align: center;">
        <form class="form" method="POST">
            <input class="input is-rounded" type="text" placeholder="Search for a movie" style="width: 500px;">
            <button class="button is-primary is-rounded" type="submit">Go</button>
        </form>
    </div> 

    <!-- The complete list of the films -->

    <table class="table table-dark table-striped has-text-primary-light">
        <thead class="has-text-white-ter">
            <tr class="text-center">
                <th class="is-vcentered" style="color:#E50914;">Title</th>
                <th class="is-vcentered" style="color:#E50914;">Category</th>
                <th class="is-vcentered" style="color:#E50914;">Duration</th>
                <th class="is-vcentered" style="color:#E50914;">Rating</th>
                <th class="is-vcentered" style="color:#E50914;">Rental cost<br>(in US $)</th>
                <th class="is-vcentered" style="color:#E50914;">Available copies</th>
                <th class="is-vcentered" style="color:#E50914;"></th>
            </tr>
        </thead>
        <tbody>
        <?php $films = Film::all(); foreach($films as $film) : ?>
            <tr class="text-center">
                <td class="is-vcentered"><?php echo ucwords(strtolower($film['title'])) ?></td>
                <td class="is-vcentered"><?php echo $film['category'] ?></td>
                <td class="is-vcentered"><?php 
                    
                    $minutes = $film['duration'] % 60;
                    $hours = floor($film['duration'] / 60);
                    
                    if ($hours < 1) : echo sprintf("%02d", $minutes)."m";
                    else : echo $hours."h ".sprintf("%02d", $minutes)."m";
                    endif;
                    
                    ?></td>
                <td class="is-vcentered"><?php echo $film['rating'] ?></td>
                <td class="is-vcentered"><?php echo $film['price'] ?></td>
                <td class="is-vcentered"><?php 

                    /* if (($film['rent'] - $film['ret']) >= 1) : echo "&#9989;";
                    elseif (($film['rent'] - $film['ret']) < 1 && $film['rent'] >= 1): echo "&#9200;";
                    else: echo "&#10060;";
                    endif; */

                    echo $film['ret'];

                    ?></td>
                <td class="is-vcentered">
                    <a href="single.php?id=<?php echo $film['id'] ?>" style="text-decoration:none;"><button class="button is-small is-info is-rounded">View details</button></a>
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

<?php include('partials/footer.php'); ?>