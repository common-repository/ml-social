
<h3>Crie sua Vitrine</h3>

<form  action="options.php" method="post">
<?php  wp_nonce_field('update-options');
global $wpdb;
$wpdb->query("UPDATE `".$wpdb->prefix."mlsocial` SET `traqueamento` = '".get_option('traqueamento')."', `produtos` = '".get_option('produto')."',`categoria` = '".get_option('categoria')."',`chaves` = '".get_option('keywords')."', `compre_ja` = '".get_option('compre_ja')."', `mercado_pago` = '".get_option('mercado_pago')."', `preco_minimo` = '".get_option('min')."', `preco_maximo` = '".get_option('max')."', `style_css` = '".get_option('style')."' WHERE `".$wpdb->prefix."mlsocial`.`id_mlsocial` = 1;");

?>
<fieldset>

<label>
Código de Traqueamento:</label>
<input type="text"  id="traqueamento" name="traqueamento" value="<?php echo get_option('traqueamento'); ?>" />
<p>
<label>Número de Produtos:</label>

<select name="produto">
  
  <option value="1">1 Produto</option>
  <option value="2">2 Produtos</option>
  <option value="3">3 Produtos</option>
  <option value="4" selected="selected">4 Produtos</option>
  <option value="5">5 Produtos</option>
    <option value="6">6 Produtos</option>
      <option value="7">7 Produtos</option>
        <option value="8">8 Produtos</option>
</select>
<p>
<label>
Palavras chaves:</label>
<input name="keywords" type="text"  id="keywords"  value="<?php echo get_option('keywords'); ?>" size="50" />
<p>
<label>Categoria:</label>

<select name="categoria">

  <option value="1051">Celulares e Telefonia</option>
  <option value="1000">Eletrônicos, Áudio e Vídeo</option>
  <option value="1071">Animais</option>
  <option value="1132">Brinquedos e Hobbies</option>
  <option value="1168">Música</option>
  <option value="1246">Saúde e Beleza</option>
  <option value="1384">Artigos para Bebês</option>
  <option value="1430">Calçados, Roupas e Bolsas</option>
  <option value="1540">Serviços</option>
  <option  value="1648" selected="selected">Informática</option>
  <option value="1743">Carros, Motos e Outros</option>
  <option value="1144">Games</option>
  <option value="1182">Instrumentos Musicais</option>
  <option value="1276">Esportes e Fitness</option>
  <option value="1367">Antiguidades</option>
  <option value="1499">Agro, Indústria e Comércio</option>
  <option value="1574">Móveis e Decoração</option>
  <option value="1798">Coleções e Comics</option>
  <option value="3281">Filmes e Seriados</option>
  <option value="1196">Livros</option>
  <option value="1039">Câmeras e Acessórios</option>
  <option value="3937">Jóias e Relógios</option>
  <option value="1459">Imóveis</option>
  <option value="5672">Acessórios para Veículos</option>
  <option value="5726">Eletrodomésticos</option>
  <option value="1953">Outros</option>

</select>
<p>

<label>Compre já:</label>

<select name="compre_ja">

  <option value="Sim" selected="selected">Sim</option>
  <option   value="Nao">Não</option>
</select>
<p>

<label>Aceita Mercado Pago:</label>

<select name="mercado_pago">

  <option value="Sim" selected="selected">Sim</option>
  <option value="Nao">Não</option>
</select>
<p>

<label>Preço Minímo:</label>

<select name="min">
 
  <option  value="10" selected="selected">R$ 10,00</option>
  <option value="20">R$ 20,00</option>
  <option value="30">R$ 30,00</option>
  <option value="40">R$ 40,00</option>
  <option value="50">R$ 50,00</option>
  <option value="60">R$ 60,00</option>
  <option value="70">R$ 70,00</option>
  <option value="80">R$ 80,00</option>
  <option value="90">R$ 90,00</option>
  <option value="100">R$ 100,00</option>
  
  </select>
<p>
<label>Preço Máximo:</label>

<select  name="max">
  <option value="100">R$ 100,00</option>
  <option value="200">R$ 200,00</option>
  <option value="300">R$ 300,00</option>
  <option value="400">R$ 400,00</option>
  <option value="500" selected="selected">R$ 500,00</option>
  <option  value="1000">R$ 1000,00</option>
  <option value="2000">R$ 2000,00</option>
  <option value="5000">R$ 5000,00</option>
  <option value="10000">R$ 10.000,00</option>


</select>
<p>
<label>Seu CSS Style:</label><br />

<textarea name="style" cols="45" rows="5"> <?php echo get_option('style'); ?></textarea>
<fieldset>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="traqueamento,produto,keywords,categoria,compre_ja,mercado_pago,min,max,style" />

<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

</p>
</form>


