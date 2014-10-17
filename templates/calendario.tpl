<h2>{$nombreMes} {$ano}</h2>
<ul>
	<li class="day">L</li>
	<li class="day">M</li>
	<li class="day">X</li>
	<li class="day">J</li>
	<li class="day">V</li>
	<li class="day">S</li>
	<li class="day">D</li>

	{foreach $calendario as $dia} 
		{$dia}
	{/foreach}
</ul>

{section name=evento loop=$eventos}
<div class="capa" id="evento_{$eventos[evento].dia}">
    <p onclick="$('.capa').hide();"><img width="25" height="25" alt="" src="img/btnClose.png"></p>
    <div>
    	<p>{$eventos[evento].hora}h.</p>
    	<h2>{$eventos[evento].titulo}</h2>
    </div>
</div>
{/section}
