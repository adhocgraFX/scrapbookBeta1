<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.scrapbook
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app  = Factory::getApplication();
$lang = $app->getLanguage();
$wa   = $this->getWebAssetManager();

// Detecting Active Variables
$option    = $app->input->getCmd('option', '');
$view      = $app->input->getCmd('view', '');
$layout    = $app->input->getCmd('layout', '');
$task      = $app->input->getCmd('task', '');
$itemid    = $app->input->getCmd('Itemid', '');
$sitename  = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu      = $app->getMenu()->getActive();
$pageclass = $menu->getParams()->get('pageclass_sfx');
$tpath     = $this->baseurl . '/templates/' . $this->template;

// get template params
// logo
$logo = $this->params->get('logo');

// Register and attach/use a custom item in one run
// $wa->registerAndUsePreset('template.scrapbook');

// Enable assets
$wa->usePreset('template.scrapbook');
// register asset
$wa->registerPreset('template.scrapbook');

// meta data
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
$this->setMetaData('X-UA-Compatible', 'IE=edge', 'http-equiv');
?>

<!DOCTYPE html>

<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>

    <jdoc:include type="metas"/>
    <jdoc:include type="styles"/>
    <jdoc:include type="scripts"/>

    <!-- icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body class="<?php echo $pageclass ?>
             <?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task'); ?>
             <?php echo($itemid ? ' itemid-' . $itemid : ''); ?>"
      role="document">


<header class="app-bar" role="banner">
    <!-- logo image position -->
	<?php if ($logo): ?>
        <div class="logo-image">
            <a href="<?php echo $this->baseurl ?>">
                <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"
                     alt="<?php echo htmlspecialchars($sitename); ?>"/>
            </a>
        </div>
	<?php endif; ?>

    <section class="app-bar-container">
        <!-- site title -->
        <h1 class="logo-text">
            <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitename); ?></a>
        </h1>
        <!-- mobile button -->
		<?php if ($this->countModules('sidebar') or $this->countModules('nav') or $this->countModules('search')): ?>
            <button class="sidebar-menu" aria-label="Navigation"></button>
		<?php endif; ?>
    </section>
</header>

<section class="layout block-group">
    <!-- slideshow position -->
	<?php if ($this->countModules('slideshow')): ?>
        <section class="slider-container" role="complementary">
            <jdoc:include type="modules" name="slideshow" style="flickity"/>
        </section>
	<?php endif; ?>

    <section class="main-container">
        <aside class="sidebar-container" role="complementary">
            <!-- sidebar title -->
            <h4 class="sidebar-text">Sidebar</h4>
            <!-- nav position -->
			<?php if ($this->countModules('nav')): ?>
                <nav class="nav-container" id="navdrawer" role="navigation">
                    <jdoc:include type="modules" name="nav"/>
                </nav>
			<?php endif; ?>
            <!-- search position -->
	        <?php if ($this->countModules('search')): ?>
                <div class="search-container">
                    <jdoc:include type="modules" name="search" style="none"/>
                </div>
	        <?php endif; ?>
            <!-- sidebar position -->
	        <?php if ($this->countModules('sidebar')): ?>
                <section class="sidebar" role="complementary">
                    <jdoc:include type="modules" name="sidebar" style="jduo"/>
                </section>
	        <?php endif; ?>
            <!-- footer position -->
	        <?php if ($this->countModules('footer')): ?>
                <footer role="contentinfo">
                    <jdoc:include type="modules" name="footer" style="footer"/>
                </footer>
	        <?php endif; ?>
        </aside>
        <!-- main position -->
        <main role="main">
            <section class="content">
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
            </section>
        </main>
    </section>

    <!-- breadcrumbs -->
	<?php if ($this->countModules('breadcrumbs')): ?>
        <section class="breadcrumbs-container" role="navigation">
            <jdoc:include type="modules" name="breadcrumbs" style="none"/>
        </section>
	<?php endif; ?>
</section>

<!-- to top -->
<a href="#" class="go-top"><span class="icon-chevron-up"></span>
    <p hidden>Top</p>
</a>
<!-- debug position -->
<jdoc:include type="modules" name="debug" style="none"/>

<!-- load scripts -->
<?php include_once('scripts/scripts.php'); ?>

</body>
</html>