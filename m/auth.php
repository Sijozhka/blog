<?php 

function is_Auth() {
	if (!isset($_SESSION['auth'])) {
		if ($_COOKIE["login"] == "admin" && $_COOKIE["password"] == md5("qwerty")) {
			$_SESSION["auth"] == true;
		} else {

			return false;
		}
	}
	return true;
}
