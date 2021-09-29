<?php 

require('../helpers/database.php');
require('../classes/CRUD.php');
require('../classes/film.php');
require('../classes/category.php');
require('../classes/actor.php');
require('../classes/rental.php');
require('../classes/store.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<?php include('../partials/header.php'); ?>

<div class="container" style="margin-top:68px;">
    
    <br>
    
    <div class="card has-text-light" style="background-color:#212529;text-align:center;width:500px;margin:auto;padding:20px;padding-bottom: 5px;">
        <div class="field">
            <div class="control">
                <form class="form" method="POST">
                    <div class="select is-rounded">
                        <select name="store" onchange="location = this.value;" style="width:400px;">
                            <option selected disabled>-- Choose a store --</option>
                            <?php $stores = Store::all(); foreach($stores as $store) : ?>
                                <option value="store.php?id=<?php echo $store['id'] ?>">
                                    <?php echo $store['city'] ?>, <?php echo $store['country'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <form class="form" method="POST">
                    <div class="select is-rounded">
                        <select name="category" onchange="location = this.value;" style="width:400px;">
                            <option selected disabled>-- Choose a category --</option>
                            <?php $categories = Category::all(); foreach($categories as $cat) : ?>
                                <option value="category.php?id=<?php echo $cat['cat_id'] ?>"><?php echo $cat['cat_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <form class="form" method="POST">
                    <div class="select is-rounded">
                        <select name="actor" onchange="location = this.value;" style="width:400px;">
                            <option selected disabled>-- Choose an actor / actress --</option>
                            <?php $actors = Actor::all(); foreach($actors as $star) : ?>
                                <option value="actor.php?id=<?php echo $star['actor_id'] ?>"><?php echo ucwords(strtolower($star['actorFirstName'])) ?> <?php echo ucwords(strtolower($star['actorLastName'])) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="column" style="text-align: center;">
            <?php $search = ''; $films = Film::search($search); ?>
            <form id="search" class="form" method="POST" action="search.php">
                <input class="input is-rounded" name="title" type="text" placeholder="Search for a movie" style="width:400px;margin-bottom:10px;" value="<?php echo htmlspecialchars($search) ?>">
                <a onclick="document.getElementById('search').submit()" style="text-decoration:none;">
                    <button class="button is-primary is-rounded" type="submit">Search</button>
                </a>
            </form>
        </div>

    </div>

    <br>

    <!-- The complete list of the films -->

    <table class="table table-dark table-striped has-text-primary-light">
        <thead class="has-text-white-ter">
            <tr class="text-center">
                <th class="is-vcentered" style="color:#E50914;">Title</th>
                <th class="is-vcentered" style="color:#E50914;">Category</th>
                <th class="is-vcentered" style="color:#E50914;">Duration</th>
                <th class="is-vcentered" style="color:#E50914;">Rating</th>
                <th class="is-vcentered" style="color:#E50914;">Rental cost<br>(in US $)</th>
                <th class="is-vcentered" style="color:#E50914;">Available</th>
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
                    if ($film['return_date'] != NULL) : echo "&#9989;";
                    else : echo "&#10060;";
                    endif; ?></td>
                <td class="is-vcentered">
                    <a href="single.php?id=<?php echo $film['id'] ?>" style="text-decoration:none;"><button class="button is-small is-info is-rounded" style="background-color:white;color:#212529;font-weight:bold;">View details</button></a>
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