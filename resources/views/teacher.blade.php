@extends('layouts.app')

@section('nav')

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Focus
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endsection

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Add Questions <span class="text-danger">( 3 Questions at least)</span></div>
                        <div class="card-body">
                            <form method="post" action="{{url('teacher')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="Question" class="col-md-4 col-form-label text-md-right">
                                        @if(DB::table('mcq')->where('id', '=', '1')->value('Question'))
                                            <?php $last = \App\mcq ::orderBy('id', 'desc')->first()->id + 1;?>
                                            {{ __('Question ').$last }}
                                        @else
                                            {{ __('Question 1') }}
                                        @endif
                                    </label>
                                    <div class="col-md-6">
                                        <input id="Question" type="text" class="form-control @error('Question') is-invalid @enderror" name="Question" value="{{ old('Question') }}" required autocomplete="Question" autofocus>
                                        @error('Question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Ans1" class="col-md-4 col-form-label text-md-right">{{ __('Answer 1') }}</label>
                                    <div class="col-md-4">
                                        <input id="Ans1" type="text" class="form-control @error('Ans1') is-invalid @enderror" name="Ans1" value="{{ old('Ans1') }}" required autocomplete="Ans1" autofocus>
                                        @error('Ans1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Ans2" class="col-md-4 col-form-label text-md-right">{{ __('Answer 2') }}</label>
                                    <div class="col-md-4">
                                        <input id="Ans2" type="text" class="form-control @error('Ans2') is-invalid @enderror" name="Ans2" value="{{ old('Ans2') }}" required autocomplete="Ans2" autofocus>
                                        @error('Ans2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Ans3" class="col-md-4 col-form-label text-md-right">{{ __('Answer 3') }}</label>
                                    <div class="col-md-4">
                                        <input id="Ans3" type="text" class="form-control @error('Ans3') is-invalid @enderror" name="Ans3" value="{{ old('Ans3') }}" required autocomplete="Ans3" autofocus>
                                        @error('Ans3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Ans4" class="col-md-4 col-form-label text-md-right">{{ __('Answer 4') }}</label>
                                    <div class="col-md-4">
                                        <input id="Ans4" type="text" class="form-control @error('Ans4') is-invalid @enderror" name="Ans4" value="{{ old('Ans4') }}" required autocomplete="Ans4" autofocus>
                                        @error('Ans4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-2 offset-md-4">
                                        <a  class="btn select btn-secondary" style="color: #fff">
                                            Select Correct Answer
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="alert alert-select alert-danger text-center" style="display:none;">Select Correct Answer </div>
                                <div class="form-group core row" style="display: none;">
                                    <label for="Correct" class="col-md-4 col-form-label text-md-right">Correct Answer</label>
                                    <div class="col-md-4">
                                        <select id="Correct" class="form-control @error('Correct') is-invalid @enderror" name="Correct" required autocomplete="Correct" autofocus>
                                            <option selected>Choose...</option>
                                        </select>
                                    </div>
                                    @error('Correct')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-2 offset-md-4">
                                        <button id="submit" type="submit" name="button" class="btn btn-primary">
                                            {{ __('Add Question') }}
                                        </button>
                                    </div>
                                    @if(DB::table('mcq')->where('id', '=', '3')->value('Question'))
                                        <div class="col-md-2">
                                            <a href="{{url('/questions')}}" class="btn btn-success">
                                                {{ __('View Questions') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
       /* $('#submit').click(function () {
            if ( $("#Correct").html('Choose...')){
                $('.alert-select').show()
            }else{

            }
        });*/

        $('.select').click(function () {

            if ($("#Ans1").val() != '' && $("#Ans2").val() != '' && $("#Ans3").val() != '' && $("#Ans4").val() != '')
            {
                var value = $("#Ans1").val();
                var value1 = $("#Ans2").val();
                var value2 = $("#Ans3").val();
                var value3 = $("#Ans4").val();
                $(".core").show();
                $("#Correct").append("<option value =" + value + " >" + value + "</option>");
                $("#Correct").append("<option value =" + value1 + " >" + value1 + "</option>");
                $("#Correct").append("<option value =" + value2 + " >" + value2 + "</option>");
                $("#Correct").append("<option value =" + value3 + " >" + value3 + "</option>");
            }else {
                $(".core").hide();
            }
        });
    </script>
@endsection
