<?php

class ContactForm extends DbObject {
    public $id;
	public $fullname;
	public $phone;
	public $email;
	public $message;
	public $created_at;

	public function getCreatedAt() {
		$date = new DateTime($this->created_at);
		return $date->format('d/m/Y H:i:s');
	}
}

?>