@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h1>Moderator Approvals Needed</h1></center></div>
                    <div class="panel-body">
                        {{--

                        @rachel

                        Using the Form facade to open the form will:
                            - output the opening Form html tag
                            - add the csrf field
                            - Add the method PATCH field -- this is something odd. Some web servers don't accept PATCH
                                   requests nicely, so to account for this Laravel sends PATCH requests as a POST with
                                   the hidden method_field

                        It is good to tie your form submit urls to the controller paths or route names (ask me another
                            time about these). This way if you want to change /approvals to /admin/approvals you would
                            only need to make that change in the routes file.

                        --}}

                        @if( $users->count() > 0 )
                            <div class="table-responsive">

                                {!! Form::open([ 'method' => 'PATCH', 'action' => 'ModApprovalsController@update' ]) !!}
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>Approve</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>

                                    @foreach($users as $user)

                                        <tr>

                                            <td>
                                                {!! Form::checkbox('isModerator[]', $user->id, null) !!}
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>


                                        </tr>


                                    @endforeach

                                </table>
                                <div class="form-group">
                                    {!! Form::submit('Submit Approvals', ['class' => 'btn btn-primary form-control']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        @else
                            <p>There are no Moderators to approve.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection