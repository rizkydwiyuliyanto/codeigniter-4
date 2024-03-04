<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <?php include("header.php") ?>
    <!-- delete Modal -->
    <?php $idx = 0; ?>
    <?php foreach ($box_items as $a) : ?>
        <div class="modal fade" id="deleteModal<?php echo $idx; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <form method="post" action="<?php echo base_url("update_status/" . $a["id_stuff"]) ?>">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Stuff (<?php echo $a["stuff_name"] ?>)</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input class="form-control" name="jumlah" id="jumlah" type="number" min=1 max="<?php echo $a["jumlah"]; ?>" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach; ?>
    <!-- CONTENT -->
    <div class="content">
        <div class="my-container mb-4">
            <div class="box-shadow-parent w-100 py-4 px-3 rounded">
                <div class=" d-flex justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <h3 class="p-0 me-1 my-0">Box</h3>
                        <img class="ms-2" src="<?php echo base_url("assets/img/keyboard.svg") ?>" width="37">
                    </div>
                </div>

                <div class="mt-4 overflow-scroll">
                    <?php $v = explode("/", base_url(uri_string())); ?>
                    <?php $mth = ""; ?>
                    <?php
                    if (isset($_REQUEST["mth"])) {
                        $mth = $_REQUEST["mth"];
                    }
                    ?>
                    <?php $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]; ?>
                    <select class="form-select form-select-status mb-4" onchange="setmonth(this)">
                        <?php $idx = 1; ?>
                        <?php foreach ($month as $a) : ?>
                            <option value="<?php echo $idx ?>" <?php if ($mth == $idx) {
                                                                    echo "selected";
                                                                } ?>>
                                <?php echo $a; ?>
                            </option>
                            <?php $idx = $idx + 1; ?>
                        <?php endforeach; ?>
                    </select>
                    <table class="table">
                        <thead style="background-color: #034F84;color:white;">
                            <tr>
                                <th scope="col">Shops</th>
                                <th scope="col">Name</th>
                                <th scope="col">Unit price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Category</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col"></th>
                            </tr>
                        <tbody>
                            <?php $idx = 0; ?>
                            <?php foreach ($box_items as $a) : ?>
                                <tr scope="row">
                                    <td>
                                        <?php echo $a["shop_name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["stuff_name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["price"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["size"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["category_name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $a["jumlah"] ?>
                                    </td>
                                    <td>
                                        <button type="submit" class="delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $idx; ?>">
                                            <span>Delete</span>
                                            <img src="<?php echo base_url("assets/img/trash-fill.svg") ?>">
                                        </button>
                                    </td>
                                </tr>
                                <?php $idx = $idx + 1; ?>
                            <?php endforeach ?>
                        </tbody>
                        </thead>

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