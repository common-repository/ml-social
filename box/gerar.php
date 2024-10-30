<?php 

class Ml_Gerar {
	
	
	function gerador (){

global $wpdb;
$blop = $wpdb->get_row("SELECT * FROM  `".$wpdb->prefix."mlsocial` WHERE id_mlsocial = '1' " );
$traq = $blop->traqueamento;
$produto = $blop->produtos;
$categoria = $blop->categoria;
$key = $blop->chaves;
$compre = $blop->compre_ja;
$mercado_pago = $blop->mercado_pago;
$min = $blop->preco_minimo;
$max = $blop->preco_maximo;
$style = $blop->style_css;
$base =  get_option('siteurl'); 
$fp = fopen("./wp-content/plugins/ml-social/box/config.ini", "w");
$escreve = fwrite($fp,"toolid = $traq
[Primeiro_Produto]
Quantidade = $produto
Categoria = $categoria
Keyword = $key 
Compre_Ja = $compre
Mercado_Pago = $mercado_pago  
Vendedor_Certificado = Sim 
Preco_Minimo = $min 
Preco_Maximo = $max
Base = $base");
fclose($fp);

$fp = fopen("./wp-content/plugins/ml-social/box/ml_style.css", "w");
$escreve = fwrite($fp,"

				  ".$style."");
fclose($fp);



	}
}

?>