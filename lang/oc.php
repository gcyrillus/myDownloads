<?php    
	
	$LANG = array(
	
    # config.php
    'L_CONFIG'					=> 'Pagina de configuracion',
	'L_CONFIG_INFOS'			=> 'Infos de configuracion',
    'L_GOTO_ADMIN'      		=> 'Anar a la pagina administracion',
	'L_DESCRIPTION' 			=> 'L\'empeuton se bota entre un fichièr demandat per un visitaire en enregistrant lo nombre d\'enregistrament abans de li tornar en forçant lo telecargament d\'aqueste.',
	'L_NO_MOD_REWRITE'			=> 'Foncion mod_rewrite non disponibla. Empeuton foncional.',
	'L_UPDATE_NGINX_CONF'		=> 'L\'empeuton es compatible NGINX en modificant lo fichièr de configuracion de vòstre servidor.
	S\'albergatz mantun site sul meteis albergador, modifiquetz pas que lo fichièr correspondent al site ont installatz l\'empeuton.
	Avètz d\'apondre aquestas doas linhas al fichièr davant la primièra linha de configuracion començant per <b>location</b>.
Aquestas linhas son :<pre style="color: fuchsia;font-weight: bold;">
	rewrite ^/plugins/myDownloads/temp/is_active.txt /plugins/myDownloads/temp/okay.txt ; 
	include CHEMIN_ABSOLU_VERS_RACINE_DU_SITE/plugins/file2dl.nginx.conf.txt ;
	</pre> ont <i>CAMIN_ABSOLUT_CAP_A_LA_RAIÇ_DEL_SITE</i> correspond a root declarat amont sens las acoladas.',
	'L_ACTIVATE' 				=> 'filtratge actiu',
	'L_IS_PLUGIN_ACTIVE'		=> 'Empeuton activat ',
	'L_IS_ACTIVE'				=> 'Lo filtratge es actiu : ',
	'L_FORCED_EXTENSION'		=> 'Extension de fichièrs en telecargament forçats: ',
	'L_EXTENSION'				=> 'Extensions de fichièr de tractar e a forçar al telecargament',
	'L_FORMAT_WARNING' 			=> 'Inserir las extensions de fichièr en las separant per une barra oblica : | e sens espacis.',
	'L_FORMAT_EXAMPLE' 			=> 'Exemple de lista de format de fichièrs de tractar',
	'L_COUNT_DOWNLOAD'			=> 'Comptatge dels telecargaments',
	'L_DOCUMENT_NOT_ALLOWED'	=> 'Aqueste document es pas autorizat a èsser telechargat.',
	'L_DOCUMENT_NOT_EXIST'		=> 'Aqueste document existís pas',
	'L_BACK_HOME'				=> 'Retorn al site ⤾',
	'L_NO_DATA'					=> 'Cap de fichièr pas telecargat.',
	'L_FILE'					=> 'Fichièr(s)',
	'L_FILE_FROM'				=> 'Fichièrs telecargats dempuèi',
	'L_FOLDER'					=> 'Repertòri',
);
