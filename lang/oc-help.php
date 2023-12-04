<article itemprop="text">
	<p class="hp"><img src="../../plug-ins/myDownloads/icon.png"/><span>
	que fòrça lo telechargement dab un comptatge <br/>Dab lista d'extensions configurables e defendudas. 
	<br/>PRE-REQUERIT: apache e mod_rewrite o Nginx e l'edition deu son fichèr <que></còda> conf còdi .</span>
	</p>
	<p><strong>!Que requereish un servidor apache e mod_rewrite!</strong> entà la configuracion per <code>.htacess</code> e entaus servidors NGINX, 
	que'vs calerà modificar manuaument lo vòste fichèr de configuracion entà i ajustar 2 régles de redirections.</p>
	<h2>Configuracion</h2>
		<blockquote>
			<p><b>Dab un servidor NGINX</b>, que deuratz abans d'activar lo plug-in har ua modificacion dens lo vòste fichèr de configuracion dens lo block <i>server</i> 
			abans la premiere linha dab la declaration <b>locacion</b>.</p>
			<p>Aqueras duas linhas a ajustar que son : </p>
			<pre>rewrite ^/plug-ins/myDownloads/temp/is_activa.txt /plug-ins/myDownloads/temp/okay.txt ; 
include CHEMIN_ABSOLUT_VÈRN_RACINE_DE LO_SITE/plug-ins/file2dl.nginx.conf.txt ;	</pre>
			<p>on <i>CHEMIN_ABSOLUT_VÈRN_RACINE_DE LO_SITE</i> que correspon a root declarat en amont shens los accolades. Un còp açò que hè, que cau enqüèra crear un fichèr 
				que vueita a la rasic deu repertoire `plug-ins` deu vòste PluXml. Que nommatz aqueth fichèr : `file2dl.nginx.conf.txt` . Que demora a redemarrer lo servidor entà qu'aqueras 
			  navèras régles si appliquent.et puish activat lo plug-in.</p>
		</blockquote>
		<p><b>Entà Apache</b>, Que cau solament activat lo plug-in entà modificar lo fichèr <code> .htaccess</code> a la rasic de PluXml</p>
		<p><b>Nòta: </b>N'ei pas necessaire d'activat l'urlrewriting dens PluXml, lo plug-in que fonciona dens las duas configuracions e qu'ei 
		  compatibla dab lo plug-in mYBetterUrls .</p>
		<p><b>Per defaut</b> , aucunes extensions de fichèr ne son pas filtradas, que devetz indicar quau tipe de fichèrs que deven estar telecargats e comptabilizats.</p>
		<p>Entà aquò, que devetz har la vòsta lista d'extension en los separant per ua barra oblica e shens espacis.</p>
		<p>Per exemple entà comptabilizar los telecargament deus fichèrs zip e rar, que sufigó d'indicar <code>zip|rar</code> dens lo camps de configuracion .</p>
		<p><b>Nòta</b> si ajustatz l'extension pdf: <code>zip|rar|pdf</code> Los documents pdf que seràn alavetz telecargar per defaut.</p>
		<h2>La pagina administracion</h2>
		<p>Aquera pagina accessibla despuish lo menut principau de l'administracion que vs'indica l'estat de configuracion deu plug-in e aficha dens un tablèu 
		los telecargaments. Aqueths ací que son indicats per répértoires e fichèrs. Qu'ei la qu'auratz lo compte deus vòstes telecargaments per fichèrs.</p>
		<h2 >Quotat visitaires</h2>
		<p>Lo comptatge qu'ei transparent e n'ei pas neccessaire de modificar los vòstes ligams cap aus fichèrs. Que sufigó d'un ligam dirècte cap au fichèr .</p>
	</article>
	<style>
article {
  margin: -2em -1em;
  padding: 0 calc(25vw - 100px);
  background: #dfefff
}
h2 {
  color:blue;
  font-variant: all-petite-caps;
  
    
}
p.hp {
  background: lightgreen;

  text-align: center;
  color: blue ;
  font-size: 18px;
}
p.hp img {
  mix-blend-mode:  luminosity;
  border-radius: 50%;
  margin: 1em;
  box-shadow:0 0 0 5px;
  object-position: 0 .25em;
  background: white;
  max-width: 200px;
  vertical-align:middle;
}
p.hp span {
  display:inline-block;
  max-width: calc(800px - 25vw);
  vertical-align: middle;
}
p.hp span::first-line {
  color:black;
  font-size: 1.3em;
  font-variant: small-caps;
  font-weight: bold
}
blockquote {
  font-size:  initial;
  border-inline-start: solid blue;
  padding-inline-start: 1em;
}
pre, code {
  font-family:initial;
  color:hotpink;
  font-weight: bold;
  font-size: 1em;
  background: #555;
  padding:1em 
}
code {
  padding:0.25em 0.5em;
  color:floralwhite;
}</style>