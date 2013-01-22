<?php


// /bundles/gravvy/start.php
Autoloader::map(array(
    'Gravvy' => path('bundle').'gravvy/gravvy.php'
));

Autoloader::map(array(
    'Gravvy_Preview_Controller' => Bundle::path('gravvy').'controllers/preview.php',
));