<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Artist</title>
</head>
<body>

<h2>Add Artist</h2>

<?php if (count($errors) > 0) : ?>
    <ul>
        <?php foreach ($errors->all() as $error) : ?>
            <li>
                <?php echo $error ?>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?php if (session('success')) : ?>
    <p>Artist successfully added.</p>
<?php endif ?>

<form action="/artists" method="post">
    <?php echo csrf_field() ?>
    Artist Name: <input type="text" name="artist" value="<?php echo old('artist') ?>">
    <input type="submit" value="Add">
</form>

<h3>Existing Artists</h3>

<table border="1" cellspacing="0" cellpadding="5">
    <?php foreach ($artists as $artist) : ?>
        <tr>
            <td><?php echo $artist->artist_name ?></td>
        </tr>
    <?php endforeach ?>
</table>

</body>
</html>