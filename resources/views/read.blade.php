@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">


                @include('menu')
            </div>


            <div class="col-md-10">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">{!! $messages->subject !!}</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">

                                <div class="subject"><h4><div class="content"> {!! $messages->subject !!}</h4></div>
                                <hr/>
                                <div class="content"> <p>{!! $messages->content !!}</p></div>
                                <hr/>
                                <h3>Reply</h3>

                                @foreach($replies as $reply)

                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>{!! $reply->firstname !!} {!! $reply->lastname !!}</b> | RE:  {!! $reply->subject !!}</div>
                                        <div class="panel-body">
                                            <p> {!! $reply->created_at !!}</p>
                                            <p>{!! $reply->content !!}</p>
                                        </div>
                                        </div>

                                    @endforeach
                                <div> {!! $replies->links() !!}</div>
                                <hr/>
                                {!! Form::open(array('url'=>'/messages/read/'.$messages->id )) !!}
                                <div class="form-group content">{!! Form::textarea('content', null, array('class'=>'form-control')) !!}</div>
                                <div class="form-group"> {!! Form::submit('Reply', array('class'=>'btn btn-primary')) !!}</div>
                                {!! form::hidden('user_id',  Auth::user()->id, array('class'=>'form-control')) !!}
                                {!! form::hidden('subject',  $messages->subject) !!}
                                {!! form::hidden('email',  $messages->email) !!}
                                {!! form::hidden('message_id',  $messages->id) !!}
                                {!! Form::close() !!}

                            </div>

                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
