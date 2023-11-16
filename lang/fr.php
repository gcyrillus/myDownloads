<?php    
	
	$LANG = array(
	
    # config.php
    'L_CONFIG'					=> 'Page de Configuration',
	'L_CONFIG_INFOS'			=> 'Infos de configuration',
    'L_GOTO_ADMIN'      		=> 'Allez à la page administration',
	'L_DESCRIPTION' 			=> 'Le plugin s\'interface entre un fichier demandé par un visiteur en enregistrant le nombre d\'enregistrement avant de lui renvoyer en forçant le téléchargement de celui-ci.',
	'L_NO_MOD_REWRITE'			=> 'Fonction mod_rewrite non disponible. Plugin non fonctionnel.',
	'L_UPDATE_NGINX_CONF'		=> 'Le plugin est compatible NGINX en editant le fichier de configuration de votre serveur.
	Si vous heberger plusieurs site sur le même hebergement, n\'editer que le fichier correspondant au site où vous installez le plugin.
	Vous avez deux lignes à ajouter dans le fichier devant la premier ligne de configuration commençant par <b>location</b>.
Ces lignes sont:<pre style="color: fuchsia;font-weight: bold;">
	rewrite ^/plugins/myDownloads/temp/is_active.txt /plugins/myDownloads/temp/okay.txt ; 
	include CHEMIN_ABSOLU_VERS_RACINE_DU_SITE/plugins/file2dl.nginx.conf.txt ;
	</pre> où <i>CHEMIN_ABSOLU_VERS_RACINE_DU_SITE</i> correspond à root déclaré en amont sans les accolades.',
	'L_ACTIVATE' 				=> 'filtrage actif',
	'L_IS_PLUGIN_ACTIVE'		=> 'Plugin activé ',
	'L_IS_ACTIVE'				=> 'Le filtrage est actif: ',
	'L_FORCED_EXTENSION'		=> 'Extension de fichiers en téléchargement forcés: ',
	'L_EXTENSION'				=> 'Extensions de fichier à traiter et à forcer au téléchargement',
	'L_FORMAT_WARNING' 			=> 'Inserer les extensions de fichier en les séparant par une barre oblique : | et sans espaces.',
	'L_FORMAT_EXAMPLE' 			=> 'Exemple de liste de format de fichiers à traiter',
	'L_COUNT_DOWNLOAD'			=> 'Comptage des téléchargements',
	'L_DOCUMENT_NOT_ALLOWED'	=> 'Ce document n\'est pas autorisé à être téléchargé.',
	'L_DOCUMENT_NOT_EXIST'		=> 'Ce document n\'existe pas',
	'L_BACK_HOME'				=> 'Retour au site ⤾',
	'L_NO_DATA'					=> 'Auncun fichier téléchargé.',
	'L_FILE'					=> 'Fichier(s)',
	'L_FILE_FROM'				=> 'Fichiers téléchargés depuis',
	'L_FOLDER'					=> 'Répertoire',
);