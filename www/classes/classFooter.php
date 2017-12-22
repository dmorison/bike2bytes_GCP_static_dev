<?php
/*error_reporting(-1);
ini_set('error_reporting', E_ALL);*/

class classFooter
{

	public function buildFooter()
	{

		$html = <<<EOD
		<footer class="clearfix">
	    	<ul class="clearfix">
	    		<li class="additions"><a href="http://www.linkedin.com/pub/david-morison/65/539/540" target="_blank"><img src="images/linkedin-icon.png" title="Linkedin" alt="Linkedin"></a></li>
	    		<li class="additions"><a href="https://github.com/dmorison" target="_blank"><img src="images/github-icon.png" title="Github" alt="Github"></a></li>
	    		<li class="additions"><a href="https://www.facebook.com/dmorison1" target="_blank"><img src="images/facebook-icon.png" title="Facebook" alt="Facebook"></a></li>
	    		<li><a href="https://www.instagram.com/djmorison/" target="_blank"><img src="images/instagram-icon.png" title="Instagram" alt="Instagram"></a></li>
	    	</ul>
	    	<a href="index.php"><span class="footer-title">Bike 2:bytes</span></a>
	    	<!-- <img src="images/Bike-Sign.png" width="400" height="400"> -->
	    </footer>
    </article>
	<script src="scripts/libs/angular.min.js"></script>
	<script src="scripts/scripts.js"></script>
</body>
</html>
EOD;

		return $html;

	}

}

?>