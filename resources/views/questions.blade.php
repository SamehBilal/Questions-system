@extends('layouts.app')

@section('nav')

    <div id="app">
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
    <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
        <div class="card-header">Questions</div>
        <div class="card-body">
        <table class="table">
            <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Answer 1</th>
            <th scope="col">Answer 2</th>
            <th scope="col">Answer 3</th>
            <th scope="col">Answer 4</th>
            <th scope="col">Correct</th>
        </tr>
        </thead>
        <tbody>
        @for($i=1;$i<\App\mcq ::orderBy('id', 'desc')->first()->id + 1;$i++)
        <tr>
            <th scope="row">{{DB::table('mcq')->where('id', '=', $i)->value('id')}}</th>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Question')}}</td>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Ans1')}}</td>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Ans2')}}</td>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Ans3')}}</td>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Ans4')}}</td>
            <td>{{DB::table('mcq')->where('id', '=', $i)->value('Correct')}}</td>

        </tr>
        @endfor
        </tbody>
        </table>
            <div class=" row mb-0">
                <div class="col-md-3 offset-md-4">
                    <a href="{{url('teacher')}}"  class="btn btn-primary">
                        {{ __('Add more questions') }}
                    </a>
                </div>
                <div class="col-md-2">
                        <a href="{{url('/student')}}" class="btn btn-success">
                            {{ __('Go to exam') }}
                        </a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
@endsection
