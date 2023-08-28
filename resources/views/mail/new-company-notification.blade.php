<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">New Company Notification</h1>
                    <p class="lead">There is a new company "<strong>{{ $company->name }}</strong>" that has joined us!
                    </p>

                    <hr class="my-4">

                    <h4>Company Name: <strong>{{ $company->name }}</strong></h4>


                    <h4>Company Description:</h4>
                    <p>{{ $company->description }}</p>

                    <a class="btn btn-primary btn-lg" href="{{ route('dashboard.companies.show', $company)}}" role="button">
                        <i class="fa fa-eye"></i> View Company Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center">
        Regards, <br>
        The {{ config('app.name') }} Team
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
