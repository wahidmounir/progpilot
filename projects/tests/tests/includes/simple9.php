<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', './' );

$vulnerabilityFile = '';
switch ( $_COOKIE[ 'security' ] )
{
case 'low':
    $vulnerabilityFile = 'low.php';
    break;
case 'medium':
    $vulnerabilityFile = 'medium.php';
    break;
case 'high':
    $vulnerabilityFile = 'high.php';
    break;
default:
    $vulnerabilityFile = 'impossible.php';
    break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "dvwa/{$vulnerabilityFile}";
/*
$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: Reflected Cross Site Scripting (XSS)</h1>

	<div class=\"vulnerable_code_area\">
		<form name=\"XSS\" action=\"#\" method=\"GET\">
			<p>
				What's your name?
				<input type=\"text\" name=\"name\">
				<input type=\"submit\" value=\"Submit\">
			</p>\n";

if( $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();
*/
$page[ 'body' ] = "
		</form>
		{$html}
	</div>

	<h2>More Information</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Cross-site_scripting' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.cgisecurity.com/xss-faq.html' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.scriptalert1.com/' ) . "</li>
	</ul>
</div>\n";

    echo $page[ 'body' ];

?>