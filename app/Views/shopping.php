<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <?php include("header.php") ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new shop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo base_url("shopping/shopping_post") ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date">
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
    <!-- delete list modal -->
    <?php $idx = 0; ?>
    <?php foreach ($shopping as $a) : ?>
        <div class="modal fade" id="deleteModal<?php echo $idx; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Delete list
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form method="POST" action="<?php echo base_url("delete_shopping_list/" . $a['id_shopping_list']) ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary">Understood</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $idx = $idx + 1; ?>
    <?php endforeach; ?>
    <!-- Edit list modal -->
    <?php $idx = 0; ?>
    <?php foreach ($shopping as $a) : ?>
        <div class="modal fade" id="editModal<?php echo $idx; ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit shop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("edit_shopping/" . $a["id_shopping_list"]) ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date" value="<?php echo $a["date"] ?>">
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
    <!-- add Items Modal -->
    <?php $idx = 0 ?>
    <?php foreach ($shopping as $a) : ?>
        <div class="modal fade" id="itemListModal<?php echo $idx ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add item <?php echo $idx + 1 ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("itemsList_post/" . $a["id_shopping_list"]) ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_shop" class="form-label">Shop</label>
                                <select class="form-select select-shop" name="id_shop" id="id_shop">
                                    <option selected>Choose a Shop</option>
                                    <?php foreach ($shops as $x) : ?>
                                        <option value="<?php echo $x["id_shop"] ?>"><?php echo $x["shop_name"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_shop" class="form-label">Category</label>
                                <select class="form-select select-category" name="id_shop" id="id_shop">
                                    <option selected>Choose a category</option>
                                </select>
                            </div>
                            <div class="my-grid mb-3">
                                <div>
                                    <label for="id_stuff" class="form-label">Stuff</label>
                                    <select class="form-select select-stuff" name="id_stuff" id="id_stuff">
                                        <option selected>Choose a Stuff</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="sum" class="form-label">Sum</label>
                                    <input type="number" class="form-control sum-stuff" name="sum" id="sum">
                                </div>
                            </div>
                            <div class="my-grid mb-3">
                                <div>
                                    <label for="discount" class="form-label">Discount</label>
                                    <input type="number" class="form-control discount-stuff" name="discount" id="discount">
                                </div>
                                <div>
                                    <label for="total_price" class="form-label">Total Price</label>
                                    <input type="hidden" class="form-control" name="total_price-hidden" id="total_price-hidden">
                                    <input type="number" class="form-control total-price-stuff" name="total_price" id="total_price" disabled>
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
    <!-- pay Modal -->
    <?php $idx = 0; ?>
    <?php foreach ($shopping as $a) : ?>
        <?php $id = $a["id_shopping_list"]; ?>
        <div class="modal fade" id="paymentModal<?php echo $idx ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment <?php echo $idx + 1 ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="<?php echo base_url("finish_payment/$id") ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="hidden" class="form-control" name="total_shopping-hidden" id="total_shopping-hidden">
                                <input type="number" class="form-control total-shopping" name="total" id="total" disabled>
                            </div>
                            <div class="my-grid mb-3">
                                <div>
                                    <label for="money_have" class="form-label">Money have</label>
                                    <input type="number" class="form-control money-have-shopping" name="money_have" id="money_have">
                                </div>
                                <div>
                                    <label for="money_left" class="form-label">Money left</label>
                                    <input type="hidden" class="form-control" name="money_left-hidden" id="money_left-hidden">
                                    <input type="number" class="form-control money-left-shopping" name="money_left" id="money_left" disabled>
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
        <?php $idx = $idx + 1 ?>
    <?php endforeach ?>
    <!-- CONTENT -->
    <div class="content">
        <div class="my-container mb-4">
            <div class="box-shadow-parent w-100 py-4 px-3 rounded">
                <div class=" d-flex justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <h3 class="p-0 me-1 my-0">Shopping List</h3>
                        <img class="ms-2" src="<?php echo base_url("assets/img/keyboard.svg") ?>" width="37">
                    </div>
                    <button class="button-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
                <div class="mt-4 mb-2">
                    <?php echo session()->getFlashdata("message"); ?>
                    <div class="my-grid-card mb-2">
                        <div class="d-flex flex-column flex-md-row" style="justify-content: stretch;gap:20px;">

                            <div class="col">
                                <?php for ($x = 0; $x < count($shopping); $x++) { ?>
                                    <?php if ($x % 2 == 0) { ?>
                                        <?php $a = $shopping[$x]; ?>
                                        <div class="card mb-4 col-12 text-dark bg-light" style="height:fit-content">
                                            <div class="card-body d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title">Lists <?php echo $x + 1; ?></h5>
                                                    <p class="card-text"><?php echo $a["date"] ?></p>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $x; ?>">Edit</button>
                                                    <button class="ms-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $x; ?>">Delete</button>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush lists-item" data-index="<?php echo $x; ?>" data-shopping-id="<?php echo $a['id_shopping_list'] ?>">

                                            </ul>
                                            <div class="card-body align-items-end d-flex justify-content-between">
                                                <div>
                                                    <span class="shopping-list-price">Total: </span>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#itemListModal<?php echo $x ?>">Add item</button>
                                                    <button type="button" class="btn ms-1 btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal<?php echo $x ?>">Pay</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="col">
                                <?php for ($x = 0; $x < count($shopping); $x++) { ?>
                                    <?php if ($x % 2 == 1) { ?>
                                        <?php $a = $shopping[$x]; ?>
                                        <div class="card mb-4 col-12 text-dark bg-light" style="height:fit-content">
                                            <div class="card-body d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title">Lists <?php echo $x + 1; ?></h5>
                                                    <p class="card-text"><?php echo $a["date"] ?></p>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $x; ?>">Edit</button>
                                                    <button class="ms-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $x; ?>">Delete</button>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush lists-item" data-index="<?php echo $x; ?>" data-shopping-id="<?php echo $a['id_shopping_list'] ?>">

                                            </ul>
                                            <div class="card-body align-items-end d-flex justify-content-between">
                                                <div>
                                                    <span class="shopping-list-price">Total: </span>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#itemListModal<?php echo $x ?>">Add item</button>
                                                    <button type="button" class="btn ms-1 btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal<?php echo $x ?>">Pay</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <!-- <div>
                                <div>
                                    
                                </div>
                                <div>

                                </div>
                                <div>

                                </div>
                            </div> -->
                        </div>
                        <!-- <?php $idx = 0; ?>
                        <?php foreach ($shopping as $a) : ?>
                            <div class="card text-dark bg-light" style="height:fit-content">
                                <div class="card-body d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">Lists</h5>
                                        <p class="card-text"><?php echo $a["date"] ?></p>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $idx; ?>">Edit</button>
                                        <button class="ms-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $idx; ?>">Delete</button>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush lists-item" data-shopping-id="<?php echo $a['id_shopping_list'] ?>">

                                </ul>
                                <div class="card-body align-items-end d-flex justify-content-between">
                                    <div>
                                        <span class="shopping-list-price">Total: </span>
                                        <div class="<?php if ($a["status"] == "finish") {
                                                        echo "d-flex";
                                                    } else {
                                                        echo "d-none";
                                                    } ?> flex-column">
                                            <div>
                                                Money have: <span class="finish_money_have"><?php echo $a["money_have"] ?></span>
                                            </div>
                                            <div>
                                                Money left: <span class="finish_money_left"><?php echo $a["money_left"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($a["status"] == "not finish") { ?>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#itemListModal<?php echo $idx ?>">Add item</button>
                                            <button type="button" class="btn ms-1 btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal<?php echo $idx ?>">Pay</button>
                                        </div>
                                    <?php } else { ?>
                                        <form method="post" action="<?php echo base_url('box_push/' . $a['id_shopping_list']) ?>">
                                            <button type="submit" class="btn  btn-primary btn-sm">Move to box</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $idx = $idx + 1; ?>
                        <?php endforeach ?> -->
                    </div>
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