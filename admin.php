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
<h2>Infos configuration</h2>
<p> plugin actif : <?php if($var['activated'] ==0){echo L_NO;}else{ echo L_YES;}?> 
<p> Extension de fichiers en telechargement forcés :<?= $var['extension'] ?>
<h2>Comptage téléchargement par repertoire</h2>	
<table style="border:solid;margin:1em">	
	<?php
		echo '<tr class="siteDL"><th colspan="3">file downloads from: '.$records['Site'].'</th></tr>';
		unset($records['Site']);		
		foreach ($records['folder'] as $folder => $record) { 
			echo '			
			<tr class="folderDL"><th>folder</th><td>'.$folder.'</td><td>dl</td></tr>
			'; 
			foreach ($record as $file => $num) { 
				echo '
				<tr class="fileDL"><td></td><th>'.$file.'</th><td>'. $num .'</td></tr>
				';
			}
		}
	?>
</table>
<style>
	.siteDL{background:orange}
	.folderDL{background:#bee}
	.folderDL >:last-child,.fileDL >:last-child {background:#DBEDF980;font-weight:bold;border-left:1px solid;}	
	.folderTH{background:silver}
	.folderDL + .fileDL td:first-child:before{content:'file'}
	
	</style>