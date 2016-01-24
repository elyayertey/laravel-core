@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        {!! Form::open(['url'=>'/compose/send','files'=>'false']) !!}
        <div class="row">
            <div class="col-md-2">


                @include('menu')
            </div>


            <div class="col-md-10">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Messages</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">


                                <div class="form-group">
                                    {!! form::label('email', 'Email address') !!}
                                    {!! form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Use noreply@yoursitename.com to send a message to all users')) !!}
                                </div>

                                <div class="form-group">
                                {!! form::label('subject', 'Subject') !!}
                               {!! form::text('subject', null, array('class'=>'form-control', 'placeholder'=>'Message subject here')) !!}
                                </div>

                                <div class="form-group">
                                    {!! form::label('content', 'Message') !!}
                                    {!! form::textarea('content', null, array('class'=>'form-control', 'placeholder'=>'Type your message here')) !!}
                                </div>

                                {!! form::hidden('sender_id',  Auth::user()->id, array('class'=>'form-control')) !!}




                            </div>

                        </div>
                        <div class="panel-footer">
                            {!! Form::submit('Send Message', array('class'=>'btn btn-primary')) !!}

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
