<?php

$hashed = '$2y$10$EUfbyQBPfzWMipyXWRPug./.hpR/SsIckP4FDRflbnoROrBQcvHaa';

if (password_verify('123', $hashed)) {
	echo 'Password Benar !';
} else {
	echo 'Password Salah !';
}

?>