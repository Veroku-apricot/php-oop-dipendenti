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
						throw new Exception('must be at least three letters long');
					}
					$this -> name = $name;
				}
				public function getLastName() {
						return $this -> lastname;
				}
				public function setLastName($lastname) {
					if (strlen($lastname)<3) {
						throw new Exception('must be at least three letters long');
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
				$p1 = new Person('Pe', 'Prova', '01.01.1990', '123');
				echo $p1 . '<br><br>';
			} catch (Exception $e) {
				echo 'Name or lastname not valid <br>' . $e->getMessage() . '<br><br>';
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
					if ($ral < 10000 || $ral > 100000) {
						throw new Exception('must be a number between 10.000 and 100.000');
					}
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

			// Employee try
			try {
				$empl = new Employee('Employee', 'Prova', '06.11.1995', '123', 10, 'Task', 'Id');
				echo $empl . '<br><br>';
			} catch (Exception $e) {
				echo 'Ral not valid <br>' . $e->getMessage() . '<br><br>';
			}

			$employee1 = new Employee('Rita', 'Rossi', '01.01.1990', '123', 12000, 'Task', 'Id');
			$employee2 = new Employee('Link', 'Smith', '27.10.1987', '123', 15500, 'Task', 'Id');
			$employee3 = new Employee('Retsuko', 'Aggre', '06.11.1995', '123', 10000, 'Task', 'Id');

			echo $employee1 . '<br><br>'
					. $employee2 . '<br><br>'
					. $employee3 . '<br><br>';

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
					if (empty($employees)) {
						throw new Exception('must be present at least one employee');
					}
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

			// Boss try
			try {
				$bss = new Boss('Boss', 'Prova', '10.03.1986', '123', 100000, 'Task', 'Id', 'Profit', 'Marketing', []);
				echo $bss . '<br><br>';
			} catch (Exception $e) {
				echo 'Employees not valid <br>' . $e->getMessage() . '<br><br>';
			}

			$boss = new Boss('Luigi', 'Verdi', '10.03.1986', '123', 99999, 'Task', 'Id', 'Profit', 'Marketing', [$employee1, $employee2, $employee3]);

			echo $boss . '<br><br>';

		 ?>
	</body>
</html>
