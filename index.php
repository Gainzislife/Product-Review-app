<?php
require_once 'model/database.php';
require 'model/product_db.php';

$products = get_products();

include 'view/home_view.php';