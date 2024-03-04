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
                    <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo base_url("stuff/category_post") ?>">
                    <div class="modal-body">
                        <div>
                            <label for="category_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name">
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
    <?php foreach ($category as $a) : ?>
        <div class="modal fade" id="deleteModal<?php echo $idx; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $a["category_name"] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="deleteCategory('<?php echo $a['id_category'] ?>')">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach ?>
    <!-- Edit Modal -->
    <?php $idx = 0; ?>
    <?php foreach ($category as $a) : ?>
        <div class="modal fade" id="editModal<?php echo $idx; ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("stuff/category_edit/" . $a["id_category"] . "/edit") ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <div class="my-grid">
                                <div>
                                    <label for="category_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $a["category_name"]; ?>">
                                </div>
                                <div>
                                    <label for="status" class="form-label">Active</label>
                                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                                        <option value="aktif" <?php if ($a["status"]=="aktif"){echo "selected";}?> >Aktif</option>
                                        <option value="tidak aktif" <?php if ($a["status"]=="tidak aktif"){echo "selected";}?> >Tidak aktif</option>
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
            <div class="box-shadow-parent w-100 py-4 px-3 rounded">
                <div class=" d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h3 class="p-0 me-1 my-0">Category</h3>
                        <img class="ms-2" src="<?php echo base_url("assets/img/keyboard.svg") ?>" width="37">
                    </div>
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
                                <th scope="col">Status</th>
                                <th scope="col">Create time</th>
                                <th scope="col">Update time</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idx = 0; ?>
                            <?php foreach ($category as $a) : ?>
                                <tr scope="row">
                                    <td>
                                        <?php echo $a["category_name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["status"] ?>
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

        <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
        <?php include("footer.php") ?>

        <!-- SCRIPTS -->
        <?php include("scr.php") ?>


        <!-- -->

</body>

</html>