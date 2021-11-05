@extends('template')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    Welcome my Solas Test!
                    <a href="{{route('home.main')}}" class="btn btn-outline-success btn-sm float-end">Start</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="fw-bold">Specifications:</p>
                            <p>We have a shortlist of affiliate contact records in a text file (affiliates.txt) --
                                one
                                affiliate per line, JSON-encoded. We want to invite any affiliate that lives within
                                100km of our Dublin office for some food and drinks using this text file as the
                                input
                                (Don't alter). Write a program that will read the full list of affiliates from this
                                txt
                                file and output the name and affiliate ids of matching affiliates (within 100km),
                                sorted
                                by Affiliate ID (ascending).</p>

                            <p>You can use the first formula from this [Wikipedia
                                article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance.
                            </p>
                            <p>Don't forget, you'll need to convert degrees to radians.</p>

                            <p>The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.</p>

                            <p>You can find the affiliate list in this repository called affiliates.txt.</p>

                            <p>Please don’t forget, your code should be production ready, clean and tested!</p>

                            <p class="fw-bold">Nice to haves:</p>
                            <ul>
                                <li>Demonstrate understanding of MVC</li>
                                <li>Unit Tests</li>
                                <li>Basic HTML output</li>
                                <li>Usage of a PHP Framework (Not necessary but as a Laravel based company it's a
                                    bonus)</li>
                                <li>Use original txt file as input</li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <p class="fw-bold">Technologies used:</p>
                            <ul>
                                <li>PHP 7.4.15</li>
                                <li>Laravel 8.65</li>
                                <li>PHP Unit Tests</li>
                                <li>Bootstrap 5.1</li>
                                <li>JQuery 3.6.0</li>
                                <li>Datatables 1.11.3</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
