<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
<?php $id = $id_shop ?>

<body>
    <!-- HEADER: MENU + HEROE SECTION -->
    <?php include("header.php") ?>
    <!-- CONTENT -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new stuff (<?php echo $shop_name ?>)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo base_url("stuff/stuff_post/" . $id . "/post") ?>">
                    <div class="modal-body">
                        <div class="my-grid mb-3">
                            <div>
                                <label for="stuff_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="stuff_name" id="stuff_name">
                            </div>
                            <div>
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price">
                            </div>
                        </div>
                        <div class="my-grid mb-3">
                            <div>
                                <label for="id_category" class="form-label">Category</label>
                                <select name="id_category" id="id_category" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <?php foreach ($category as $a) : ?>
                                        <option value="<?php echo $a["id_category"] ?>"><?php echo $a["category_name"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div>
                                <label for="size" class="form-label">Size</label>
                                <select name="size" id="size" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="kecil">Small</option>
                                    <option value="sedang">Medium</option>
                                    <option value="besar">Large</option>
                                </select>
                            </div>
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
    <!-- Delete Modal -->
    <?php $idx = 0; ?>
    <?php foreach ($stuff as $a) : ?>
        <div class="modal fade" id="deleteModal<?php echo $idx; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Stuff</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $a["stuff_name"] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="deleteStuff('<?php echo $a['id_stuff'] ?>')">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach ?>
    <!-- Edit Modal -->
    <?php $idx = 0; ?>
    <?php foreach ($stuff as $a) : ?>
        <div class="modal fade" id="editModal<?php echo $idx; ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new stuff (<?php echo $shop_name ?>)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("stuff/stuff_edit/" . $a["id_stuff"] . "/edit") ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <div class="my-grid">
                                <div>
                                    <label for="stuff_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="stuff_name" id="stuff_name" value='<?php echo $a["stuff_name"] ?>'>
                                </div>
                                <div>
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value='<?php echo $a["price"]; ?>'>
                                </div>
                            </div>
                            <div class="my-grid mb-3">
                                <div>
                                    <label for="id_category" class="form-label">Category</label>
                                    <select name="id_category" id="id_category" class="form-select" aria-label="Default select example">
                                        <?php foreach ($category as $x) : ?>
                                            <option <?php if ($x["id_category"] == $a["id_category"]) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $x["id_category"] ?>"><?php echo $x["category_name"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="size" class="form-label">Size</label>
                                    <select name="size" id="size" class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="kecil">Small</option>
                                        <option value="sedang">Medium</option>
                                        <option value="besar">Large</option>
                                    </select>
                                </div>
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
    <?php endforeach ?>
    <div class="content">
        <div class="my-container mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="sidebar col-md-3">
                    <ul>
                        <?php $idx = 0; ?>
                        <?php foreach ($shops as $a) : ?>
                            <li data-id="<?php echo $a["id_shop"]; ?>" class="shop-item <?php if ($a["id_shop"] == $id) {
                                                                                            echo "active-shop";
                                                                                        }; ?>"><?php echo $a["shop_name"] ?></li>
                            <?php $idx = $idx + 1; ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="box-shadow-parent mt-4 mt-md-0 py-4 px-3 rounded d-flex flex-column col-md-8 align-items-start">
                    <div class="d-flex w-100 justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <h3 class="p-0 me-1 my-0">Stuff</h3>
                            <img class="ms-2" src="<?php echo base_url("assets/img/keyboard.svg") ?>" width="37">
                        </div>
                        <button class="button-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah
                        </button>
                    </div>
                    <div class="mt-4 w-100 overflow-scroll position-relative">
                        <div style="position:sticky;left:0;">
                            <?php echo session()->getFlashdata("message"); ?>
                        </div>
                        <table class="table" style="width:750px;">
                            <thead style="background-color: #034F84;color:white;">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Create time</th>
                                    <th scope="col">Update time</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idx = 0; ?>
                                <?php foreach ($stuff as $a) : ?>
                                    <tr scope="row">
                                        <td>
                                            <?php echo $a["stuff_name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $a["size"] ?>
                                        </td>
                                        <td>
                                            <?php echo $a["price"] ?>
                                        </td>
                                        <td>
                                            <?php echo $a["create_date"] ?>
                                        </td>
                                        <td>
                                            <?php echo $a["create_edit_date"] ?>
                                        </td>
                                        <td>
                                            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $idx; ?>">
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
    </div>
    <?php include("footer.php") ?>
    <!-- SCRIPTS -->
    <?php include("scr.php") ?>


    <!-- -->

</body>

</html>