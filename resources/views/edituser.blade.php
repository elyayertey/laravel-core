@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        {!! Form::open(['url' => 'users', 'files'=>false]) !!}
        <div class="row">
            <div class="col-md-3">


                @include('menu')
            </div>


            <div class="col-md-9">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit User ::  {!! $user->firstname !!}&nbsp; {!! $user->lastname !!}</div>
                        <div class="panel-body row">

                            <div class="col-md-6">
                                <h4>Personal Information</h4>
                                <hr/>
                                <div class="form-group">
                                    {!! Form::label('name', 'Full name') !!}
                                    {!! Form::text('name', $user->name, array('class'=>'form-control')) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('firstname', 'First name') !!}
                                    {!! Form::text('firstname', $user->firstname, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('lastname', 'Last name') !!}
                                    {!! Form::text('lastname', $user->lastname, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email address') !!}
                                    {!! Form::text('email', $user->email, array('class'=>'form-control')) !!}                                </div>

                                <div class="form-group">
                                    {!! Form::label('gender', 'Gender') !!}
                                    {!! Form::select('gender',  array('male'=>'Male', 'female'=>'Female'), $user->gender, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('bio', 'Bio') !!}
                                    {!! Form::textarea('bio', $user->bio, array('class'=>'form-control')) !!}
                                </div>



                            </div>
                            <div class="col-md-6">
                                <h4>Contact Information</h4>
                                <hr/>

                                <div class="form-group">
                                    {!! Form::label('phone', 'Phone') !!}
                                    {!! Form::text('phone', $user->phone, array('class'=>'form-control')) !!}                                </div>

                                <div class="form-group">
                                    {!! Form::label('country', 'Country') !!}
                                    {!! Form::select('country',  array('United States'=>'United States', 'Ghana'=>'Ghana'), $user->country, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('state', 'State') !!}
                                    {!! Form::text('state', $user->state, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('street', 'Street address') !!}
                                    {!! Form::text('street', $user->street, array('class'=>'form-control')) !!}                                </div>

                                <div class="form-group">
                                    {!! Form::label('city', 'City') !!}
                                    {!! Form::text('city', $user->city, array('class'=>'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('zip', 'Zip code') !!}
                                    {!! Form::text('zip', $user->zip, array('class'=>'form-control')) !!}
                                </div>

                                {!! Form::hidden('id', $user->id, array('class'=>'form-control')) !!}


                            </div>

                        </div>
                        <div class="panel-footer">
                            {!! Form::submit('Save Changes', array('class'=>'btn btn-primary')) !!}

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
