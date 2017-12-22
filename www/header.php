<?php

function buildHeader()
{

	$returnHtml = <<<EOD
<header>
	<div class="head-container">
		<a href="#"><h1>Bike 2:bytes</h1></a>
		<p>Interested in data, technology and the energy industry</p>
		<p>MSc in Atmospheric Science | Contributing writer in <a href="https://medium.com/towards-data-science" target="_blank">Towards Data Science</a> Medium publication</p>
	</div>
</header>
<article ng-controller="bikeBytes">
EOD;

	return $returnHtml;

}