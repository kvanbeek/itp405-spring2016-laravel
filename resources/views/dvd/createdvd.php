<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Dvd</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>





<div class="container">
    <h2>Create Dvds</h2>

    <?php if (session('success')) : ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Dvd successfully added.
        </div>
    <?php endif ?>

    <form action="/dvds" method="post" class="form-inline">
        <?php echo csrf_field() ?>
        <input type="text" name="title" class="form-control" placeholder="Title">
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
        Labels:
        <select name="label" class="form-control">
            <option value="">All</option>
            <?php foreach ($labels as $label) : ?>
                <option value="<?php echo $label->id ?>"><?php echo $label->label_name ?></option>
            <?php endforeach; ?>

        </select>

        <br>
        <br>
        Sounds:
        <select name="sound" class="form-control">
            <option value="">All</option>
            <?php foreach ($sounds as $sound) : ?>
                <option value="<?php echo $sound->id ?>"><?php echo $sound->sound_name ?></option>
            <?php endforeach; ?>

        </select>

        <br>
        <br>
        Formats:
        <select name="formatId" class="form-control">
            <option value="">All</option>
            <?php foreach ($formats as $format) : ?>
                <option value="<?php echo $format->id ?>"><?php echo $format->format_name ?></option>
            <?php endforeach; ?>

        </select>

        <br>
        <br>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>




</body>
</html>