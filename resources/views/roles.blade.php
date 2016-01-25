@extends('layouts.app')

@section('heading')

    {{ Html::style('css/style.css') }}
    <meta name="_token" content="{!! csrf_token() !!}"/>

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">


                @include('menu')
            </div>


            <div class="col-md-6">
                @include('alerts')
                <div class="row">
                    {!! Form::open(['url' => 'users/roles', 'files'=>true]) !!}

                    <div class="panel panel-default">
                        <div class="panel-heading">Add User Roles</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">

                                <div class="form-group">
                                    {!! Form::label('name', 'Role name') !!}
                                    {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                    </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', null, array('class'=>'form-control')) !!}

                                </div>


                            </div>


                        </div>
                        <div class="panel-footer">
                        {!! Form::submit('Create role', array('class'=>'btn btn-primary')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">User Roles</div>
                    <div class="panel-body">
                        Create Administrator First
                        <ul class="list-group">
                            @foreach($roles as $role)
                            <li class="row_{!! $role->id !!} list-group-item">{!! $role->name !!} <a href="/users/roles/delete" data-action="delete" id="{!! $role->id !!}" class="action close">&times;</a> </li>
                                @endforeach
                        </ul>
                        </div>
                    <div>
                    </div>
            </div>

        </div>


    </div>
    </div>

    {!! HTML::script('js/action.js') !!}

@endsection
