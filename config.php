<?php
	if(!defined('PLX_ROOT')) exit;
	
	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
	if(!empty($_POST)) {
	if(strlen(trim($_POST["extension"]))<1 OR $plxPlugin->getParam('urlRewriteAvalaible') != '1'){$_POST["activated"] ='0';}
		$plxPlugin->setParam("activated", plxUtils::strCheck($_POST["activated"]), "numeric");
		$plxPlugin->setParam("extension", plxUtils::strCheck($_POST["extension"]), "cdata");
		$plxPlugin->saveParams();
		
		$plxPlugin->writeHtaccess($plxPlugin->myHtaccessFile2dl(trim($_POST["extension"])),$_POST["activated"]);
		header("Location: parametres_plugin.php?p=".basename(__DIR__));
		exit;
	}	
	#initialisation variables 
	$var['activated'] 		= $plxPlugin->getParam('activated')			=='' ? 0			: $plxPlugin->getParam('activated');
	$var['extension'] 		= $plxPlugin->getParam('extension')			=='' ? ''			: $plxPlugin->getParam('extension');
?>
<p><?php $plxPlugin->lang("L_DESCRIPTION") ?></p>	
<h2><?php $plxPlugin->lang("L_CONFIG") ?></h2>	
<p><?php $plxPlugin->lang("L_IS_PLUGIN_ACTIVE") ?>: <?php if(!isset($plxAdmin->plxPlugins->getInactivePlugins()['myDownloads'])){echo '<b class="alert green">'.L_YES.'</b>';}else{ echo '<b class="alert orange">'.L_NO.'</b>';}?></p>
<form action="parametres_plugin.php?p=<?= basename(__DIR__) ?>" method="post" >
	
	<p>
		<label <?php if($var['activated']==0) echo ' class="alert red" ' ; else echo ' class="alert green" ' ;?> style="width:max-content"><?php $plxPlugin->lang("L_ACTIVATE") ?>: 
			<?php plxUtils::printSelect('activated',array('1'=>L_YES,'0'=>L_NO), $var['activated']);?>
		</label>
	</p>
	<?php if($plxPlugin->getParam('urlRewriteAvalaible') != '1') { echo '<p class="alert red">'.$plxPlugin->getLang("L_NO_MOD_REWRITE").'</p>';}
	else { ?>
	<p>
		<label><?php $plxPlugin->lang("L_EXTENSION") ?>
		</label>
		<input id="id_extension" name="extension" type="text" value="<?= $var['extension']?>" size="70" maxlength="255" placeholder="zip|rar|pdf|epub"/>
	</p>
	<p class="alert orange">
		<strong><?php $plxPlugin->lang("L_FORMAT_WARNING") ?></strong>  
			<br/><i><?php $plxPlugin->lang("L_FORMAT_EXAMPLE") ?> : <small>zip|rar|pdf</small></i>
	</p>
	<?php } ?>
	<p class="in-action-bar">
		<?php echo plxToken::getTokenPostMethod() ?><br>
		<input type="submit" name="submit" value="<?= L_COMMENT_SAVE_BUTTON ?>"/>
	</p>
</form>