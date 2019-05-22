@extends('layouts.app')


@section('style')
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

        {
            border: 2px red solid;
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
            margin-bottom: 20vh
        }

        .title {
            font-size: 64px;
        }


        .links > span {
            color: #636b6f;
            padding: 0 25px;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
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

        .alerts{
            margin-top: 1vh;
        }
    </style>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/teacher') }}">Teacher</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Student
        </div>
        @if(\Illuminate\Support\Facades\DB::table('mcq')->where('id', '=', '3')->value('id'))
        <div class="links">
            <span>
                <?php
                    $last = \App\mcq ::orderBy('id', 'desc')->first()->id + 1;
                ?>
                @if(empty($_GET))
                    {{'Q'.$num = 1}}
                    @else
                        {{'Q' . $num = $_GET['num']}}
                @endif
                @if($num < $last)
                    - {{DB::table('mcq')->where('id', '=', $num)->value('Question')}}
                @else
                    - No More Questions <br>
                    <span class="text-success">Thanks For Your Time</span>
                @endif
            </span>
            @if($num < $last )

            <form>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputState">Answer</label>
                    <select id="inputState" class="form-control dynamic">
                        <option selected>Choose...</option>
                        <option class="Ans" value="{{DB::table('mcq')->where('id', '=', $num)->value('Ans1')}}">{{DB::table('mcq')->where('id', '=', $num)->value('Ans1')}}</option>
                        <option class="Ans" value="{{DB::table('mcq')->where('id', '=', $num)->value('Ans2')}}">{{DB::table('mcq')->where('id', '=', $num)->value('Ans2')}}</option>
                        <option class="Ans" value="{{DB::table('mcq')->where('id', '=', $num)->value('Ans3')}}">{{DB::table('mcq')->where('id', '=', $num)->value('Ans3')}}</option>
                        <option class="Ans" value="{{DB::table('mcq')->where('id', '=', $num)->value('Ans4')}}">{{DB::table('mcq')->where('id', '=', $num)->value('Ans4')}}</option>
                    </select>
                </div>
                </div>
            </form>
            @endif
        </div>
        @else
            <div class="links">
                <span class="text-danger">There aren't enough questions to start the exam</span>
            </div><br>
            <div class="links">
                <a href="{{url('teacher')}}">Add Questions</a>
            </div>
            <?php $num = 0 ?>
        @endif
        <div class="alerts">
            <div class="feedback correct alert alert-success text-success" style="display: none">
                Correct!
            </div>
            <div class="feedback incorrect alert alert-danger text-danger" style="display: none">
                Incorrect!
            </div>
        </div>

        <form class="next" action="{{url('student')}}" method="get" style="display: none;">
            <input type="hidden" name="num" value="{{$num + 1}}">
            <div class="form-group row mb-0">
                <div class="col-md-2 offset-md-4">
                    <button type="submit"  class="btn btn-primary">
                        Next Question
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {

            <?php $correct = DB::table('mcq')->where('id', '=', $num)->value('Correct') ?>
            $('#inputState').on('change', function() {
                if ( this.value == '{{$correct}}')
                {
                    $(".correct").show();
                    $(".incorrect").hide();
                    $(".next").show();
                }
                else
                {
                    $(".incorrect").show();
                    $(".correct").hide();
                    $(".next").hide();
                }
            });
        });
    </script>
@endsection
