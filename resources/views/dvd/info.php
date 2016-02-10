<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Dvd</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>





<div class="container">


    <?php if (count($errors) > 0) : ?>
        <div class="alert alert-danger">
            <strong>Error</strong>
            <ul>
                <?php foreach ($errors->all() as $error) : ?>
                    <li>
                        <?php echo $error ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

    <?php endif ?>

    <?php if (session('success')) : ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Review successfully added.
        </div>
    <?php endif ?>



    <h3>
        Title: <?php echo $dvd->title ?>
    </h3>
    <h3>
        Rating: <?php echo $dvd->rating_name ?>
    </h3>
    <h3>
        Genre: <?php echo $dvd->genre_name ?>
    </h3>
    <h3>
        Label: <?php echo $dvd->label_name ?>
    </h3>
    <h3>
        Sound: <?php echo $dvd->sound_name ?>
    </h3>
    <h3>
        Format: <?php echo $dvd->format_name ?>
    </h3>




    <form action="/dvds/review" method="post">
        <?php echo csrf_field() ?>
        <div class="form-group">
            <input type="hidden" name="dvd_id" value="<?php echo $dvd->id ?>">
            <label for="sel1">Rating:</label>
            <select class="form-control" id="sel1" name="rating">
                <option value="1" <?php if(old('rating') == "1") echo "selected"; ?>>1</option>
                <option value="2" <?php if(old('rating') == "2") echo "selected"; ?>>2</option>
                <option value="3" <?php if(old('rating') == "3") echo "selected"; ?>>3</option>
                <option value="4" <?php if(old('rating') == "4") echo "selected"; ?>>4</option>
                <option value="5" <?php if(old('rating') == "5") echo "selected"; ?>>5</option>
                <option value="6" <?php if(old('rating') == "6") echo "selected"; ?>>6</option>
                <option value="7" <?php if(old('rating') == "7") echo "selected"; ?>>7</option>
                <option value="8" <?php if(old('rating') == "8") echo "selected"; ?>>8</option>
                <option value="9" <?php if(old('rating') == "9") echo "selected"; ?>>9</option>
                <option value="10" <?php if(old('rating') == "10") echo "selected"; ?>>10</option>

            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo old('title') ?>">
        </div>

        <label for="comment">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo old('description') ?></textarea>
        <br>
        <input type="submit" value="Submit" class="btn btn-primary pull-right">
    </form>

    <br>
    <br>

    <table class="table">
        <tr>
            <th>Rating</th>
            <th>Title</th>
            <th>Description</th>
        </tr>

        <?php foreach ($reviews as $review) : ?>

            <?php echo "<tr>" ?>

            <?php echo "<td>" .  $review->rating . "</td>" ?>
            <?php echo "<td>" .  $review->title . "</td>" ?>
            <?php echo "<td>" .  $review->description . "</td>" ?>



            <?php echo "</tr>" ?>

        <?php endforeach; ?>
    </table>







</div>



</body>
</html>