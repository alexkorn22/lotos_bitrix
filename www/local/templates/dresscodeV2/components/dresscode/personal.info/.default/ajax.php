<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	if(isset($_GET["USER_PASSWORD"]) &&
	   isset($_GET["USER_PASSWORD_CONFIRM"]) &&
	   isset($_GET["USER_STREET"]) &&
	   isset($_GET["USER_MOBILE"]) &&
	   isset($_GET["USER_CITY"]) &&
	   isset($_GET["USER_ZIP"]) &&
	   isset($_GET["EMAIL"]) &&
	   isset($_GET["FIO"]) &&
	   isset($_GET["UF_NUMBER_MCLUB"])
	){
		global $USER;
		$userID = $USER->GetID();
        $userGroupsId =  CUser::GetUserGroup($userID);
		if($userID){
			$NAME            = explode(" ", htmlspecialchars($_GET["FIO"]));
			$EMAIL           = htmlspecialchars($_GET["EMAIL"]);
			$PASSWORD        = addslashes($_GET["USER_PASSWORD"]);
			$REPASSWORD      = addslashes($_GET["USER_PASSWORD_CONFIRM"]);
			$PERSONAL_STREET = htmlspecialchars($_GET["USER_STREET"]);
			$PERSONAL_MOBILE = htmlspecialchars($_GET["USER_MOBILE"]);
			$PERSONAL_CITY   = htmlspecialchars($_GET["USER_CITY"]);
			$PERSONAL_ZIP    = htmlspecialchars($_GET["USER_ZIP"]);

			$numberMClub 	 = htmlspecialchars($_GET["UF_NUMBER_MCLUB"]);

			$tools = new UserTools($USER);
			$dataMClub = $tools->getDataMClub();
//			$checkMClub = $dataMClub["UF_CHECK_M_CLUB"];
			$isMClub = $dataMClub["UF_IS_MCLUB"];
//			$mClub = $dataMClub["UF_NUMBER_MCLUB"];

			$user = new CUser;
			$fields = Array(
			  "NAME"              => BX_UTF === true ? $NAME[1] : iconv("UTF-8","windows-1251//IGNORE", $NAME[1]),
			  "LAST_NAME"         => BX_UTF === true ? $NAME[0] : iconv("UTF-8","windows-1251//IGNORE", $NAME[0]),
			  "SECOND_NAME"       => BX_UTF === true ? $NAME[2] : iconv("UTF-8","windows-1251//IGNORE", $NAME[2]),
			  "PERSONAL_STREET"   => BX_UTF === true ? $PERSONAL_STREET : iconv("UTF-8","windows-1251//IGNORE", $PERSONAL_STREET),
			  "PERSONAL_CITY"	  => BX_UTF === true ? $PERSONAL_CITY : iconv("UTF-8","windows-1251//IGNORE", $PERSONAL_CITY),
			  "PERSONAL_ZIP"      => BX_UTF === true ? $PERSONAL_ZIP : iconv("UTF-8","windows-1251//IGNORE", $PERSONAL_ZIP),
			  "PERSONAL_MOBILE"   => BX_UTF === true ? $PERSONAL_MOBILE : iconv("UTF-8","windows-1251//IGNORE", $PERSONAL_MOBILE),			  
			  "EMAIL"             => $EMAIL,
			  "PASSWORD"          => $PASSWORD,
			  "CONFIRM_PASSWORD"  => $REPASSWORD,
			);

			//если пользователь впервые вводит номер Мама клуб
			if (!empty($numberMClub) && !$isMClub) {
				if (empty($PERSONAL_MOBILE)) {
					$result = array(
						"message" => "Требуется заполнение телефона для участия в Мама клуб",
						"heading" => "Ошибка",
						"reload" => false
					);
					echo jsonEn($result);
					exit();
				}
				$valid = new Validator($numberMClub);
				$valid->validateEan13();
				if (!$valid->isValid) {
					$result = array(
						"message" => "Неправильный формат номера карты Мама клуб",
						"heading" => "Ошибка",
						"reload" => false
					);
					echo jsonEn($result);
					exit();
				}else{
					//valid card number
                    array_push($userGroupsId,9) ;
                    $fields["UF_IS_MCLUB"] 		  = '1' ;
                    $fields["GROUP_ID"]    		  = $userGroupsId ;
				}
//				$checkMClub = 1;

			}
			if ($isMClub) {
				if (empty($PERSONAL_MOBILE)) {
					$result = array(
						"message" => "Требуется заполнение телефона для участия в Мама клуб",
						"heading" => "Ошибка",
						"reload" => false
					);
					echo jsonEn($result);
					exit();
				}
			}
//			$fields["UF_CHECK_M_CLUB"] = $checkMClub;
			if (!empty($numberMClub) && empty($dataMClub['UF_NUMBER_MCLUB'])) {
				$fields["UF_NUMBER_MCLUB"] = $numberMClub;
			}


			if(empty($PASSWORD)){
				unset($fields["PASSWORD"]);
				unset($fields["REPASSWORD"]);
			}
			if(!$user->Update($userID, $fields)){
				$result = array(
					"message" => strip_tags($user->LAST_ERROR),
					"heading" => "Ошибка",
					"reload" => false
				);
			}else{
				$result = array(
					"message" => "Информация успешно сохранена",
					"heading" => "Сохранено",
					"reload" => true
				);
			}
		}else{
			$result = array(
				"message" => "Требуется авторизация",
				"heading" => "Ошибка",
				"reload" => false
			);
		}
	
	}else{
		$result = array(
			"message" => "Ошибка передачи формы",
			"heading" => "Ошибка",
			"reload" => false
		);
	}

	echo jsonEn($result);

	function jsonEn($data){
		foreach ($data as $index => $arValue) {
			$arJsn[] = '"'.$index.'" : "'.addslashes($arValue).'"';
		}
		return  "{".implode($arJsn, ",")."}";
	}

?>

