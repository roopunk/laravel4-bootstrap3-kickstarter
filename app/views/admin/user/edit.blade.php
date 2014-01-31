@section('extra_css')
 <link rel="stylesheet" href="{{asset('assets/css/compiled/new-user.css')}}" type="text/css" media="screen" />
@stop
@section('body')
 <!-- settings changer -->
        
        <div id="pad-wrapper" class="new-user">
            <div class="row header">
                <div class="col-md-12">
                    <h3>Edit user</h3>
                </div>                
            </div>

            <div class="row form-wrapper">
                <!-- left column -->
                @if ($errors->all())
                    <div class="alert alert-danger">
                        {{ HTML::ul($errors->all()) }}
                    </div>
                @endif
                <div class="col-md-9 with-sidebar">
                    {{Form::open( array( 'method' => 'put', 'class' => 'form-horizontal', 'url' => 'admin/user/' . $user->id) )}}
                        <div class="form-group">
                        	{{Form::label('username', 'Username', array('class' => 'col-md-2 control-label'))}}
                            <div class="col-md-8">
                                {{Form::text('username', Input::old('username',$user->username), array('class' => 'form-control', 'placeholder' => 'Username', 'readonly' => 'readonly'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email', array('class' => 'col-md-2 control-label'))}}
                            <div class="col-md-8">
                              {{Form::text('email', Input::old('email', $user->email), array('class' => 'form-control', 'placeholder' => 'Email Address'))}}
                              {{Form::hidden('orig-email', $user->email)}}

                            </div>
                        </div>
                        <div class="form-group">
                             {{Form::label('first_name', 'First Name', array('class' => 'col-md-2 control-label'))}}
                            <div class="col-md-8">
                              {{Form::text('first_name', Input::old('first_name', $user->first_name), array('class' => 'form-control', 'placeholder' => 'First Name'))}}
                            </div>
                        </div>
                         <div class="form-group">
                             {{Form::label('last_name', 'Last Name', array('class' => 'col-md-2 control-label'))}}
                            <div class="col-md-8">
                              {{Form::text('last_name', Input::old('last_name', $user->last_name), array('class' => 'form-control', 'placeholder' => 'Last Name'))}}
                            </div>
                        </div>
                        
                        @if ($user->username != 'admin')
                        <div class="form-group">
                            {{Form::label('group_id', 'Group', array('class' => 'col-md-2 control-label'))}}
                            <div class="col-md-8">
                              <div class="ui-select">{{ Form::select('group_id', Group::lists('name', 'id'), $user->group_id, array('class' => 'form-control')) }}</div>
                            </div>
                        </div>
                        @endif
                       
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-8">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        
                    {{Form::close()}}
                    
                </div>

                <!-- side right column -->
               <div class="col-md-3 form-sidebar">
                    <div class="alert alert-info">
                        <i class="icon-lightbulb pull-left"></i>
                      Update User
                    </div>                        
                    
                    <h6>Important Notes</h6>
                    <p>&raquo; Username cannot be updated</p>
                    <p>&raquo; An email can only be used one time</p>
                </div>
                
            </div>
        </div>
@stop        