# myDownloads
force le telechargement avec un comptage. extension configurable. PRE-REQUIS: apache et mod_rewrite

<img src="https://github.com/gcyrillus/myDownloads/blob/main/icon.png?raw=true">
<p><strong>!Requiert un serveur Apache et mod_rewrite!</strong></p>
<h2>Configuration</h2>
<p>Il faut d'abord activé le plugin pour modifier le fichier <code>.htaccess</code> à la racine de PluXml</p>
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
