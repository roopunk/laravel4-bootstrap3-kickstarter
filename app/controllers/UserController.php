<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.default';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->menu_parent = 'users';
		$this->layout->menu_sub = 'user-list-menu';
		$this->layout->body = View::make('admin.user.list');
		$this->layout->body->users = User::paginate(Config::get('project.pagination_per_page_rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->menu_parent = 'users';
		$this->layout->menu_sub = 'user-add-menu';
		$this->layout->body = View::make('admin.user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$rules = array(
			'username'		=>	'required|unique:users',
			'first_name'       => 'required',
			'last_name'       => 'required',
			'email'      => 'required|email|unique:users',
			'group_id' => 'required',
			'password' => 'confirmed|min:6'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ( $validator->fails() ) {
			return Redirect::to('admin/user/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;
			$user->username 	= Input::get('username');
			$user->first_name   = Input::get('first_name');
			$user->last_name    = Input::get('last_name');
			$user->email      	= Input::get('email');
			$user->group_id 	= Input::get('group_id');
			$user->password 	= Hash::make(Input::get('password'));
			$user->created_at 	= time();
			$user->profile_picture = "/assets/img/contact-img2.png";
			$user->save();

			// redirect
			Session::flash('message-success', 'Successfully created a user!');
			return Redirect::to('admin/user');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->menu_parent = 'users';
		$this->layout->body = View::make('admin.user.edit');
		$this->layout->body->user = User::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'first_name'       => 'required',
			'last_name'       => 'required',
			'email'      	=> 'required|email|unique:users'
		);

		if ( Input::get('email') == Input::get('orig-email') ) ## did not update email
		{
			$rules['email'] = 'required|email'; ## No need to validate uniqueness
		}


		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ( $validator->fails() ) {
			return Redirect::to("admin/user/$id/edit")
				->withErrors($validator);
				
		} else {
			// store
			$user = User::find($id);
			
			$user->first_name   = Input::get('first_name');
			$user->last_name    = Input::get('last_name');
			$user->email      	= Input::get('email');

			if ( Input::get('group_id') ) ## update group if it's allowed
				$user->group_id 	= Input::get('group_id');

			$user->profile_picture = "/assets/img/contact-img2.png";
			$user->save();

			// redirect
			Session::flash('message-success', 'Successfully updated user <strong>'. $user->first_name . ' '. $user->last_name .'</strong>!');
			return Redirect::to('admin/user');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message-success', 'Successfully deleted the user!');
		return Redirect::to('admin/user');
	}

}