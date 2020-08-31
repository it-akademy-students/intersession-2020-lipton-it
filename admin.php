<?php
require_once('public/layouts/header.php');
$users = getAllUsers();
//Redirection si l'utilisateur n'est pas Admin
if (checkRole($id) === 1) {
} else {
    header('Location: /login');
} ?>
<div class="container">
    <div>
        <table class="table table-hover shadow-2dp" style="background-color: white">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <?php foreach ($users as $key => $value) : ?>
                <tbody>
                    <tr>
                        <td><?= $value["name"] ?></td>
                        <td><?= $value["role"] ?></td>
                        <td><a href="/update?<?= $value["id"] ?>"><button type="button" class="btn btn-info shadow-2dp"><i class="fas fa-user-edit fa-lg"></i></button></a></td>
                        <?php if ($value["role"] == 1) { ?>
                        <?php } else { ?>
                            <td><a href="/deleteUser?<?= $value["id"] ?>"><button id="<?= $value["id"] ?>" type="button" class="btn btn-danger shadow-2dp"><i class="fas fa-user-times fa-lg"></i></button></a></td>
                        <?php } ?>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>
<?php require_once 'public/layouts/footer.php';
