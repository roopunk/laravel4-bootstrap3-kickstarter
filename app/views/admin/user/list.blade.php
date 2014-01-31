@section('extra_css')
 <link rel="stylesheet" href="{{asset('/assets/css/compiled/user-list.css')}}" type="text/css" media="screen" />
@stop

@section('body')

<div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>Users</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                   

                    <a href="/admin/user/create" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        NEW USER
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-4 sortable">
                                    Name
                                </th>
                                <th class="col-md-3 sortable">
                                    <span class="line"></span>Signed up
                                </th>
                                
                                <th class="col-md-3 sortable">
                                    <span class="line"></span>Email
                                </th>
                                
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        @foreach ($users as $user)
                        <tr class="first">
                                <td>
                                    <img src="{{asset($user->profile_picture)}}" alt="contact" class="img-circle avatar hidden-phone" />
                                    <a href="/admin/user/{{$user->id}}/edit" class="name">{{$user->first_name}} {{$user->last_name}}</a>
                                    <span class="subtext">{{$user->group->name}}</span>
                                </td>
                                <td>
                                    {{date('M d, Y', strtotime($user->created_at))}}
                                </td>
                                
                                <td>
                                    <a href="#">{{$user->email}}</a>
                                </td>
                                
                                <td>
                                
                                   
                                        <a href="/admin/user/{{$user->id}}/edit">Edit</a> | 
                                        <a href="#" onclick="User.Delete({{$user->id}})">Delete</a>
                                        
                                        {{Form::open(array('method' => 'delete', 'id' => 'form-delete-' . $user->id, 'url' => '/admin/user/' . $user->id))}}
                                        	
                                        {{Form::close()}}
                                
                                </td>
                         </tr>
                         @endforeach
                        <!-- row -->
                        
                        </tbody>
                    </table>
                </div>                
            </div>
            <ul class="pagination pull-right">
               {{$users->links()}}
            </ul>
            <!-- end users table -->
        </div>

@stop

@section('extra_js')
	<script type="text/javascript" src="{{asset('assets/includes/admin.user.js')}}"></script>
@stop