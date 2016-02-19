<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Dvd</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>


<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <?php foreach ($genres as $genre) : ?>
            <li><a href="/genres/<?php echo $genre->id ?>/dvds"><?php echo $genre->genre_name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>


<div class="container">
    <h2>Search Dvds</h2>

    <form action="/dvds" method="get" class="form-inline">
        <input type="text" name="dvd" class="form-control" placeholder="Search Dvds">
        <br>
        <br>
        Genre:
        <select name="genre" class="form-control">
            <option value="">All</option>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
            <?php endforeach; ?>

        </select>
        <br>
        <br>
        Rating:
        <select name="rating" class="form-control">
            <option value="">All</option>
            <?php foreach ($ratings as $rating) : ?>
                <option value="<?php echo $rating->id ?>"><?php echo $rating->rating_name ?></option>
            <?php endforeach; ?>

        </select>

        <br>
        <br>
        <input type="submit" value="Search" class="btn btn-primary">
    </form>
</div>




</body>
</html>