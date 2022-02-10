<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;

$faker = Faker\Factory::create();

?>

<!--<!DOCTYPE html>-->
<html>
 <head>
  <meta charset="utf-8" />
  <title>Document</title>
 </head>
 <body>
 <div style="display: flex;">
     <div>
         <img src="<?php echo $faker->imageUrl(140,180); ?>" alt="Jons" />
     </div>
     <div>
         <ul style="list-style-type: none;font-size: 20px;align-content: flex-start">
             <li><?php echo $faker->firstName(); ?></li>
             <li><?php echo $faker->lastName(); ?></li>
             <li><?php echo $faker->randomNumber(); ?></li>
             <li><?php echo $faker->email(); ?></li>
             <li><?php echo $faker->phoneNumber(); ?></li>
             <li><?php echo $faker->address(); ?></li>
         </ul>
     </div>
 </div>
 </body>
</html>