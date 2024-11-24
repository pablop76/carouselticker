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
    'arrows' => $arrows,
    'pagination' => $pagination,
    'perpagevalue' => $perpagevalue,
    'perpagevaluemedium' => $perpagevaluemedium,
    'perpagevaluelarge' => $perpagevaluelarge,
    'perpagevaluesmall' => $perpagevaluesmall,
    'speed' => $speed,
]);
$carouseltickerimages = $params->get('carouseltickerimages', '');
?>
<section class="splide" aria-label="Basic Structure Example">
  <div class="splide__track">
    <ul class="splide__list">
<?php
foreach ($carouseltickerimages as $key => $carouselItem) {

    if (isset($carouselItem->urlimagevalue)) {
        $urlimagevalue = $carouselItem->urlimagevalue ?? null;
    }
    if (isset($carouselItem->urlimagetextvalue)) {
        $urlimagetextvalue = $carouselItem->urlimagetextvalue ?? null;
    }
    if (isset($carouselItem->linktarget)) {
      $linktarget = "_blank";
    }else{
      $linktarget = "_self";
    }
    if (isset($carouselItem->myimage)) {
        $imageFile = $carouselItem->myimage->imagefile ?? null;
        $altText = $carouselItem->myimage->alt_text ?? null;
        $altEmpty = $carouselItem->myimage->alt_empty ?? null;
    }
    $layoutAttr = [
        'src' => $imageFile,
        'alt' => $altEmpty != "1" ? $altText : false,
    ];
    ?>
  <li class="splide__slide">
  <div class="position-relative splide__slide__container">
    <?php echo LayoutHelper::render('joomla.html.image', $layoutAttr); ?>
  </div>
    <?php if (isset($urlimagevalue)) {?><a target="<?php echo $linktarget ?>" class="text-white position-absolute top-50 start-50 translate-middle" href="<?php echo $urlimagevalue ?>"><?php echo $urlimagetextvalue ?></a> <?php }?>
  </li>
<?php
}
?>
    </ul>
  </div>
</section>
