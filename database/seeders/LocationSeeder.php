<?php

namespace Database\Seeders;

use App\Models\Admin\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                "name" => "USA",
                "cities" => [
                    [
                        "name" => "New York",
                        "areas" => [
                            "Manhattan",
                            "Brooklyn"
                        ]
                    ],
                    [
                        "name" => "Los Angeles",
                        "areas" => [
                            "Hollywood",
                            "Beverly Hills",
                            "Santa Monica"
                        ]
                    ],
                    [
                        "name" => "Chicago",
                        "areas" => [
                            "Downtown",
                            "Lincoln Park"
                        ]
                    ],
                    [
                        "name" => "Houston",
                        "areas" => [
                            "Downtown",
                            "Galleria"
                        ]
                    ],
                    [
                        "name" => "Miami",
                        "areas" => [
                            "South Beach",
                            "Downtown"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Canada",
                "cities" => [
                    [
                        "name" => "Toronto",
                        "areas" => [
                            "Downtown",
                            "Yorkville"
                        ]
                    ],
                    [
                        "name" => "Vancouver",
                        "areas" => [
                            "Downtown",
                            "Gastown",
                            "Yaletown"
                        ]
                    ],
                    [
                        "name" => "Montreal",
                        "areas" => [
                            "Old Montreal",
                            "Plateau-Mont-Royal"
                        ]
                    ],
                    [
                        "name" => "Calgary",
                        "areas" => [
                            "Downtown",
                            "Kensington"
                        ]
                    ],
                    [
                        "name" => "Ottawa",
                        "areas" => [
                            "Downtown",
                            "Byward Market"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Mexico",
                "cities" => [
                    [
                        "name" => "Mexico City",
                        "areas" => [
                            "Polanco",
                            "Condesa"
                        ]
                    ],
                    [
                        "name" => "Cancun",
                        "areas" => [
                            "Hotel Zone",
                            "Downtown"
                        ]
                    ],
                    [
                        "name" => "Guadalajara",
                        "areas" => [
                            "Downtown",
                            "Tlaquepaque"
                        ]
                    ],
                    [
                        "name" => "Puerto Vallarta",
                        "areas" => [
                            "Old Town",
                            "Marina"
                        ]
                    ],
                    [
                        "name" => "Tijuana",
                        "areas" => [
                            "Downtown",
                            "Zona Rio"
                        ]
                    ]
                ]
            ],
            [
                "name" => "United Kingdom",
                "cities" => [
                    [
                        "name" => "London",
                        "areas" => [
                            "West End",
                            "Camden"
                        ]
                    ],
                    [
                        "name" => "Manchester",
                        "areas" => [
                            "Northern Quarter",
                            "Spinningfields"
                        ]
                    ],
                    [
                        "name" => "Edinburgh",
                        "areas" => [
                            "Old Town",
                            "New Town"
                        ]
                    ],
                    [
                        "name" => "Birmingham",
                        "areas" => [
                            "Jewellery Quarter",
                            "Digbeth"
                        ]
                    ],
                    [
                        "name" => "Bristol",
                        "areas" => [
                            "Clifton",
                            "Harbourside"
                        ]
                    ]
                ]
            ],
            [
                "name" => "France",
                "cities" => [
                    [
                        "name" => "Paris",
                        "areas" => [
                            "Le Marais",
                            "Saint-Germain-des-Prés"
                        ]
                    ],
                    [
                        "name" => "Marseille",
                        "areas" => [
                            "Vieux-Port",
                            "Le Panier"
                        ]
                    ],
                    [
                        "name" => "Lyon",
                        "areas" => [
                            "Vieux Lyon",
                            "Croix-Rousse"
                        ]
                    ],
                    [
                        "name" => "Nice",
                        "areas" => [
                            "Vieux Nice",
                            "Cimiez"
                        ]
                    ],
                    [
                        "name" => "Toulouse",
                        "areas" => [
                            "Capitole",
                            "Saint-Cyprien"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Germany",
                "cities" => [
                    [
                        "name" => "Berlin",
                        "areas" => [
                            "Mitte",
                            "Kreuzberg"
                        ]
                    ],
                    [
                        "name" => "Munich",
                        "areas" => [
                            "Marienplatz",
                            "Schwabing",
                            "Haidhausen"
                        ]
                    ],
                    [
                        "name" => "Hamburg",
                        "areas" => [
                            "Schanzenviertel",
                            "HafenCity"
                        ]
                    ],
                    [
                        "name" => "Frankfurt",
                        "areas" => [
                            "Altstadt",
                            "Sachsenhausen"
                        ]
                    ],
                    [
                        "name" => "Cologne",
                        "areas" => [
                            "Altstadt",
                            "Ehrenfeld"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Italy",
                "cities" => [
                    [
                        "name" => "Rome",
                        "areas" => [
                            "Trastevere",
                            "Monti"
                        ]
                    ],
                    [
                        "name" => "Florence",
                        "areas" => [
                            "Duomo",
                            "Oltrarno"
                        ]
                    ],
                    [
                        "name" => "Venice",
                        "areas" => [
                            "San Marco",
                            "Dorsoduro"
                        ]
                    ],
                    [
                        "name" => "Milan",
                        "areas" => [
                            "Brera",
                            "Navigli"
                        ]
                    ],
                    [
                        "name" => "Naples",
                        "areas" => [
                            "Spaccanapoli",
                            "Chiaia"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Spain",
                "cities" => [
                    [
                        "name" => "Barcelona",
                        "areas" => [
                            "Gothic Quarter",
                            "El Raval"
                        ]
                    ],
                    [
                        "name" => "Madrid",
                        "areas" => [
                            "Sol",
                            "Malasaña"
                        ]
                    ],
                    [
                        "name" => "Seville",
                        "areas" => [
                            "Santa Cruz",
                            "Triana"
                        ]
                    ],
                    [
                        "name" => "Valencia",
                        "areas" => [
                            "Ciutat Vella",
                            "Ruzafa"
                        ]
                    ],
                    [
                        "name" => "Granada",
                        "areas" => [
                            "Albaicín",
                            "Sacromonte"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Australia",
                "cities" => [
                    [
                        "name" => "Sydney",
                        "areas" => [
                            "Circular Quay",
                            "Darlinghurst"
                        ]
                    ],
                    [
                        "name" => "Melbourne",
                        "areas" => [
                            "Fitzroy",
                            "St Kilda"
                        ]
                    ],
                    [
                        "name" => "Brisbane",
                        "areas" => [
                            "South Bank",
                            "West End"
                        ]
                    ],
                    [
                        "name" => "Perth",
                        "areas" => [
                            "Northbridge",
                            "Fremantle"
                        ]
                    ],
                    [
                        "name" => "Adelaide",
                        "areas" => [
                            "Glenelg",
                            "North Adelaide"
                        ]
                    ]
                ]
            ],
            [
                "name" => "Japan",
                "cities" => [
                    [
                        "name" => "Tokyo",
                        "areas" => [
                            "Shibuya",
                            "Shinjuku",
                            "Ginza"
                        ]
                    ],
                    [
                        "name" => "Kyoto",
                        "areas" => [
                            "Gion",
                            "Arashiyama"
                        ]
                    ],
                    [
                        "name" => "Osaka",
                        "areas" => [
                            "Dotonbori",
                            "Umeda"
                        ]
                    ],
                    [
                        "name" => "Fukuoka",
                        "areas" => [
                            "Tenjin",
                            "Hakata"
                        ]
                    ],
                    [
                        "name" => "Sapporo",
                        "areas" => [
                            "Susukino",
                            "Odori Park"
                        ]
                    ]
                ]
            ]
        ];

        foreach ($countries as $country) {
            // echo "Country: " . $country['name'] . "<br>";
            $country_location = Location::factory(1)->create(['name' => $country['name'], 'type' => 'country'])->first();
            foreach ($country['cities'] as $city) {
                // echo "&nbsp;&nbsp;&nbsp;City: " . $city['name'] . "<br>";
                $city_location = Location::factory(1)->create(['name' => $city['name'], 'type' => 'city', 'parent_id' => $country_location->id])->first();
                foreach ($city['areas'] as $area) {
                    Location::factory(1)->create(['name' => $area, 'type' => 'area', 'parent_id' => $city_location->id]);
                }
            }
        }
    }
}
