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
                                           <i class="fa fa-edit"></i>  {{ HTML::link('/user/edit/'.$user->id, 'Edit', array('id' => $user->id, 'class'=>'edit'), null)}} &nbsp;&nbsp; <i class="fa fa-trash"></i>  {{ HTML::link('user/delete', 'Delete', array('id' => $user->id, 'class'=>'delete'), null)}} </td>
                                   </tr>
                                   @endforeach
                               </table>




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

    <script>



        $(function(){
            $('.delete').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var url = $(this).attr('href')
                var  data = 'id='+id +'_token='+ '{{ csrf_token() }}';
                $.ajax({
                    url:url,
                    type:"POST",
                        cache:false,
                        data:data,
                    success:function(res){
                    console.log(res);
            },
            error:function(err){
                alert(err);
            }

                });

            });

        });


        /*

         $(function(){
         $('.delete').click(function(e) {
         e.preventDefault();
         var id = $(this).attr('id');
         var url = $(this).attr('href');
         $.post(url, {'id':id, '_token': '{{ csrf_token() }}', function(res){
         alert(res);
         }
         });


         });

        
         */
    </script>



@endsection
