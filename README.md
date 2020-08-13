
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Challenge details:  
OurHotels is a hotel search solution that looks into many providers and displays results from all the available hotels, for now, we are aggregate from two providers: BestHotels and  TopHotel.

### What is required:
Implement OurHotels service that should return results from both providers (BestHotels and TopHotel), the result should be a JSON response with a valid HTTP status code of all available hotels ordered by hotel rate.
OurHotels API (the aggregator API which you are going to build):Request:
    - from_date: ISO_LOCAL_DATE
    - to_date: ISO_LOCAL_DATE
    - city:  IATA code (AUH)
    - adults_ number: integer number
Response:
    - provider: name of the provider (BestHotels or TopHotels)
    - hotelName: Name of the hotel
    - fare: fare per night
    - amenities: array of strings
Providers API details:BestHotel  API:
Request:
     - fromDate  ISO_LOCAL_DATE
     - toDate   ISO_LOCAL_DATE
     - city  IATA code (AUH)
     - numberOfAdults: integer number
Response:
     - hotel: Name of the hotel
      - hotelRate: Number from 1-5
      - hotelFare: Total price rounded to 2 decimals
      - roomAmenities: String of amenities separated by comma 

TopHotels API: Request:
     - from  ISO_INSTANT
     - To  ISO_INSTANT
     - city:  IATA code (AUH)
     - adultsCount: integer number
Response:
     - hotelName: Name of the hotel
     - rate: String of '*' (from 1 to 5)
     - price: Price of the hotel per night
     - discount: discount on the room (if available).
     - amenities: array of strings.

 ### What you need to implement:
A solution that meets the above requirements.
You should consider the scalability in your solution, which means if we are going to add a new provider in the future, that should apply in a minimum of changes and without affecting the current integration providers.
a ready to integrate push notification service if a new hotel is added.
Additional Instructions:
Please make sure that your code:
     - Documented
     - Readable
     - Covered by unit tests. You can also cover it with any other tests you want.
    - Don't use a database in your implementation, it's just calling dummy URLs(example: “localhost:8080/CrazyHotels”).

## Installation guide

CD into the directory of this project and run the following three commands:

1.  `cp .env.example .env` then update environment options.
2. `composer install`
3.  `php artisan migrate`
4.  `php artisan db:seed`

## Running test cases

CD into the directory of this project and run the following three commands:

1. Unit testing test cases `vendor/bin/phpunit tests/Unit/`
2. Integration testing test cases`vendor/bin/phpunit tests/Feature/`
3.  You can run all test cases`vendor/bin/phpunit tests`

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
