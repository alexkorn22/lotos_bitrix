<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<h1><?=GetMessage("REGISTER_TITLE")?></h1>

<ul id="authMenu">
	<li><a href="<?=SITE_DIR?>auth/" rel="nofollow"><?=GetMessage("AUTH_TITLE")?></a></li>
	<li><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow" class="selected"><?=GetMessage("AUTH_REGISTER")?></a></li>
	<li><a href="<?=SITE_DIR?>auth/?forgot_password=yes" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></li>
</ul>

<div class="bx-auth">
	<p class="registerText"><?=GetMessage("REGISTER_TEXT")?></p>
</div>

<div class="container-fluid" id='inputFieldMClub'>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="bx-auth container_register">



				<div class="bx-authform-description-container">
					<div class="bold"><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></div>
				</div>

				<div class="bx-authform-description-container">
					<div class="bold"><span class="bx-authform-starrequired">*</span> - <?=GetMessage("AUTH_REQ")?></div>
				</div>

				<?
				if(!empty($arResult["ERRORS"])):
					$text = str_replace(array("<br>", "<br />"), "\n", $arResult["ERRORS"][0]);
					if (isset($arResult["ERRORS"]['UF_NUMBER_MCLUB'])) {
						$text .= str_replace(array("<br>", "<br />"), "\n", $arResult["ERRORS"]['UF_NUMBER_MCLUB']);
					}
					?>
					<div class="alert <?=(empty($arResult["ERRORS"])? "alert-success":"alert-danger")?>"><?=nl2br(htmlspecialcharsbx($text))?></div>
				<?endif?>

				<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && empty($arResult["ERRORS"])):?>
					<div class="alert alert-success"><?echo GetMessage("AUTH_EMAIL_SENT")?></div>
				<?else:?>

				<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
					<div class="alert alert-warning"><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></div>
				<?endif?>


					<noindex>
						<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" class="bx-register-form">
							<?if($arResult["BACKURL"] <> ''):?>
								<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
							<?endif?>
							<input type="hidden" name="AUTH_FORM" value="Y" />
							<input type="hidden" name="TYPE" value="REGISTRATION" />

							<ul class="fieldsContainer">
								<li>

									<label>
										<?if($arResult["EMAIL_REQUIRED"]):?><span class="bx-authform-starrequired">*</span><?endif?><?=GetMessage("AUTH_EMAIL")?>
									</label>
									<input type="text" name="EMAIL" maxlength="255" value="<?=$arResult["EMAIL"]?>" data-required="required" />

									<label>
										<span class="bx-authform-starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?>
									</label>
									<input type="password" name="PASSWORD" maxlength="255" value="<?=$arResult["PASSWORD"]?>"
										   data-required="required"
										   autocomplete="off"
									/>

									<label>
										<span class="bx-authform-starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?>
									</label>
									<input type="password" name="CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["CONFIRM_PASSWORD"]?>" data-required="required" autocomplete="off" />
									<div class="checkboxMClub">
										<input type="checkbox" name="CHECKED_IS_MCLUB" maxlength="255"
											<? if (isset($arResult['CHECKED_IS_MCLUB']) || $_GET['fromMamaClub']=='true' ){ echo 'checked';}?>
											   id="isInMClub"
										/>
										<label for="isInMClub">Я являюсь участником Мама клуб</label>
									</div>
								</li>
								<li>
									<div class="MClub <? if (!isset($arResult['CHECKED_IS_MCLUB']) && $_GET['fromMamaClub']!='true'){ echo 'hidden';}?>" >
										<label>
											<span class="bx-authform-starrequired">*</span>Номер карты участника Мама-клуб (13 Цифр)0
										</label>
										<input type="text" name="UF_NUMBER_MCLUB" maxlength="255" value="<?=$arResult["UF_NUMBER_MCLUB"]?>" />
									</div>
								</li>
								<li>
									<a href="#" id="aAddDataRegister" class="heading_a">
										<div class="headingBlock">
											<span class="heading">
												Дополнительные данные
											</span>
											<span class="additional"> (для автозаполнения данных при заказе) </span>
										</div>
									</a>


								</li>
								<li id="blockAddDataRegister">
									<div>
										<label>
                                            <span class="bx-authform-starrequired">*</span>ФИО
										</label>
										<input type="text" name="FIO" maxlength="255" value="<?=$arResult["FIO"]?>" />
									</div>

									<label>
                                        <span class="bx-authform-starrequired">*</span>Номер телефона
									</label>
									<input type="text" name="PERSONAL_MOBILE" maxlength="255" value="<?=$arResult["PERSONAL_MOBILE"]?>"/>

									<label>Город</label>
									<input type="text" name="PERSONAL_CITY" value="<?=$arResult["PERSONAL_CITY"]?>"/>

									<label>Адрес</label>
									<input type="text" name="PERSONAL_STREET" value="<?=$arResult["PERSONAL_STREET"]?>"/>
								</li>
							</ul>

							<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
								<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

									<div class="bx-authform-formgroup-container">
										<div class="bx-authform-label-container"><?if ($arUserField["MANDATORY"]=="Y"):?><span class="bx-authform-starrequired">*</span><?endif?><?=$arUserField["EDIT_FORM_LABEL"]?></div>
										<div class="bx-authform-input-container">
											<?
											$APPLICATION->IncludeComponent(
												"bitrix:system.field.edit",
												$arUserField["USER_TYPE"]["USER_TYPE_ID"],
												array(
													"bVarsFromForm" => $arResult["bVarsFromForm"],
													"arUserField" => $arUserField,
													"form_name" => "bform"
												),
												null,
												array("HIDE_ICONS"=>"Y")
											);
											?>
										</div>
									</div>

								<?endforeach;?>
							<?endif;?>

							<div class="bx-authform-formgroup-container-line">
								<div class="bx-authform-formgroup-container">
									<div class="bx-authform-input-container container_checkbox">
										<input type="checkbox" name="USER_PERSONAL_INFO" maxlength="255" value="Y" data-required="required" id="userPersonalInfoReg" />
										<label for="userPersonalInfoReg"><?=GetMessage("USER_PERSONAL_INFO")?>*</label>
									</div>
								</div>
							</div>

							<?if ($arResult["USE_CAPTCHA"] == "Y"):?>
								<div class="bx-authform-formgroup-container-line">
									<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
									<div class="bx-authform-formgroup-container">
										<div class="bx-authform-input-container">
											<div class="bx-authform-label-container"><span class="bx-authform-starrequired">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?></div>
											<input type="text" name="captcha_word" maxlength="50" value="" data-required="required" autocomplete="off"/>
										</div>
									</div>
									<div class="bx-authform-formgroup-container">
										<div class="bx-authform-label-container">
											<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="230" height="48" alt="CAPTCHA" /></div>

										</div>
									</div>
								</div>
							<?endif?>

							<div class="bx-authform-formgroup-container send">
								<input type="hidden" name="LOGIN" value="<?=$arResult["LOGIN"]?>"  data-required="not_required" />
								<input type="hidden" name="register_submit_button" value="Y"/>
								<input type="submit" class="btn btn-primary submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
							</div>
						</form>
					</noindex>

					<script type="text/javascript">
						document.bform.EMAIL.focus();
						$(function(){
							var blockAddInfo = new BlockAddInfo("<?=$arResult['showAddInfoBlock']?>");
						});
					</script>

				<?endif?>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="containerSocServ">
				<h3 class="bx-title">Зарегистрироваться как пользователь</h3>
				<div class="blockSocServ">
					<?
					$APPLICATION->IncludeComponent("bitrix:socserv.auth.form",
						"flat",
						array(
							"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
							"AUTH_URL" => $arResult["AUTH_URL"],
							"POST" => $arResult["POST"],
						),
						$component,
						array("HIDE_ICONS"=>"Y")
					);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
