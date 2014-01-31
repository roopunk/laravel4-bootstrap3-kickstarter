<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {
	const STATUS_PENDING = 'pending';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function group()
	{
		return $this->belongsTo('Group');
	}

	public function key()
	{
		$this->hasOne('Key', '_id');
	}

	public static function validate($input){

		
		$rules = array(
		        'first_name' 	=> 	'required',
		        'last_name' 	=> 	'required|min:5',
		        'email' 		=> 	'required|email|unique:users',
		        'phone_number'	=>	'required|min:10',
		        'password'		=>	'required|confirmed|min:6'
		      
		    );

		return Validator::make($input, $rules);
	}

	public static function agentAreas($user_id = '')
	{
		$areas = array();


		if ( !empty($user_id) ){
			$user_areas = DB::table('agent_areas')->where('user_id', $user_id)->get();

			foreach ( $user_areas as $a ){
				$areas[] = $a['city_id'];
			}
		}

		return $areas;
	}

	public static function createStripeCustomer()
	{

	}

	public static function agentCreditCards($stripe_customer_id)
	{
		try{


		Stripe::setApiKey(Config::get('stripe.api_key'));
		
		$cust = Stripe_Customer::retrieve($stripe_customer_id);

		$cc_array = array();

		foreach ($cust->cards->data as $cc){
			$cc_array[] = array ('error' => 0,  'card_id' => $cc->id,  'digits' => $cc->last4, 'type' => $cc->type, 'exp_month' => $cc->exp_month, 'exp_year' => $cc->exp_year);
		}
		
		return $cc_array;
		}
		catch (Stripe_InvalidRequestError $e){
			return array ('error' => 1, 'message' => $e->getMessage());
		}

	}

	public static function agentCreditCard($stripe_customer_id, $card_id)
	{
		Stripe::setApiKey(Config::get('stripe.api_key'));
		$customer = Stripe_Customer::retrieve($stripe_customer_id);
		$card = $customer->cards->retrieve($card_id);
		
		if ( !empty($card) ){
			return $card;
		}

		return null;
	}

	public static function agentCreditcardUpdate($stripe_customer_id, $card_id,  $data)
	{
		Stripe::setApiKey(Config::get('stripe.api_key'));
		$customer = Stripe_Customer::retrieve($stripe_customer_id);
		$card = $customer->cards->retrieve($card_id);

		if (!empty($data['name']))
			$card->name = $data['name'];
		if (!empty($data['address_city']))
			$card->address_city = $data['address_city'];
		if (!empty($data['address_line1']))
			$card->address_line1 = $data['address_line1'];
		if (!empty($data['address_line2']))
			$card->address_line2 = $data['address_line2'];
		if (!empty($data['address_state']))
			$card->address_state = $data['address_state'];
		if (!empty($data['address_zip']))
			$card->address_zip = $data['address_zip'];
		if (!empty($data['exp_month']))
			$card->exp_month = $data['exp_month'];
		if (!empty($data['exp_year']))
			$card->exp_year = $data['exp_year'];

		$card->save();
	}

	public static function agentCreditcardDelete($stripe_customer_id, $card_id){
		Stripe::setApiKey(Config::get('stripe.api_key'));
		$customer = Stripe_Customer::retrieve($stripe_customer_id);
		$card = $customer->cards->retrieve($card_id)->delete();
	}
}