<?php
/**
 * @package ML Social
 */
/*
Plugin Name: ML Social
Plugin URI: http://wordpress.org/extend/plugins/ml-social/
Description:Este plugin faz a intera&ccedil;&atilde;o com o programa mercado de socio do site Mercado Livre, para monetizar seu site com uma vitrine personalizada. Voc&ecirc; precisa ser cadastrado no Mercado de Socio e come&ccedil;ar a fazer seu site a render mais.
Version: 1.0
Author: Marvio Rocha
Author URI: http://marviorocha.com/home/
License: GPLv2
*/

/*
This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation; version 2 of the License.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/

define('MLSocial_VERSION', '1.0');




add_action('admin_menu', 'mt_add_pages'); 

function mt_add_pages() {


  add_options_page('ML Social', 'ML Social', 'manage_options', 'mlsocial', 'my_plugin_options');
  



 
}



// INSTALA��O DO PLG ML SOCIAL

function mlsocial_install() {
	
	global $wpdb, $nome_da_tabela;
	


	
	$nome_da_tabela = $wpdb->prefix . "mlsocial";
	$site = get_option('siteurl');
	if ($wpdb->get_var("SHOW TABLES LIKE '$nome_da_tabela'") != $nome_da_tabela) {

		//Utilizamos a funcao query() para realizar a cricao de nossa tabela no MySQL
		$wpdb->query("CREATE TABLE IF NOT EXISTS ".$nome_da_tabela." (
  `id_mlsocial` int(11) NOT NULL AUTO_INCREMENT,
  `traqueamento` varchar(100) NOT NULL,
  `produtos` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `chaves` varchar(150) NOT NULL,
  `compre_ja` enum('sim','nao') NOT NULL,
  `mercado_pago` enum('sim','nao') NOT NULL,
  `preco_minimo` varchar(100) NOT NULL,
  `preco_maximo` varchar(100) NOT NULL,
  `style_css` text NOT NULL,
  PRIMARY KEY (`id_mlsocial`)
) ENGINE=MyISAM   ; ");

	
	}
	$wpdb->query ("INSERT INTO ".$nome_da_tabela."(`id_mlsocial`, `traqueamento`, `produtos`, `categoria`, `chaves`, `compre_ja`, `mercado_pago`, `preco_minimo`, `preco_maximo`, `style_css`) VALUES
(1, 'XXXXXXX', '7', '1000', 'Sony', 'sim', 'sim', '10', '1000', ' #lista-produtos { width:650px;float:left; display:block}\r\n #lista-produtos a:link {\r\n	font: 100% Arial, Verdana, Sans-Serif;\r\n	text-decoration: none;\r\n	color: #555555;\r\n	font-size:  12px;\r\n	font-weight: bold;\r\n}\r\n#lista-produtos a:visited {\r\n	font: 100% Arial, Verdana, Sans-Serif;\r\n	text-decoration: none;\r\n	color: #555555;\r\n	font-size:  12px;\r\n	font-weight: bold;\r\n}\r\n#lista-produtos a:hover {\r\n	font: 100% Arial, Verdana, Sans-Serif;\r\n	text-decoration: underline;\r\n	color: #555555;\r\n	font-size:  12px;\r\n	font-weight: bold;\r\n}\r\n#lista-produtos a:active {\r\n	font: 100% Arial, Verdana, Sans-Serif;\r\n	text-decoration: none;\r\n	color: #555555;\r\n	font-size: 12px;\r\n	font-weight: bold;\r\n}\r\n\r\n\r\n#lista-produtos .precio { padding:5px;\r\n	font: 100% Arial, Verdana, Sans-Serif;\r\n	font-size:15px;\r\n	color: #025EC7;\r\n}\r\n\r\n#lista-produtos { text-align:center; }\r\n#lista-produtos li {float:left;  padding:2px; margin:2px; text-decoration:none; list-style:none; width:130px; }\r\n#lista-produtos li:hover {background:#F4F4F4}');
");

} // fechar instalação do plugin





function my_plugin_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
	 echo '<div class="wrap">';
  echo '<h2>ML Social - Uma Super Vitrine para o Mercado de Socio</h2>';
  }

 
  echo '<p><div class="wrap">
<h2>ML Social - Uma Super Vitrine para o Mercado de Socio</h2></p>';

echo "<dd>Olá Amigos, tudo bem? Obrigado por instalar o plugin ML Social, <br>ele vai ajudar a você criar uma super vitrine para seu site/blog.<br> Antes de começar você deve se<a href=\"http://pmstrk.mercadolivre.com.br/jm/PmsTrk?tool=5863244&go=http://pmsapp.mercadolivre.com.br/jm/regpms?act=form&subAct=isUser\" target=_blank style=\"font-family: Arial, Helvetica, sans-serif; font-size: 12;\"> <font color=\"#3366FF\"> cadastrar aqui! </font> </a> no Mercado de Sócio. Boa Sorte!!! </dd>";

include_once('ml.php');
	
}


// Criar Arquivos Config.php  o Arquivo na Head sobre o INI das configurações

function Geramos(){
		
	include_once('box/gerar.php');	
	
	$gar = new Ml_Gerar();
	$showme = 'gerador';
	$gar->$showme();
		
		}
		
	 add_action('wp_head','Geramos'); 
	
function Gerar(){


include('box/frame.php');

	
		}
 add_action('comments_template','Gerar'); 
function Monetizado(){
	
	
	
	//Por favor não remover meus créditos tenho família e fiz esse Plugin exclusivo para pagar minhas contas... :)  eu@marviorocha.com *// 
	echo '<span  style="float:right; font-size:10px; margin:3px">
Monetizado com <a target="_blank" title="Marvio Rocha - Plugin ML Social" href="http://wordpress.org/extend/plugins/ml-social/">Plugin ML Social</a> -</br> Powered by: <a target="_blank" title="Marvio Rocha - Plugin ML Social" href="http://www.agenciamr.com.br">Ag&ecirc;ncia MR</a></span>';
	//Por favor não remover meus créditos tenho família e fiz esse Plugin exclusivo para pagar minhas contas... :)  eu@marviorocha.com *// 
	}
add_action('wp_footer','Monetizado'); 

/// REMOVE AS TABELAS DE ML SOCIAL
function mlsocial_undestall (){
global $wpdb;

$sqlPalavras = "DROP TABLE `".$wpdb->prefix."mlsocial`";

$wpdb->query($sqlPalavras);


	 
	}

	
register_deactivation_hook(__FILE__, "mlsocial_undestall"); 

register_activation_hook(__FILE__, "mlsocial_install");

?>
