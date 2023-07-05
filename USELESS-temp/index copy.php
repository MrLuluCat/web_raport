<?php

require 'View.php';

// Define sections
View::section('title', 'Home');
View::section('css', '');
// View::section('header', 'This is the header of the Home page');
View::section('content', 'INDEX TEST FILE
');
// View::section('footer', 'This is the footer of the Home page');

// Render the home view
View::extend('views/layout.php');
