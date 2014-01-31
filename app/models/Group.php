<?php


class Group extends Eloquent
{
	protected $table = "user_groups";
	const THIRD_PARTY_CODE = "third_party";
	const AGENT_CODE = "agent";
	const ADMIN_CODE = "admin";

	public function user()
	{
		$this->hasMany('User');
	}

	public static function id_by_code($code){
		$group = self::where('slug',$code);

		if ( $group->count() == 1 ){
			$group = $group->first();
			return $group->id;
		}
		return 0;

	}

	public static function third_party()
	{
		return self::id_by_code(self::THIRD_PARTY_CODE);
	}

	public static function agent()
	{
		return self::id_by_code(self::AGENT_CODE);
	}

	public static function admin()
	{
		return self::id_by_code(self::ADMIN_CODE);
	}
}

