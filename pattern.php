<?php
require_once ('registry.php');

/*
 * =====================================
 *           USING OF REGISTRY
 * =====================================
 */

Product::set('name', 'First product');

print_r(Product::get('name'));
// First product