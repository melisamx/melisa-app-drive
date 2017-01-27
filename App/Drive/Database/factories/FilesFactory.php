<?php

use App\Core\Models\Identities;
use App\Drive\Models\Files;
use App\Drive\Models\Units;
use App\Drive\Models\MimesTypes;

$factory->define(Files::class, function(Faker\Generator $faker) {
    
    return [
        'idUnit'=>function() {
            return Units::inRandomOrder()->get()->first()->id;
        },
        'idMimeType'=>function() {
            return MimesTypes::inRandomOrder()->get()->first()->id;
        },
        'idIdentityCreated'=>function() {
            return Identities::inRandomOrder()->get()->first()->id;
        },
        'name'=>$faker->name,
        'starred'=>$faker->boolean,
        'trashed'=>$faker->boolean,
        'editing'=>$faker->boolean,
        'size'=>$faker->randomFloat(2, 1, 99999),
        'md5Checksum'=>$faker->md5,
        'fileExtension'=>$faker->fileExtension,
        'originalFilename'=>$faker->name,
        'version'=>$faker->randomFloat(1, 1, 99),
    ];
    
});
