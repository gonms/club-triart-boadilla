<ul class="noticias">
{section name=noticia loop=$noticias}
	{if $smarty.section.noticia.first}
	<li class="first">
	{else}
	<li>
	{/if}
		{if $noticias[noticia].imagen != ""}
		<a href="http://gestor.clubtriartboadilla.com/docs/{$noticias[noticia].imagen}" target="_blank"><img src="http://gestor.clubtriartboadilla.com/docs/{$noticias[noticia].imagen}" /></a>
		{/if}
		<h2>{$noticias[noticia].titulo}</h2>
		<h3>{$noticias[noticia].fecha}</h3>
		<p>{$noticias[noticia].cuerpo}</p>
		{if $noticias[noticia].documento != ""}
		<a href="http://gestor.clubtriartboadilla.com/docs/{$noticias[noticia].documento}">ver documento</a>
		{/if}
	</li>
{/section}
</ul>