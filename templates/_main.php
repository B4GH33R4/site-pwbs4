<?php

/**
 * This is the main markup file containing the container HTML that all pages are output in.
 *
 * The primary focus of this file is to output these variables (defined in _init.php) in the 
 * appropriate places:
 *
 * $headline - Text that goes in the primary <h1> headline
 * $browserTitle - The contents of the <title> tag
 * $body - Content that appears in the bodycopy area
 * $side - Additional content that appears in the sidebar
 *
 * Note: if a variable called $useMain is set to false, then _main.php does nothing.
 *
 */

// if any templates set $useMain to false, abort displaying this file
// an example of when you'd want to do this would be XML sitemap or AJAX page.
if(!$useMain || $config->ajax) return;
/**********************************************************************************************/
?><!DOCTYPE html>
<html class="no-js" lang="EN">
<head>
<!--|
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
                         T I T L E   M E T A   T A G S
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||!!!-->
<meta charset="UTF-8">
<meta name="robots" content="noindex,nofollow"><!--|###!!!###-->
<title><?php echo $browserTitle; ?></title>
<?php if($page->summary) echo "<meta name='description' content=\"{$page->summary}\" />"; ?>
<meta name="author" content="traumturbulenzen@googlemail.com">
<!--|
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
                         V I E W P O R T
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||!!!-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--|
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
                         S T Y L E   S H E E T S
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||!!!-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,400|Josefin+Slab|Vast+Shadow' rel='stylesheet' type='text/css'>
<link href="<?php echo $config->urls->templates; ?>assets/css/icofont.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $config->urls->templates; ?>assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $config->urls->templates; ?>assets/css/tether.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $config->urls->templates; ?>assets/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $config->urls->templates; ?>assets/css/meanmenu.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $config->urls->templates; ?>assets/css/main.css" media="all" rel="stylesheet" type="text/css" />
<!--|!!!||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
                         S C R I P T S
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||!!!-->

<!--|!!!||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
                         F A V I C O N S
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||!!!-->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
</head>
<body class='<?php echo "template-{$page->template} section-{$page->rootParent->name} page-$page"; ?>'>

<!--Mobile Menu-->
<header id="mobile-menu" class="hidden-sm-up">
	<nav>
		<a class='navbar-brand navbar-brand-mobile hidden-md-up' href='<?php echo $homepage->url; ?>'>
			
			PrcssWr
			
			</a>
		<?php
		$pa = $homepage->children;
		$pa = $pa->prepend($homepage);
		echo renderMobileNavbar($pa);
		?>
	</nav>
</header>
<!--/#mobile-menu-->

<!--navbar-->
<nav class="navbar navbar-fixed-top navbar-dark bg-inverse hidden-sm-down">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<a class="navbar-brand hidden-xs-down" href="<?php echo $homepage->url ?>">
					
					PrcssWr
					
					</a>

				<?php
				$pa = $homepage->children;
				$pa = $pa->prepend($homepage);
				echo renderChildrenOf($pa);
				?>

				<!-- search form -->
				<form class="search form-inline pull-xs-right" action='<?php echo $pages->get('template=search')->url; ?>' method='get'>
					<input class="form-control" data-toggle="tooltip" data-placement="bottom" title="Search the site" type="text" name="q" placeholder="Search" value="<?php echo $sanitizer->entities($input->whitelist('q')); ?>" />
				</form>
			</div>
		</div>
	</div>
</nav>
<!--/navbar-->


	<!-- breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb bg-faded home m-t-1">
					<?php
					foreach($page->parents() as $item) {
						echo "<li><a href='$item->url'>$item->title</a></li> ";
					}
					// optionally output the current page as the last item
					echo "<li>$page->title</li> ";
					?>
				</ol>
			</div>
		</div>
	</div>
    <!--/breadcrumbs-->

	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
    <!--/content-->

	<!--footer-->
	<div class="container">
		<div class="row">
            <div class="col-xs-12">
                <footer class="footer m-t-3">
                    <p>&copy; <?php echo date('Y'); ?> pwbs4 &nbsp; | &nbsp; 
	powered by <a href="https://github.com/flydev-fr/site-pwbs4" target="_blank">pwbs4</a> | enhanced by <a href='mailto:traumturbulenzen@googlemail.com'>Mr. Bertrand | </a>
						<a href='http://processwire.com' title="PROCESSWIRE">
							<i class="fa fa-pinterest" aria-hidden="true"></i></a> 
						<a href='http://' title="BOOTSTRAP">
							<i class="icofont icofont-social-bootstrap"></i></a>
						<a href='http://' title="HTML5">
							<i class="fa fa-html5" aria-hidden="true"></i></a>
						<a href='http://' title="CSS3">
							<i class="fa fa-css3" aria-hidden="true"></i></a>
						<a href="http://icofont.com/" target="_blank">
							<i class="fa fa-icofont" aria-hidden="true"></i></a>		
					</p>
                </footer>
            </div>
		</div>
	</div>
	<!--/footer-->


	<script type="text/javascript">
	if (typeof jQuery == 'undefined') {
	    document.write(unescape("%3Cscript src='<?php echo $config->urls->templates; ?>assets/js/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));
	}
	</script>
	<script src="<?php echo $config->urls->templates; ?>assets/js/tether.min.js"></script>
	<script src="<?php echo $config->urls->templates; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $config->urls->templates; ?>assets/js/jquery.meanmenu.min.js"></script>
	<script src="<?php echo $config->urls->templates; ?>assets/js/scripts.js"></script>
	<?php foreach($config->scripts as $url) echo "<script src='$url'></script>"; ?>
</body>
</html>
