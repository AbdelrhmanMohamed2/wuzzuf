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
                    <h1 class="display-4">Congratulations on Your New Role at {{ $job->company->name }}</h1>

                    <p class="lead">Dear {{ $employee->user->full_name }},

                        I hope this email finds you well. I wanted to extend my heartfelt congratulations on your
                        acceptance of the job with {{ $job->company->name }}. We wish you all the best in your new
                        endeavor.

                        If you have any questions or need assistance during your transition, feel free to reach out.
                        We're here to support you every step of the way.

                        Regards, <br>
                        The {{ config('app.name') }} Team
                    </p>

                    <hr class="my-4">

                    <h4>The Company: <strong>{{ $job->company->name }}</strong> Sends You this Email:</h4>


                    <p>{{ $email }}</p>

                    <a class="btn btn-primary btn-lg" href="{{ route('companies.show', $job->company) }}"
                        role="button">
                        <i class="fa fa-eye"></i> View Company Profile
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
