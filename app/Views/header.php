<header>
    <div class="my-container">
        <div class="nav-items">
            <div class="link d-none d-md-flex">
                <a href="<?php echo base_url("/") ?>">
                    Home
                </a>
                <a href="<?php echo base_url("shops") ?>">
                    Shops
                </a>
                <div class="sub-link-parent">
                    Data
                    <div class="sub-link">
                        <a href="<?php echo base_url("stuff/data_stuff") ?>">Data Stuff</a>
                        <a href="<?php echo base_url("stuff/data_category") ?>">Data Category</a>
                    </div>
                </div>
                <a href="<?php echo base_url("shopping") ?>">Shopping</a>
                <a href="<?php echo base_url("box") ?>">Box</a>
                <a href="<?php echo base_url("expenses") ?>">Expenses</a>
            </div>
            <div class="d-flex">
                <h2 class="me-4">myApp</h2>
                <img src="<?php echo base_url("assets/img/person-circle.svg") ?>" width="32">
            </div>
            <a id="hamburger" class="d-md-none d-block">
                <img src="<?php echo base_url("assets/img/list.svg") ?>" width="27">
            </a>
        </div>
    </div>
</header>
<div class="link-mobile d-md-none d-block">
    <div class="link-mobile-parent">
        <a href="<?php echo base_url("/") ?>">
            Home
        </a>
        <a class="mt-2" href="<?php echo base_url("shops") ?>">
            Shops
        </a>
        <div class="mt-2 sub-link-parent-mobile">
            <div>
                <span class="me-1">Data</span>
                <img class="show-link-icon" src="<?php echo base_url("assets/img/caret-down-fill.svg") ?>" width=12 height=12>
            </div>
            <div class="sub-link-mobile">
                <div class="sub-link-mobile-item">
                    <a href="<?php echo base_url("stuff/data_stuff") ?>">Data Stuff</a>
                    <a href="<?php echo base_url("stuff/data_category") ?>">Data Category</a>
                </div>
            </div>
        </div>
        <a class="mt-2" href="<?php echo base_url("shopping") ?>">Shopping</a>
        <a class="mt-2" href="<?php echo base_url("box") ?>">Box</a>
        <a class="mt-2" href="<?php echo base_url("expenses") ?>">Expenses</a>
    </div>
</div>
<div class="background-transparent">

</div>