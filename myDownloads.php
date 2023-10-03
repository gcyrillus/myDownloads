<?php
	
	/**
		* Plugin myDownloads
		*
		* @package	PLX
		* @version	1.0
		* @date	29/09/2023
		* @author G-CYRILLUS
	**/
    class myDownloads extends plxPlugin {
        const HOOKS = array(
        'Index', 
        'plxMotorPreChauffageBegin',
		'plxAdminHtaccess',
        );
        
        // pour injecter dans le code existant
        const BEGIN_CODE = '<?php' . PHP_EOL;
        const END_CODE = PHP_EOL . '?>';
		public $jsonStat = array();
		public $fileStatDl = PLX_PLUGINS.__CLASS__.'/'.__CLASS__.'.json';
        
        
        
        
        
        public function __construct($default_lang){
            # Appel du constructeur de la classe plxPlugin (obligatoire)
            parent::__construct($default_lang);
            
            
            # Personnalisation du menu admin
            // $this->setAdminMenu('Titre du plugin', 1, 'Légende du lien');
            # Ajoute des hooks
            foreach(self::HOOKS as $hook) {
                $this->addHook($hook, $hook);
			}
			
            # droits pour accéder à la page config.php et admin.php du plugin
            $this->setConfigProfil(PROFIL_ADMIN);
            $this->setAdminProfil( PROFIL_ADMIN);
			
			
			
			
		}
        
		#code à exécuter à l’activation du plugin
		/* config par defaug  */		
		public function OnActivate() { 
			
			if(!file_exists($this->fileStatDl)) {
				$plxMotor = plxMotor::getInstance();
				$this->jsonStat = array('site'=> $plxMotor->aConf['title']);
				if (!touch($this->fileStatDl)) {
					echo "erreur";
					} else {
					file_put_contents($this->fileStatDl, json_encode($this->jsonStat,true));
				}
			}
			
			
		}
		/* regles de réecritures à ajouter pour activer le comptage */
		public function myHtaccessFile2dl($extList) {
		$htaccessRule='
# BEGIN -- plugin myDownloads
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_URI} .*\.('.$extList.')
RewriteRule ^(.*)/  index.php?file2dl=%{REQUEST_URI} [R]
</IfModule>
# END -- plugin myDownloads
';	
		return $htaccessRule;
		}
		
		/*
			* ajoute les regles de réecriture du plugin en fin de fichier htaccess
			* @author G-CYRILLUS
		*/
		public function writeHtaccess($plugHtaccess, $action){
		
		$htaccess = '';
		if(is_file(PLX_ROOT.'.htaccess')) {
			$htaccess = file_get_contents(PLX_ROOT.'.htaccess');
			# si present on efface
			if(preg_match("/^(.*)(# BEGIN -- plugin myDownloads.*# END -- plugin myDownloads)(.*)$/ms", $htaccess, $capture)) {
				$htaccess = str_replace($capture[2], '', $htaccess);
			}
		}
		# creation ou mise à jour
		if($action==1) {			
			$htaccess = $htaccess.PHP_EOL.$plugHtaccess;
		}
		
			
			return plxUtils::write($htaccess, PLX_ROOT.'.htaccess');
		
		
		
		}
		/*
			* Hook sur l'activation de l'urlRewriting dans PluXml.
			* Positionne les regles htaccess du plugin non prioritaire
			* Elles doivent être appliquées aprés celles de PluXml
			* @author G-CYRILLUS
		*/
		public function plxAdminHtaccess() {
		echo self::BEGIN_CODE;
?>
		# activation de l'urlrewriting de PluXml
		preg_match('/(END -- Pluxml)/', $htaccess, $matchesplx, PREG_OFFSET_CAPTURE);
		print_r($matchesplx);
		if (isset($matchesplx[0])){
			preg_match('/(# END -- plugin myDownloads)/', $htaccess, $matchesplug, PREG_OFFSET_CAPTURE);
			if (isset($matchesplug[0]) and $matchesplx[0][1] > $matchesplug[0][1]) {
			if(preg_match("/^(.*)(# BEGIN -- plugin myDownloads.*# END -- plugin myDownloads)(.*)$/ms", $htaccess, $capture))
					$htaccess = str_replace($capture[2], '', $htaccess);
					$htaccess = $htaccess.PHP_EOL.$capture[2];
			}
		}
<?php
		echo self::END_CODE;
		}
		

		
		/* ajout du mode file2dl */
		public function plxMotorPreChauffageBegin() {
			$string = "if(\$this->get && preg_match('/^file2dl\/?/',\$this->get)) {exit;}";
			echo "<?php ".$string." ?>";	
		}    
		
		
		/* s'intercalle entre la demande de fichier et son envoi au navigateur */
        public function Index() {
			$plxShow = plxShow::getInstance(); 
			$plxMotor = plxMotor::getInstance(); 
			
			if(isset($_GET['file2dl'])) {				
				$url='.'.$_GET['file2dl'];
				if(file_exists($url)) {
					
					$ext = pathinfo(basename($url), PATHINFO_EXTENSION);
					$dir = dirname($url);
					$records =  json_decode(file_get_contents($this->fileStatDl), true);
					if(isset($records['folder'][$dir][basename($url)])) {$records['folder'][$dir][basename($url)]=$records['folder'][$dir][basename($url)] + 1;}
					else {$records['folder'][$dir][basename($url)]=1;}
					file_put_contents($this->fileStatDl, json_encode($records,true) );
					
					ob_clean();
					
					//header information
					header('Content-Description: File Transfer');
					header('Content-Type: application/'.$ext);// on recupere l'extension du fichier, si buggy, mettre à la place de la variable : octet-stream
					header('Content-Disposition: attachment; filename="'.basename($url).'"');
					header('Content-Length: ' . filesize($url));
					header('Pragma: public');
					
		
					flush();
					//Read the size of the file
					readfile($url,true);
					
					//Terminator
					die(); 
				}
				else{
					echo '<p>'.basename($url) . " File does not exist.";
				}
				exit;
			}            
            // code
		}
        
        
        
	} // class Plugin
?>
