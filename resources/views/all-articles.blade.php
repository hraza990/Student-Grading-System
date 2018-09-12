<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">


                        <h2>ASP TASK-1</h2>

                        <h1><a href="{{ route('articles') }}">View Articles</a></h1>
                        {{ Form::open(['route' => 'savedata', 'files' => true]) }}

                        <div class="form-group">
                            {{ Form::label('category', 'Select Category:', array('class' => 'control-label')) }}
                            {{ Form::select('category', $categoriesList, old('category'), ['class' => 'form-control', 'placeholder' => 'Select user\'s Category', 'required']) }}
                        </div>

                            <br />
                                                        <br />

                            <br />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Enter Text Here</label>
                                <textarea name="article" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <br />
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>

                                <input required type="file" class="form-control" name="images[]" placeholder="Select Images" id="exampleFormControlFile1" multiple>

                            </div>

                            <br />
                            <input type="submit" value="Submit" class="submit" />
                        {{ Form::close() }}
                    
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
