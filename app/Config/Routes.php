<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Start Shops
$routes->get('shops', 'Shops::index');
$routes->post("shops/post", "Shops::addShop");
$routes->get("shops/(:any)/delete", "Shops::deleteShop/$1");
$routes->post("shops/(:any)/edit", "Shops::editShop/$1");
// End Shops
$routes->group("stuff", function ($routes) {
    // Start Stuff
    $routes->get('data_stuff', 'Stuff::index');
    $routes->get('data_stuff/(:any)', 'Stuff::filter/$1');
    $routes->post('stuff_post/(:any)/post', 'Stuff::addStuff/$1');
    $routes->delete('stuff_delete/(:any)/delete', 'Stuff::deleteStuff/$1');
    $routes->put('stuff_edit/(:any)/edit', 'Stuff::editStuff/$1');
    // End Stuff

    //Start Category
    $routes->get("data_category", "Category::index");
    $routes->post("category_post", "Category::addCategory");
    $routes->delete("category_delete/(:any)/delete", "Category::deleteCategory/$1");
    $routes->put("category_edit/(:any)/edit", "Category::editCategory/$1");
    //End Category
});

// Start Shopping
$routes->get("shopping", "Shopping::index/not finish");
$routes->get("shopping/not_finish", "Shopping::index/not finish");
$routes->get("shopping/finish", "Shopping::index/finish");
$routes->post("shopping/shopping_post", "Shopping::addShopping");
$routes->get("getItems", "Shopping::getItems/");
$routes->get("getItemsList/(:any)", "Shopping::getItemsList/$1");
$routes->post("itemsList_post/(:any)", "Shopping::addItemsList/$1");
$routes->put("finish_payment/(:any)", "Shopping::finishPayment/$1");
$routes->delete("itemsList_delete/(:any)", "Shopping::deleteItem/$1");
$routes->delete("delete_shopping_list/(:any)", "Shopping::deleteList/$1");
$routes->put("edit_shopping/(:any)", "Shopping::editShopping/$1");
// $routes->put("change_status/(:any)", "Shopping::changeStatus/$1");
// End Shopping

// Start Routes
$routes->get("box", "Box::index");
$routes->get("expenses", "Box::expenses");
$routes->put("update_status/(:any)", "Box::updateStatus/$1");
