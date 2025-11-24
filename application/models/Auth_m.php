<?php

class auth_m extends CI_Model
{

    public function __construct()
	{

        $this->config->load('auth', TRUE);

        $this->hash_method = $this->config->item('hash_method', 'ion_auth');

    }

    /**
     * Max password size constant
     */
    const MAX_PASSWORD_SIZE_BYTES = 4096;

    function email_exists($username)
    {
        return $this->db->where('username', $username)->get('telephoneadmin')->row_array();
    }

    
	public function hash_password($password, $identity = NULL)
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== FALSE ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return FALSE;
		}

		$algo = $this->_get_hash_algo();
		$params = $this->_get_hash_parameters();

		if ($algo !== FALSE && $params !== FALSE)
		{
			$hash = password_hash($password, $algo, $params);
			if (is_null($hash) || $hash === FALSE) {
				return FALSE;
			}
			return $hash;
		}

		return FALSE;
	}
    function login($username, $password)
    {
        $data = $this->db->where('username', $username)->get('telephoneadmin')->row_array();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                // return $data;
                return $this->db->where('email', $data['email'])->get('adminregistration')->row_array();
            } else {
                return false;
            }
        } else
            return false;
    }
    function check_user($user)
    {
        $this->db->select('email, username');
        $this->db->from('telephoneadmin');
        $this->db->where('email', $user);
        $this->db->or_where('username', $user);

        $query = $this->db->get();

        return $query->result();
    }

    protected function _generate_selector_validator_couple($selector_size = 40, $validator_size = 128)
    {
        // The selector is a simple token to retrieve the user
        $selector = $this->_random_token($selector_size);

        // The validator will strictly validate the user and should be more complex
        $validator = $this->_random_token($validator_size);

        // The validator is hashed for storing in DB (avoid session stealing in case of DB leaked)
        $validator_hashed = $this->hash_password($validator);

        // The code to be used user-side
        $user_code = "$selector.$validator";

        return (object) [
            'selector' => $selector,
            'validator_hashed' => $validator_hashed,
            'user_code' => $user_code,
        ];
    }
    protected function _random_token($result_length = 32)
    {
        if (!isset($result_length) || intval($result_length) <= 8) {
            $result_length = 32;
        }

        // Try random_bytes: PHP 7
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($result_length / 2));
        }

        // Try mcrypt
        if (function_exists('mcrypt_create_iv')) {
            return bin2hex(mcrypt_create_iv($result_length / 2, MCRYPT_DEV_URANDOM));
        }

        // Try openssl
        if (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($result_length / 2));
        }

        // No luck!
        return FALSE;
    }
}
