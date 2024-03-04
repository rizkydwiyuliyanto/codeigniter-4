<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <?php include("header.php") ?>
    <!-- CONTENT -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new shop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo base_url("shops/post") ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="shop_name" class="form-label">Shop name</label>
                            <input type="text" class="form-control" name="shop_name" id="shop_name">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete modal -->
    <?php $idx = 0; ?>
    <?php foreach ($shops as $a) : ?>
        <div class="modal fade" id="staticBackdrop<?php echo $idx; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $a["shop_name"] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="deleteShop('<?php echo $a['id_shop'] ?>')">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach; ?>

    <!-- Edit Modal -->
    <?php $idx = 0 ?>
    <?php foreach ($shops as $a) : ?>
        <div class="modal fade" id="editModal<?php echo $idx; ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit shop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("shops/" . $a["id_shop"] . "/edit") ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="shop_name" class="form-label">Shop name</label>
                                <input type="text" class="form-control" name="shop_name" id="shop_name" value="<?php echo $a["shop_name"] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $a["address"] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach; ?>
    <div class="content">
        <div class="my-container mb-4">
            <div class="box-shadow-parent w-100 py-4 px-3 rounded">
                <div class="d-flex justify-content-between">
                    <h3>Shops</h3>
                    <button class="button-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
                <div class="mt-4 overflow-scroll">
                    <?php echo session()->getFlashdata("message"); ?>
                    <table class="table">
                        <thead style="background-color: #034F84;color:white;">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Create time</th>
                                <th scope="col">Update time</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idx = 0; ?>
                            <?php foreach ($shops as $a) : ?>
                                <tr scope="row">
                                    <td>
                                        <?php echo $a["shop_name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["address"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["create_date"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["create_edit_date"] ?>
                                    </td>
                                    <td>
                                        <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $idx; ?>">
                                            <span>Delete</span>
                                            <img src="<?php echo base_url("assets/img/trash-fill.svg") ?>">
                                        </button>

                                        <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $idx; ?>">
                                            <span>Edit</span>
                                            <img src="<?php echo base_url("assets/img/pen-fill.svg") ?>">
                                        </button>
                                    </td>
                                </tr>
                                <?php $idx = $idx + 1; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>
    <!-- SCRIPTS -->
    <?php include("scr.php") ?>

    <!-- -->

</body>

</html>