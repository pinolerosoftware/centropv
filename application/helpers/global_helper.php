<?php
	//chr(ascii) = me devuelve la letra
	//ord(letra) = me devuelve el numero
	function encriptar($texto){
		date_default_timezone_set('GMT');
		//Cantidad de Letras en el texto
		$sizeTexto = strlen($texto);
		//Variables para poner separadores de la encriptacion.
		$impares = 0;
		$pares = 0;
		//Concatenamos la informacion de la fecha		
		$inforTime = getdate();
		$valor = $inforTime["year"];
		$valor .= $sizeTexto;
		$valor .= $inforTime["mon"];
		$valor .= $sizeTexto;
		$valor .= $inforTime["mday"];
		$valor .= $sizeTexto;
		$valor .= $inforTime["hours"];
		$valor .= $sizeTexto;
		$valor .= $inforTime["minutes"];
		$valor .= $sizeTexto;
		$valor .= $inforTime["seconds"];
		$valor .= $sizeTexto;
		$valor .= milisegundo();
		$valor .= $sizeTexto;
		//recorremos la variable valor para sumar los pares y los impares		
		for ($i = 0; $i < strlen($valor); $i++) { 
			$singleValor = substr($valor,$i,1);
			if($singleValor % 2 == 0)
				$pares = $pares + $singleValor;
			else
				$impares = $impares + $singleValor;
		}		

		//Crear un arreglo de codigos ascii del texto
		$ao = array();
		for ($i = 0; $i < strlen($texto); $i++) { 
			$ao[] = ord(substr($texto, $i, 1));
		}
		//Arregle de codigo ascii preterminado
		$an = array($impares);
		for ($i = 0; $i < sizeof($ao); $i++) { 
			if($i % 2 == 0)
				$an[] = $ao[$i]	+ $impares;
			else
				$an[] = $ao[$i] + $pares;
		}
		$an[] = $pares; 
		//Arreglo para lista de letras que ocupo como separadores aleatorios
		$letrasSeparadores = array('G', 'H', 'I', 'J', 'K', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		//Variable para almacenar el texto encriptado
		$resultado = '';
		//echo decimalHexadecimal($an[0]);
		//recorremos el arreglo an para pasar el ascii a hexadecimal y agregarles un separador
		for ($i = 0; $i < sizeof($an); $i++) { 
			//echo decimalHexadecimal($an[$i]);
			$resultado .= decimalHexadecimal($an[$i]) . $letrasSeparadores[rand(0,18)];
		}
		//echo $resultado ."jhjhj";
		return $resultado;
	}

	function desencriptar($texto){
		//Arreglo para lista de letras que ocupo como separadores aleatorios
		$letrasSeparadores = array('G', 'H', 'I', 'J', 'K', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		//Arreglo de los hexadecimales
		$arr = Array();
		//indicador para ir tomando el index del arreglo donde se va cortando 
		//para obtener el hexadecimal
		$indiceAnterior = 0;
		for ($i = 0; $i < strlen($texto); $i++) { 
			$letra = substr($texto, $i, 1);			
			$encontrado = false;
			for ($j = 0; $j < sizeof($letrasSeparadores); $j++) { 
				if($letra == $letrasSeparadores[$j]){
					$encontrado = true;
					$j = sizeof($letrasSeparadores);
				}
			}			
			if($encontrado == true){
				$arr[] = substr($texto, $indiceAnterior, $i - $indiceAnterior);
				$indiceAnterior = $i + 1;				
			}
		}		
		//Recorrer el arreglo de los hexadecimal y pasarlos a decimal		
		$paso1 = array();
		for ($i = 0; $i < sizeof($arr); $i++) { 
			$paso1[] = hexadecimalDecimal($arr[$i]);
		}
		//asgnamos los indicadores
		$impares = $paso1[0];
		$pares = $paso1[sizeof($paso1) - 1];
		//recorremos el paso1 para transformarlos lso decimales que transforme de hexadecimal
		//a decimal quitarle el complemento impar y par
		$paso2 = array();
		for ($i = 0; $i < sizeof($paso1) - 2; $i++) { 
			if($i % 2 == 0)
				$paso2[] = $paso1[$i + 1] - $impares;
			else
				$paso2[] = $paso1[$i + 1] - $pares;			
		}
		//recorrer el arreglo de paso2 para transformar el ascii a letra
		$resultado = '';
		for ($i = 0; $i < sizeof($paso2); $i++) { 
			$resultado .= chr($paso2[$i]); 
		}
		return $resultado;
	}

	function decimalHexadecimal($numero){
		$dec = (int)$numero;
		$residuo = '';
		$hex = '';
		while ($dec > 0) {
			$residuo = (int)($dec % 16);
			$dec = (int)($dec / 16);
			if($residuo == 10)
				$hex .= "A";
			else{
				if($residuo == 11)
					$hex .= "B";
				else{
					if($residuo == 12)
						$hex .= "C";
					else{
						if($residuo == 13)
							$hex .= "D";
						else{
							if($residuo == 14)
								$hex .= "E";
							else{
								if($residuo == 15)
									$hex .= "F";
								else
									$hex .= $residuo;
							}								
						}							
					}
				}
			}
		}
		return $hex;
	}

	function hexadecimalDecimal($hex){		
		$suma = 0;
		$x = 0;
		for ($i = 0; $i < strlen($hex); $i++) { 			
			$letra = substr($hex, $i, 1);			
			if($letra == "A"){
				$x = 10;
				$suma = pow(16, $i) * $x + $suma; 
			}	
			else{
				if($letra == "B"){
					$x = 11;
					$suma = pow(16, $i) * $x + $suma; 
				}	
				else{
					if($letra == "C"){
						$x = 12;
						$suma = pow(16, $i) * $x + $suma; 
					}	
					else{
						if($letra == "D"){
							$x = 13;
							$suma = pow(16, $i) * $x + $suma; 
						}	
						else{
							if($letra == "E"){
								$x = 14;
								$suma = pow(16, $i) * $x + $suma; 
							}	
							else{
								if($letra == "F"){
									$x = 15;
									$suma = pow(16, $i) * $x + $suma; 
								}	
								else{
									$x = (int)$letra;
									$suma = pow(16, $i) * $x + $suma; 
								}
							}
						}
					}
				}
			}			
		}
		return (int)$suma;
	}

	function milisegundo(){
		$miliSegundo = microtime(true);
		$miliSegundo = substr($miliSegundo, strpos($miliSegundo,'.') + 1, strlen($miliSegundo));
		return $miliSegundo;
	}

	//Funcion para obtener la fecha con el formato 
	//para guardar en la base de datos
	function getDateToDataBase(){
		$fecha = getdate();
        $fechaNow = $fecha["year"] . '-' . (($fecha["mon"] < 10)?"0".$fecha["mon"]:$fecha["mon"]) . '-' . (($fecha["mday"] < 10)?"0".$fecha["mday"]:$fecha["mday"]) . ' ' . (($fecha["hours"] < 10) ? "0". $fecha["hours"] : $fecha["hours"]) . ':' . (($fecha["minutes"] < 10) ? "0".$fecha["minutes"] : $fecha["minutes"]) . ':' . (($fecha["seconds"] < 10) ? "0".$fecha["seconds"] : $fecha["seconds"]);
		return $fechaNow;
	}

	function getDateToDataBaseCustom($fecha){
		$fecha = new DateTime($fecha);	
		return date_format($fecha, 'Ymd');		
	}

	function convertArrayFormatCSV($array, $encabezado){
		$texto = $encabezado . "\n";
		foreach($array as $fila){			
			if(is_object($fila)){
				foreach($fila as $valor){					
					$texto = $texto . ((string)$valor) . ",";					
				}				
			}else{
				$texto = $texto . $fila + ",";
			}
			$texto = substr($texto, 0, -1) . "\n";
		}
		return $texto;
	}

	