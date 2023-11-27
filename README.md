# myDownloads
force le telechargement avec un comptage. extension configurable. PRE-REQUIS: apache et mod_rewrite

<img src="https://github.com/gcyrillus/myDownloads/blob/main/icon.png?raw=true">
<p><strong>!Requiert un serveur Apache et mod_rewrite!</strong> pour la configuration par <code>.htaccess</code></p>
<p><b>Pour les serveurs NGINX</b>, il vous faudra modifier manuellement votre fichier de configuration pour y ajouter 2 régles de redirections.<sub>voir ci-dessous</sub></p>
<h2>Configuration</h2>
<blockquote><p><b>Avec un serveur NGINX</b>, vous devrez avant d'activer le plugin faire une modification dans votre fichier de configuration dans le block <i>server</i> avant la premiere ligne avec la declaration <b>location</b>.</p>
<p>Ces deux lignes à ajouter sont : <pre>rewrite ^/plugins/myDownloads/temp/is_active.txt /plugins/myDownloads/temp/okay.txt ; 
	include CHEMIN_ABSOLU_VERS_RACINE_DU_SITE/plugins/file2dl.nginx.conf.txt ;	</pre> où <i>CHEMIN_ABSOLU_VERS_RACINE_DU_SITE</i> correspond à root déclaré en amont sans les accolades. Une fois ceci fait, il faut encore créer un fichier vide à la racine du repertoire `plugins` de votre PluXml. Nommez ce fichier : `file2dl.nginx.conf.txt` . Il reste à  redemarrer le serveur pour que ces nouvelles régles s'appliquent.et ensuite activé le plugin.</p></blockquote>
<p><b>Pour Apache</b>, Il faut seulement activé le plugin pour modifier le fichier <code>.htaccess</code> à la racine de PluXml</p>
<p><b>Note: </b>Il n'est pas necessaire d'activé l'urlrewriting dans PluXml, le plugin fonctionne dans les deux configurations et est compatible avec le plugin mYBetterUrls.</p>
<p></p>
<p>Par défaut , aucunes extensions de fichier ne sont filtrées, vous devez indiquer quel type de fichiers doivent être téléchargés et comptabilisés.</p>
<p>Pour cela, vous devez faire votre liste d'extension en les séparant par une barre oblique et sans espaces.</p>
<p>Par exemple pour comptabiliser les téléchargement des fichiers zip et rar, il suffit d'indiquer <code>zip|rar</code> dans le champs de configuration.</p>
<p><b>Note</b> si vous ajoutez l'extension pdf: <code>zip|rar|pdf</code> Les documents pdf seront alors télécharger par défaut.</p>
<h2>La page administration</h2>
<p>Cette page accessible depuis le menu principale de l'administration vous indique l'état de configuration du plugin et affiche dans un tableau les téléchargement. Ceux ci sont indiqué par répértoire et fichiers.C'est la que vous aurez le compte de vos téléchargements.</p>
<h2>Coté visiteurs</h2>
<p>Le comptage est transparent et il n'est pas neccessaire de modifier vos liens vers les fichiers.</p>
