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

//przekazanie zmiennych do javascript
// Pass the suffix to add down to js
$document->addScriptOptions('mod_carouseltickerimages.vars', array());

$gap = $params->get('gapnumbervalue', '0');
$arrows = $params->get('arrowsradiovalue', '1');
$pagination = $params->get('paginationradiovalue', '1');
$perpage = $params->get('imagesperpagevalue', '5');
$perpagemedium = $params->get('imagesperpagevaluemedium', '4');
$perpagelarge = $params->get('imagesperpagevaluelarge', '3');
$perpagesmall = $params->get('imagesperpagevaluesmall', '1');
$ratioimagevalue=$params->get('ratioimagevalue', '2');
$ratioimagevaluemedium = $params->get('ratioimagevaluemedium', '2');
$ratioimagevaluelarge = $params->get('ratioimagevaluelarge', '4');
$ratioimagevaluesmall = $params->get('ratioimagevaluesmall', '6');
$speed = $params->get('speedvalue', '1');

$document->addScriptOptions('mod_carouselticker.vars', [
  'gap' => $gap,
  'arrows'=>$arrows,
  'pagination'=>$pagination,
  'perpage'=>$perpage,
  'perpagemedium'=>$perpagemedium,
  'perpagelarge'=>$perpagelarge,
  'perpagesmall'=>$perpagesmall,
  'speed'=>$speed,
  'ratioimagevalue'=>$ratioimagevalue,
  'ratioimagevaluemedium'=>$ratioimagevaluemedium,
  'ratioimagevaluelarge'=>$ratioimagevaluelarge,
  'ratioimagevaluesmall'=>$ratioimagevaluesmall,
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
