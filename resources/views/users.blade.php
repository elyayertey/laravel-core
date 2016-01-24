@extends('layouts.app')

@section('heading')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        {!! Form::open(['url' => 'settings', 'files'=>true]) !!}
        <div class="row">
            <div class="col-md-2">


                @include('menu')
            </div>


            <div class="col-md-10">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">

                               <table class="table table-bordered">
                                   <tr>
                                       <th>First name</th>
                                       <th>Last name</th>
                                       <th>Display name</th>
                                       <th>Gender</th>
                                       <th>Email address</th>
                                       <th>Phone number</th>
                                       <th>Country</th>
                                       <th>Actions</th>
                                   </tr>
                                   @foreach($users as $user)
                                   <tr>
                                       <td>{!! $user->firstname !!}</td>
                                       <td>{!! $user->lastname !!}</td>
                                       <td>{!! $user->name !!}</td>
                                       <td>{!! $user->gender !!}</td>
                                       <td>{!! $user->email !!}</td>
                                       <td>{!! $user->phone !!}</td>
                                       <td>{!! $user->country !!}</td>
                                       <td>
                                           <i class="fa fa-edit"></i>  {{ HTML::link('/user/edit/'.$user->id, 'edit', array('id' => $user->id, 'class'=>'edit'), null)}} &nbsp;&nbsp;
                                           <i class="fa fa-ban"></i> {{ HTML::link('user/status', $user->is_active, array('id' => $user->id, 'class'=>'action', 'data-action'=>$user->is_active), null)}}&nbsp;&nbsp;
                                           <i class="fa fa-trash"></i>  {{ HTML::link('user/status', 'delete', array('id' => $user->id, 'class'=>'action', 'data-action'=>'delete'), null)}}&nbsp;&nbsp;

                                       </td>
                                   </tr>
                                   @endforeach
                               </table>




                            </div>

                        </div>
                        <div class="panel-footer">
                            <div> {!! $users->links() !!}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>

   {!! HTML::script('js/action.js') !!}



@endsection
