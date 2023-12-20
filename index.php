<?require($_SERVER["DOCUMENT_ROOT"]. "/bitrix/header.php");

CModule::IncludeModule('iblock');

$arFilter = array(
	'IBLOCK_ID' => 29,
	'PROPERTY_BRAND_TECHNIQUE' => ['DM (ДОРМАШ, г. Орел)','БРМЗ','ВЗЭ (ВЭКС)','ДОНЭКС','ДСТ-Урал','Ковровец','Кохановский экскаваторный завод','КРАНЭКС','МРМЗ','ТВЭКС','Уралвагонзавод','ХТЗ','ХТЗ, Муромтепловоз, АГМТ','ЧЕТРА','ЧТЗ','Алттрак','ВгТЗ','Гомсельмаш','КЗК','Ростельмаш','Техномаш','ТРАКОМ Кишинев','Ковровский экскаваторный завод','ЛЕСМАШ Йошкар-Ола','ОТЗ']
);

$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID','ID'));

while($el = $res->GetNext()):
	$arElementsID[] = $el['ID'];
endwhile;

foreach($arElementsID as $key):
	$ELEMENT_ID = $key;
	$cbe = new CIBlockElement;
	$arLoadProductArray = Array("ACTIVE" => "N");
	$cbe -> Update($ELEMENT_ID, $arLoadProductArray);
	if($cbe):
		echo "OK!<br>";
	else:
		echo "Ошибка!<br>";
	endif;
endforeach;

require($_SERVER["DOCUMENT_ROOT"]. "/bitrix/footer.php");?>