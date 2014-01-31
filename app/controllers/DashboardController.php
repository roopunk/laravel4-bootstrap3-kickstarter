<?php

class DashboardController extends BaseController
{
	protected $layout = 'layouts.default';

	public function index()
	{
		$this->layout->menu_parent = 'home';
		$this->layout->body = View::make('admin.dashboard.index');
		
	}
}