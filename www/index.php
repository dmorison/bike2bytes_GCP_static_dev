<?php

include_once "classes/classMeta.php";
include_once "classes/classFooter.php";

echo buildContent();

function buildContent()
{
	$meta = new classMeta();
	$footer = new classFooter();

	$html = '';

	$html .= $meta->buildMeta();
	$html .= buildHeader();
	$html .= buildBody();
	$html .= $footer->buildFooter();

	return $html;

}

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

function buildBody()
{

	$returnHtml = <<<EOD
<div class="content-container clearfix">
	<div class="card">
		<div class="card-inner alpha">
			<a href="https://medium.com/towards-data-science/exploratory-data-analysis-into-the-relationship-between-different-types-of-crime-in-london-20c328e193ff" target="_blank">
				<div class="card-contents">
					<h3>Latest Medium blog post:</h3>
					<p>Exploratory data analysis into the relationship between different types of crime in London</p>
				</div>
			</a>
		</div>
	</div>
	<div class="card">
	    <div class="card-inner omega">
	        <a href="shinyapp-london-crime-mapping.php">
	            <div class="card-contents">
	                <h3>Shiny apps built in R</h3>
	                <img src="images/bar-chart.png">
	                <p>Exploring data with interactive visualizations</p>
	            </div>
	        </a>
	    </div>
	</div>
	<div class="card size-100">
        <div class="card-inner alpha omega">
            <div class="card-contents">
                <h3>What I've been reading</h3>
                <div class="challenge">
                	<span>Readings count of 2017:</span><span class="number">{{ readingsCount }}</span>
                </div>
                <ul class="card-list">
                    <li ng-repeat="item in readings"><a href="{{ item.link }}" target="_blank">{{ item.title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
	<div class="card size-60">
		<div class="card-inner alpha">
			<a href="/Tour-de-France-Game.php">
				<div class="card-contents">
					<h3>Tour de France Game 2017</h3>
					<p>3 days before the start of the 2017 Tour I decided to quickly develop a game that a handful of friends and family could play.</p>
				</div>
			</a>
		</div>
	</div>
	<div class="card size-40">
		<div class="card-inner omega">
			<a href="/wineBook" target="_blank">
				<div class="card-contents">
					<h3>Wine cellar</h3>
					<img src="images/drink.png">
					<p>Visit my personal wine website</p>
				</div>
			</a>
		</div>
	</div>
	<div class="card size-40">
		<div class="card-inner alpha">
			<div class="card-contents">
				<h3>Current book I'm reading:</h3>
				<p>{{ book }}</p>
			</div>
		</div>
	</div>
	<div class="card size-60">
		<div class="card-inner omega">
			<a href="http://www.parkrun.org.uk/richmond/results/athletehistory/?athleteNumber=995354" target="_blank">
				<div class="card-contents">
					<h3>Fastest 5km park run:</h3>
					<span class="number">{{ parkrunpb }}</span>
					<p>Richmond Park<br><span class="small-text">(visit results page)</span></p>
				</div>
			</a>
		</div>
	</div>
	<div class="card center-align size-60">
		<div class="card-inner omega">
			<div class="card-contents">
				<h3>2017 challenge:</h3>
				<p>20 push-ups per day, 6 days a week</p>
				<div class="challenge">
					<span>Count:</span><span class="number">{{ pushups }}</span>
				</div>
			</div>
		</div>
	</div>
</div>
EOD;

	return $returnHtml;

}

?>