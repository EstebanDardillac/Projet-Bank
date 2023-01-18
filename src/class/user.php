

<?php

class user extends DbObject {
    public $id;
	public $email;
	public $password;
	public $role;
	public $created_at;
    public $last_ip;

    public function setPassword($password) {
		$this->password = hash('sha256', $password);
        return $this->password;
	}

    public function verifyPassword($password) {
		$hashPassword = hash('sha256', $password);
		return ($hashPassword === $this->password);
	}
}

?>