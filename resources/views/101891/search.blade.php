<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

     <!-- Styles -->
     <style>
         html, body {
             background-color: #fff;
             color: #636b6f;
             font-family: 'Nunito', sans-serif;
             font-weight: 200;
             height: 100vh;
             margin: 0;
         }

         .full-height {
             height: 100vh;
         }

         .flex-center {
             align-items: center;
             display: flex;
             justify-content: center;
         }

         .position-ref {
             position: relative;
         }

         .top-right {
             position: absolute;
             right: 10px;
             top: 18px;
         }

         .content {
             text-align: center;
         }

         .title {
             font-size: 84px;
         }

         .links > a {
             color: #636b6f;
             padding: 0 25px;
             font-size: 13px;
             font-weight: 600;
             letter-spacing: .1rem;
             text-decoration: none;
             text-transform: uppercase;
         }

         .m-b-md {
             margin-bottom: 30px;
         }

         .container{
            margin-top: 60px;
        }
        
     </style>
</head>
<body>

        <div class="top-right links">
                <a href='/'>Home</a>
                <a href="/student">Student</a>
                <a href="/fees">Fees</a>
                
            </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/search">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('name') is-invalid @enderror" name="number" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        @php
           //print_r($fees); 
        @endphp
            @if (isset($fees))
            <table class="table">
                    <thead>
                        <tr>
                        
                        <th scope="col">Student Number</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date of Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($fees))
                            @foreach ($fees as $objects)
                            <tr>
                                <td>{{$objects->student->student_number}}</td>
                                <td>{{$objects->student->student_name}}</td>
                                <td>{{$objects->amount}}</td>
                                <td>{{$objects->DOP}}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @endif
    </div>
</div>
</body>
</html>