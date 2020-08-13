<?php
require_once 'model/database.php';
require 'model/common.php';

$products = get_products();

include 'home_view.php';