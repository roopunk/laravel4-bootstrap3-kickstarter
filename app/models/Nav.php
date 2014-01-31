<?php


class Nav
{
	public static function admin()
	{
		$nav = [
			array('parent-menu' => 'home', 'label' => 'Home', 'url' => '/admin/dashboard', 'icon' => 'icon-home'),
			array('parent-menu' => 'users', 'label' => 'Users', 'url' => '#', 'icon' => 'icon-group', 
				                              'submenu' => [
				                              				 array('child-menu' => 'user-list-menu', 'label' => 'User List', 'url' => '/admin/user/'), 
				                                             array('child-menu' => 'user-add-menu', 'label' => 'New User', 'url' => '/admin/user/create')
				                                            ]
				 ),
			array('parent-menu' => 'domains', 'label' => 'Domains', 'url' => '/admin/domain', 'icon' => 'icon-code-fork')
		];

		return $nav;
	}
}