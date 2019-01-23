<?php

function input_recieved($args)
{
	if(is_array($args))
	{
		foreach($args AS $input)
		{
			if ($input=="" OR $input==null) 
			{
				return "missing input";
			}
		}
	}
	return true;

}

function validate_sanitize_inputs($arg)
{
   
	$email   =filter_var($arg['email'],FILTER_SANITIZE_EMAIL);
	$password=$arg['password'];
	$email  =filter_var($arg['email'],FILTER_VALIDATE_EMAIL);

	return array('email'=>$email, 'password'=>$password);
}





?>