<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styling.css">
    <?php require_once "DbHandler.php"; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <table class="list">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php foreach(getAnimals() as $animal) : ?>
                <tr>
                    <td><?php echo $animal['name']; ?></td>
                    <td><?php echo $animal['type']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $animal['id']; ?>">Edit</a>
                        <a href="index.php?delete=<?php echo $animal['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="row formstyle">
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <table>
                    <tr>
                        <td><label>Name</label></td>
                        <td><label>:</label></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>" placeholder="name"></td>
                    </tr>
                    <tr>
                        <td><label>Type</label></td>
                        <td><label>:</label></td>
                        <td><input type="text" name="type" value="<?php echo $type; ?>" placeholder="type"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <?php if($update): ?>
                                <input type="submit" name="update" value="Update">
                            <?php else: ?>
                                <input type="submit" name="save" value="Save">
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>