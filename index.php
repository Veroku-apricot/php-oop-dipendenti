<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			 class Person {
				 private $name;
				 private $lastname;
				 private $birthday;

				 public function __construct($name, $lastname, $birthday){
					 $this -> setName($name);
					 $this -> setLastName($lastname);
					 $this -> setBirthday($birthday);
				 }

				 public function getName() {
						 return $this -> name;
				 }
				 public function setName($name) {
						 $this -> name = $name;
				 }
				 public function getLastName() {
						 return $this -> lastname;
				 }
				 public function setLastName($lastname) {
						 $this -> lastname = $lastname;
				 }
				 public function getBirthday() {
						 return $this -> birthday;
				 }
				 public function setBirthday($birthday) {
						 $this -> birthday = $birthday;
				 }

				 public function __toString() {
						 return
								 'Name: ' . $this -> getName() . '<br>'
								 . 'Lastname: ' . $this -> getLastName() . '<br>'
								 . 'Date of birth: ' . $this -> getBirthday();
				 }
			 }

			 class Employee extends Person  {
				 private $status;
				 private $id;

				 public function __construct($name, $lastname, $birthday, $status, $id) {
						 parent::__construct($name, $lastname, $birthday);
						 $this -> setStatus($status);
						 $this -> setId($id);
				 }

				 public function getStatus() {
						 return $this -> status;
				 }
				 public function setStatus($status) {
						 $this -> status = $status;
				 }
				 public function getId() {
						 return $this -> id;
				 }
				 public function setId($id) {
						 $this -> id = $id;
				 }

				 public function __toString() {
						 return parent::__toString() . '<br>'
								 . 'Status: ' . $this -> getStatus() . '<br>'
								 . 'Id: ' . $this -> getId();
				 }
			 }

			 class Boss extends Person {
				 private $status;
				 private $department;
				 private $contact;

				 public function __construct($name, $lastname, $birthday, $status, $department, $contact) {
						 parent::__construct($name, $lastname, $birthday);
						 $this -> setStatus($status);
						 $this -> setDepartment($department);
						 $this -> setContact($contact);
				 }

				 public function getStatus() {
						 return $this -> status;
				 }
				 public function setStatus($status) {
						 $this -> status = $status;
				 }
				 public function getDepartment() {
						 return $this -> department;
				 }
				 public function setDepartment($department) {
						 $this -> department = $department;
				 }
				 public function getContact() {
						 return $this -> contact;
				 }
				 public function setContact($contact) {
						 $this -> contact = $contact;
				 }

				 public function __toString() {
						 return parent::__toString() . '<br>'
								 . 'Status: ' . $this -> getStatus() . '<br>'
								 . 'Department: ' . $this -> getDepartment() . '<br>'
								 . 'Contact: ' . $this -> getContact();
				 }
			 }

			 $employee1 = new Employee('Rita', 'Rossi', '01.01.1990', 'Employee', '123');
			 $employee2 = new Employee('Link', 'Smith', '27.10.1987', 'Employee', '263');
			 $employee3 = new Employee('Retsuko', 'Aggre', '06.11.1995', 'Employee', '534');
			 $boss = new Boss('Luigi', 'Verdi', '10.03.1986', 'Boss', 'Marketing', 'mail@mail.mail');

			 echo $employee1 . '<br><br>'
					 . $employee2 . '<br><br>'
					 . $employee3 . '<br><br>'
					 . $boss . '<br><br>';

		 ?>

	</body>
</html>
