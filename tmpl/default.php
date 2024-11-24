<?php
defined('_JEXEC') or die;
use Joomla\CMS\Layout\LayoutHelper;
$document = $this->app->getDocument();
$wa = $document->getWebAssetManager();
$wa->getRegistry()->addExtensionRegistryFile('mod_carouselticker');
$wa->useScript('mod_carouselticker.splidejs');
$wa->useScript('mod_carouselticker.splideautoscrolljs');
$wa->useScript('mod_carouselticker.splideconfigjs');
$wa->useStyle('mod_carouselticker.splidecss');
$wa->useStyle('mod_carouselticker.splidethemecss');

$document->addScriptOptions('mod_carouseltickerimages.vars', array());

$gap = $params->get('gapnumbervalue', '0');
$arrows = $params->get('arrowsradiovalue', '1');
$pagination = $params->get('paginationradiovalue', '1');
$perpagevalue = $params->get('perpagevalue', []);
$perpagevaluemedium = $params->get('perpagevaluemedium', []);
$perpagevaluelarge = $params->get('perpagevaluelarge', []);
$perpagevaluesmall = $params->get('perpagevaluesmall', []);
$speed = $params->get('speedvalue', '1');

$document->addScriptOptions('mod_carouselticker.vars', [
  'gap' => $gap,
  'arrows'=>$arrows,
  'pagination'=>$pagination,
  'perpagevalue'=>$perpagevalue,
  'perpagevaluemedium'=>$perpagevaluemedium,
  'perpagevaluelarge'=>$perpagevaluelarge,
  'perpagevaluesmall'=>$perpagevaluesmall,
  'speed'=>$speed,
]);
?>
<section class="splide" aria-label="Basic Structure Example">
  <div class="splide__track">
    <ul class="splide__list">
<?php
$carouseltickerimages = $params->get('carouseltickerimages', '');
for ($i = 0; $i <= count((array) $carouseltickerimages) - 1; $i++) {
    $image = $carouseltickerimages->{"carouseltickerimages" . $i};
    $layoutAttr = [
        'src' => $image->myimage->imagefile,
        'alt' => $image->myimage->alt_empty!="1"?$image->myimage->alt_text:false,
    ];
    ?>
    <li class="splide__slide">
      <?php echo LayoutHelper::render('joomla.html.image', $layoutAttr); ?>
    </li>
<?php
}
?>
    </ul>
  </div>
</section>
<?php echo $greeting; ?>
