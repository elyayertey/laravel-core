@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        {!! Form::open(['url' => 'passwords', 'files'=>true]) !!}
        <div class="row">
            <div class="col-md-3">

               @include('menu')

            </div>


            <div class="col-md-9">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Account Settings</div>
                        <div class="panel-body row">

                            <div class="col-md-6">
                                <h4>Change password</h4>
                                <hr/>

                                <div class="form-group">
                                    {!! Form::label('newpassword', 'New password') !!}
                                    {!! Form::password('newpassword', array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('repeatpassword', 'Repeat password') !!}
                                    {!! Form::password('repeatpassword', array('class'=>'form-control')) !!}
                                </div>

                            </div>
                        </div>
                        <div class="panel-footer">
                            {!! Form::submit('Change password', array('class'=>'btn btn-primary')) !!}

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
