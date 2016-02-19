<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dvds</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>
        <?php echo "<td>" .  $genre->genre_name . "</td>" ?>
    </h1>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Rating</th>
            <th>Genre</th>
            <th>Label</th>
        </tr>

        <?php foreach ($dvds as $my_dvd) : ?>

            <?php echo "<tr>" ?>

            <?php echo "<td>" .  $my_dvd->title . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->rating['rating_name'] . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->genre['genre_name'] . "</td>" ?>
            <?php echo "<td>" .  $my_dvd->label['label_name'] . "</td>" ?>


            <?php echo "</tr>" ?>

        <?php endforeach; ?>
    </table>
</div>


</body>
</html>