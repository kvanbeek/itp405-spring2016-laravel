<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <p>
        You searched for: <?php echo $searchTerm ?>
    </p>

    <?php if (count($mysongs) === 0) : ?>
        <p>No artists found. <a href="/artists/new">Add a new artist.</a></p>
    <?php endif ?>

    <?php foreach ($mysongs as $song) : ?>
        <h3>
            <?php echo $song->title ?>
        </h3>
        <span>by</span>
        <span>
            <?php echo $song->artist_name ?>
        </span>
        <p>
            Play Count: <?php echo $song->play_count ?>
        </p>
        <p>
            Price: $<?php echo $song->price ?>
        </p>
    <?php endforeach; ?>

</body>
</html>