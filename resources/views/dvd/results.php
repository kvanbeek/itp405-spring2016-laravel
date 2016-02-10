<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dvds</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h3>
        Dvds with title: <?php echo $searchTerm ?>
    </h3>
    <h3>
        Dvds with genre: <?php echo $genre ?>
    </h3>
    <h3>
        Dvds with rating: <?php echo $rating ?>
    </h3>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Rating</th>
            <th>Genre</th>
            <th>Label</th>
            <th>Sound</th>
            <th>Format</th>
            <th>Review</th>
        </tr>

        <?php foreach ($dvds as $my_dvd) : ?>

            <?php echo "<tr>" ?>

            <?php echo "<td>" .  $my_dvd->title . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->rating_name . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->genre_name . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->label_name . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->sound_name . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->format_name . "</td>" ?>

            <?php echo '<td><a href=' . 'dvds/' . $my_dvd->id . '>Review</a>' . "</td>" ?>


            <?php echo "</tr>" ?>

        <?php endforeach; ?>
    </table>
</div>


</body>
</html>