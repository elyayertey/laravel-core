@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        {!! Form::open(['url' => 'settings', 'files'=>true]) !!}
        <div class="row">
            <div class="col-md-3">


                @include('menu')
            </div>


            <div class="col-md-9">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Administrator</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">



                            </div>

                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
