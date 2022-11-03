<?php

include_once 'connection.php';

// READ
$sql_query = 'SELECT * FROM colours';
$gsent = $pdo->prepare($sql_query);
$gsent->execute();
$result = $gsent->fetchAll();

// var_dump($result);

// ADD
if ($_POST) {
    $colour = $_POST['colour'];
    $description = $_POST['description'];

    $sql_insert = 'INSERT INTO colours (colour, description) VALUES (?,?)';
    $add_sentence = $pdo->prepare($sql_insert);
    $add_sentence->execute(array($colour,$description));

    header('location:index.php');
}

if ($_GET) {
    $id = $_GET['id'];
    $sql_get = 'SELECT * FROM colours WHERE id=?';
    $gsent_get = $pdo->prepare($sql_get);
    $gsent_get->execute(array($id));
    $unic_result = $gsent_get->fetch();

    // var_dump($unic_result);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- <h1>Hello, world!</h1> -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach ($result as $item) : ?>

                    <div class="alert alert-<?php echo $item['colour'] ?> text-uppercase" role="alert">
                        <?php echo $item['colour'] . ' - ' . $item['description']; ?>
                        <a href="delete.php?id=<?php echo $item['id'] ?>" class="float-end ms-3">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                        <a href="index.php?id=<?php echo $item['id'] ?>" class="float-end">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </div>

                    <?php endforeach ?>
                </div>

                <div class="col-md-6">
                    <?php if(!$_GET):?>
                    <h2>Add Elements</h2>
                    <form method="POST">
                        <input type="text" class="form-control" name="colour">
                        <input type="text" class="form-control mt-3" name="description">
                        <button class="btn btn-primary mt-3">Add</button>
                    </form>
                    <?php endif ?>

                    <?php if($_GET):?>
                    <h2>Edit Element</h2>
                    <form method="GET" action="edit.php">
                        <input type="text" class="form-control" name="colour" value="<?php echo $unic_result['colour'] ?>">
                        <input type="text" class="form-control mt-3" name="description" value="<?php echo $unic_result['description'] ?>">
                        <input type="hidden" name="id" value="<?php echo $unic_result['id'] ?>">
                        <button class="btn btn-primary mt-3">Edit</button>
                    </form>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
