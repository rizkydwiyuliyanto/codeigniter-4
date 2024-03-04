<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <?php include("header.php") ?>
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
                    <table class="table">
                        <thead style="background-color: #034F84;color:white;">
                            <tr>
                                <th scope="col">Expense</th>
                                <th scope="col">Month</th>
                                <th scope="col">Total item</th>
                            </tr>
                        <tbody>
                            <?php $idx = 0; ?>
                            <?php foreach ($expenses as $a) : ?>
                                <tr scope="row">
                                    <td>
                                        <?php echo $a["expense"] ?>
                                    </td>
                                    <td>
                                        <?php if($a["month"] == "01"){echo "January";} ?>
                                        <?php if($a["month"] == "02"){echo "February";} ?>
                                        <?php if($a["month"] == "03"){echo "March";} ?>
                                        <?php if($a["month"] == "04"){echo "April";} ?>
                                        <?php if($a["month"] == "05"){echo "May";} ?>
                                        <?php if($a["month"] == "06"){echo "June";} ?>
                                        <?php if($a["month"] == "07"){echo "July";} ?>
                                        <?php if($a["month"] == "08"){echo "August";} ?>
                                        <?php if($a["month"] == "09"){echo "September";} ?>
                                        <?php if($a["month"] == "10"){echo "October";} ?>
                                        <?php if($a["month"] == "11"){echo "November";} ?>
                                        <?php if($a["month"] == "12"){echo "December";} ?>
                                    </td>
                                    <td>
                                        <?php echo $a["jumlah"] ?>
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