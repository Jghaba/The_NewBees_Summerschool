<?php 

$user = wp_get_current_user();

echo var_dump($user->roles);