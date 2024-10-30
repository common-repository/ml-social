<?php

$ini_array = parse_ini_file("config.ini", true);

$id_categ= $ini_array['Primeiro_Produto']['Categoria'];
$buscar= $ini_array['Primeiro_Produto']['Keyword'];
$pais=strtoupper($HTTP_GET_VARS[pais]);
$preco=$ini_array['Primeiro_Produto']['Preco_Minimo'];
$precomax=$ini_array['Primeiro_Produto']['Preco_Maximo'];
$max= $ini_array['Primeiro_Produto']['Quantidade'];
$siteID= $ini_array['toolid'];
$base= $ini_array['Primeiro_Produto']['Base'];
switch ($pais) {
case "MLB":
    $dominio="www.mercadolivre.com.br";
    break;
case "MLP":
    $dominio="www.mercadolibre.com.pe";
    break;
default:
    $dominio="www.mercadolivre.com.br";
}?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
 

        <script>
            function callResize()
            {
                var height = document.body.scrollHeight;
                parent.resizeIframe(height);
            }
            window.onload =callResize;
        </script>
    <link href="<?php echo $base ?>/wp-content/plugins/ml-social/box/ml_style.css" rel="stylesheet" type="text/css">
    

    </head>
    <body>

<div id="lista-produtos">

<ul>
      
      
       <?php

$insideitem = false;
$item = array();
$tag = "";
$title = "";
$link = "";
$price = "";
$image="";
$currency= "";
$count = 1;

function startElement($parser, $name, $attrs) {
	global $insideitem, $tag, $base, $title, $link, $price, $image, $currency, $item, $count;
	if ($insideitem) {
		$tag = $name;
	} elseif ($name == "ITEM") {
		$insideitem = true;
	}
}

function endElement($parser, $name) {
	global $insideitem, $tag, $base, $title, $link, $price, $image, $currency, $item, $attrs, $count, $max;
	if ($name == "ITEM") {
		
		?>
      
      <li>
      

<a title="<?php echo $title ?>" href="<?php echo $link ?>" target="_blank">
<img border="0"  alt="<?php echo utf8_encode($title) ?>"   width="95" height="100" src="<?php echo $image ?>" align="center" valign="middle" ></a>

<a href="<?php echo $link ?>" target="_blank"><?php echo utf8_encode ($title) ?>   </a> <br />
 <span class="precio"> por apenas:<?php echo $currency ?> <?php echo  $price ?>
</span>


<a  title="<?php echo utf8_encode($title) ?>" href="<?php echo $link ?>" target="_blank"><img  border="0" 
src="<?php echo $base ?>/wp-content/plugins/ml-social/box/carrinho.png"   alt="<?php echo utf8_encode($title) ?>"></a>
   
 
   <?php 
   
   $title = "";
		$link = ""; 
		$price = "";
		$item = "";
		$image = "";
		$currency = "";
		$insideitem = false;
		$count = $count + 1;
		if ($count == 4)
		{
			echo " </li>";
			$count = 1;
		}
	}
}

function characterData($parser, $data) {
	global $insideitem, $tag, $title, $link, $price, $image, $currency, $item, $attrs, $siteID;
	if ($insideitem) {
	switch ($tag) {
		case "ITEM":
		$id .= $item['ID'];
		break;
		case "TITLE":
		$title .= $data;
		break;
		case "LINK":
		$link .= str_replace("XXX",$siteID,$data); 
		break;
		case "PRICE":
		$price .= $data;
		break;
		case "IMAGE_URL":
		$image .= $data;
		break;
		case "CURRENCY":
		$currency .= $data;
		break;		
	}
	}
}
$xml_parser = xml_parser_create('ISO-8859-1');
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
$fp = fopen("http://".$dominio."/jm/searchXml?as_categ_id=".$id_categ."&as_word=".$buscar."&as_price_min=".$preco."&as_price_max=".$precomax."&as_order_id=MAS_OFERTADOS&as_filtro_id=NUEVO&as_filtro_id=PRECIO_FIJO&as_display_type=G&noQCat=Y&as_qshow=".$max."","r")
	or die("Error reading data.");
while ($data = fread($fp, 4096))
	xml_parse($xml_parser, $data, feof($fp))
		or die(sprintf("XML error: %s at line %d", 
			xml_error_string(xml_get_error_code($xml_parser)), 
			xml_get_current_line_number($xml_parser)));
fclose($fp);
xml_parser_free($xml_parser);
			
   
   ?>   
   
  </ul> </div> <!-- FINAL DIV LISTA PRODUTOS -->

 
    </body>
</html>

