--TEST--
pdo_ibm: Connection attempt with wrong user/pwd
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
	require_once('fvt.inc');
	class Test extends FVTTest
	{
		public function __construct()
		{
			parent::__construct();
			$this->dsn .= "UID=not_a_user;PWD=invalid_pass";
			$this->user = "";
			$this->pass = "";
		}

		public function runTest()
		{
			print "Attempting to connect..\n";
			try{
				$this->connect();
				print "Connection succeeded.\n";
			}catch( PDOException $e ){
				print "Connection failed.\n";
			}
		}
	}

	$testcase = new Test();
	$testcase->runTest();
?>
--EXPECT--
Attempting to connect..
Connection failed.
