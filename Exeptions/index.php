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
				private $securlvl;

				public function __construct($name, $lastname, $birthday, $securlvl){
					$this -> setName($name);
					$this -> setLastName($lastname);
					$this -> setBirthday($birthday);
					$this -> setSecurLvl($securlvl);
				}

				public function getName() {
						return $this -> name;
				}
				public function setName($name) {
					if (strlen($name)<3) {
						throw new Exception('at least three letters');
					}
					$this -> name = $name;
				}
				public function getLastName() {
						return $this -> lastname;
				}
				public function setLastName($lastname) {
					if (strlen($lastname)<3) {
						throw new Exception('at least three letters');
					}

					$this -> lastname = $lastname;
				}
				public function getBirthday() {
					return $this -> birthday;
				}
				public function setBirthday($birthday) {
					$this -> birthday = $birthday;
				}
				public function getSecurLvl() {
					return $this -> securlvl;
				}
				public function setSecurLvl($securlvl) {
					$this -> securlvl = $securlvl;
				}

				public function __toString() {
					return
							'Name: ' . $this -> getName() . '<br>'
							. 'Lastname: ' . $this -> getLastName() . '<br>'
							. 'Date of birth: ' . $this -> getBirthday() . '<br>'
							. 'Security Level: ' . $this -> getSecurLvl();
				}
			}
			// Try
			try {
				$p1 = new Person('Riee', 'Rossi', '01.01.1990', '123');
				echo $p1 . '<br><br>';
			} catch (Exception $e) {
				echo 'Name not valid <br>' . $e->getMessage();
			}

			class Employee extends Person  {
				private $ral;
				private $task;
				private $id;

				public function __construct($name, $lastname, $birthday, $securlvl, $ral, $task, $id) {
					parent::__construct($name, $lastname, $birthday, $securlvl);
					$this -> setRal($ral);
					$this -> setTask($task);
					$this -> setId($id);
				}

				public function getRal() {
					return $this -> ral;
				}
				public function setRal($ral) {
					$this -> ral = $ral;
				}
				public function getTask() {
					return $this -> task;
				}
				public function setTask($task) {
					$this -> task = $task;
				}
				public function getId() {
					return $this -> id;
				}
				public function setId($id) {
					$this -> id = $id;
				}

				public function __toString() {
					return parent::__toString() . '<br>'
						. 'Ral: ' . $this -> getRal() . '<br>'
						. 'Task: ' . $this -> getTask() . '<br>'
						. 'Id: ' . $this -> getId();
				}
			}

			class Boss extends Employee {
				private $profit;
				private $department;
				private $employees;

				public function __construct($name, $lastname, $birthday, $securlvl, $ral, $task, $id, $profit, $department, $employees = []) {
					parent::__construct($name, $lastname, $birthday, $securlvl, $ral, $task, $id);
					$this -> setProfit($profit);
					$this -> setDepartment($department);
					$this -> setEmployees($employees);
				}

				public function getProfit() {
					return $this -> profit;
				}
				public function setProfit($profit) {
					$this -> profit = $profit;
				}
				public function getDepartment() {
					return $this -> department;
				}
				public function setDepartment($department) {
					$this -> department = $department;
				}
				public function getEmployees() {
					return $this -> employees;
				}
				public function setEmployees($employees) {
					$this -> employees = $employees;
				}

				public function __toString() {
					return parent::__toString() . '<br>'
						. 'Profit: ' . $this -> getProfit() . '<br>'
						. 'Department: ' . $this -> getDepartment() . '<br>'
						. 'Employees: ' . $this -> getEmpStr();
				}

				private function getEmpStr() {

					$str = '';
					for ($i=0;$i<count($this -> getEmployees());$i++) {

						$emp = $this -> getEmployees()[$i];
						$fullname = $emp -> getName() . ' ' . $emp -> getLastname();
						$str .= ($i + 1) . ': ' . $fullname . '<br>';
					}

					return $str;
				}
			}

			$employee1 = new Employee('Rita', 'Rossi', '01.01.1990', '123', 'Ral', 'Task', 'Id');
			$employee2 = new Employee('Link', 'Smith', '27.10.1987', '123', 'Ral', 'Task', 'Id');
			$employee3 = new Employee('Retsuko', 'Aggre', '06.11.1995', '123', 'Ral', 'Task', 'Id');
			$boss = new Boss('Luigi', 'Verdi', '10.03.1986', '123', 'Ral', 'Task', 'Id', 'Profit', 'Marketing', [$employee1, $employee2, $employee3] );

			echo $employee1 . '<br><br>'
					. $employee2 . '<br><br>'
					. $employee3 . '<br><br>'
					. $boss . '<br><br>';

		 ?>
	</body>
</html>
