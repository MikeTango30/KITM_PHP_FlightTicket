<?php
/**
 * Created by PhpStorm.
 * User: moksleivis
 * Date: 2020-01-15
 * Time: 10:24
 */
/*
Klasė: 5b
    o Kodas (turi būti sugeneruotas naudojant rand funkciją)
    o Duomenų formavimo data (turi būti šios dienos naudojant date funkciją, lietuvišku
    formatu)
    o Vardas (turi būti transformuotas į didžiąsias raides)
    o Pavardė (turi būti transformuota į didžiąsias raides)
    o Kontrolinių darbų įvertinimai:
         Matematika: 5
         Informacinės technologijos: 9
         Anglų kalba: 10
*/

$flightsData = [
    "flightNumbers" => [
        "LT-".rand(100, 999)."-".rand(10,99),
        "UK-".rand(100,999)."-".rand(10,99),
        "FIN-".rand(100,999)."-".rand(10,99),
        "US-".rand(100,999)."-".rand(10,99),
        "PL-".rand(100,999)."-".rand(10,99),
        "LV-".rand(100,999)."-".rand(10,99),
        "EST-".rand(100,999)."-".rand(10,99),
        "NO-".rand(100,999)."-".rand(10,99)
    ],
    "from" => [
        "Orion Sigma 5",
        "Belt Port 35701",
        "Palanga",
        "Interdimensional wormhole G-72"
    ],
    "to" => [
        "Rome Italy",
        "Rome Mars",
        "Rome Venus",
        "Rome Betlegeuce"
    ]
];





