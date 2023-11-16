<?php if(!defined('PLX_ROOT')) exit;


	#initialisation variables 
	$var['activated'] 		= $plxPlugin->getParam('activated')			=='' ? 0			: $plxPlugin->getParam('activated');
	$var['extension'] 		= $plxPlugin->getParam('extension')			=='' ? ''			: $plxPlugin->getParam('extension');

 ?>

<!-- lien direct vers la page de configuration -->
<p style="text-align:right;text-align:inline-end"><!--<a href="<?php echo PLX_ROOT ?>core/admin/"   title="<?php $plxPlugin->lang('L_BACK_TO_ADMINISTRATION') ?>"> <?php $plxPlugin->lang('L_BACK_TO_ADMINISTRATION') ?> </a> --> <a href="<?php echo PLX_ROOT ?>core/admin/parametres_plugin.php?p=<?= basename(__DIR__) ?>"  title="<?php $plxPlugin->lang('L_GOTO_CONFIG') ?>"><?php $plxPlugin->lang('L_CONFIG') ?></a></p>
<?php
	
	$records =  json_decode(file_get_contents($plxPlugin->fileStatDl), true);
?>
<h2><?php $plxPlugin->lang('L_CONFIG_INFOS') ?></h2>

<p <?php if($var['activated']==0) echo ' class="alert red" ' ; else echo ' class="alert green" ' ;?> style="width:max-content"><?php $plxPlugin->lang('L_IS_ACTIVE') ?>: <b><?php if($var['activated'] ==0){echo L_NO;}else{ echo L_YES;}?></b></p> 
<p><?php $plxPlugin->lang('L_FORCED_EXTENSION') ?>: <b><?= $var['extension'] ?></b></p>
<h2><?php $plxPlugin->lang('L_COUNT_DOWNLOAD') ?></h2>	
	<?php if($plxPlugin->getParam('urlRewriteAvalaible') != '1') { 
		echo '<p class="alert red">'.$plxPlugin->getLang("L_NO_MOD_REWRITE").'</p>'; 
		echo '<div class="alert green">'.$plxPlugin->getLang('L_UPDATE_NGINX_CONF').'</div>';
	} ?>
<div class="statDL">	
	<?php
		unset($records['Site']);
		if(count($records)>0){
		echo'<dl>';
		foreach ($records['folder'] as $folder => $record) { 
			echo '			
			<dt class="folderDL"><u>'.$plxPlugin->getLang("L_FOLDER").':</u> '.$folder.'</dt>
			'; 
			foreach ($record as $file => $num) { 
				echo '
				<dd class="fileDL"><span class="file-icon  file-icon-xs" data-type="'.pathinfo(basename($file), PATHINFO_EXTENSION).'"></span>'.$file.': <span>'. $num .'</span></dd> 
				';
			}
		}
		echo '</dl>';
		} else {
		echo '<p class="alert blue">'.$plxPlugin->getLang("L_NO_DATA").'</p>';
		}
	?>
</table>
<style>
	.siteDL{}
	.statDL{margin:1em;padding:0;width:max-content;max-width:70vw;min-width:44ch;position:relative;filter: drop-shadow(1px 1px 5px rgba(0,0,0,0.3));}
	.statDL>*{margin:0;padding-block:0;}
	.folderDL{background:aliceblue;text-indent:0.25em;border:solid 1px gray;display: flex;margin-top:0.325em;}
	.folderDL:after {content: 'X';}
	.folderDL u {width: 5em;display: inline-block;}
	.folderDL + .fileDL:before{content:'<?= $plxPlugin->lang("L_FILE")?>';position:absolute;left:3px;font-size:0.8em;line-height:2}
	.fileDL{margin-left: 4.5em;display: flex;border: solid 1px gray;margin-top: -1px;background:#fffaf0}
	.fileDL span:last-child, .folderDL:after {margin-left: auto;padding: 0 0.5em;border-left: inherit;background: #efefef;min-width:8ch}
</style>
<link rel="stylesheet" href="<?= PLX_PLUGINS.basename(__DIR__)?>/css/fileicon.css" media="screen,print"/>