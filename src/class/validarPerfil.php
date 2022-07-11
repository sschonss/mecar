<?php
	function validaPerfil($perfil){

		if ($perfil == "on") {
			
			$perfil = "Sim";

		} elseif ($perfil == "off") {
			
			$perfil = "Não";

		}

		return $perfil;

	}

