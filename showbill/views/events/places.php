<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h3>Latest Features</h3>
    </div>
</div>

<?php 
	$total = count($events);
	$counter = 0;
	foreach ($places as $key => $place):
	if($counter == 0 || $counter%4 == 0) echo "<div class='row text-center'>";
?>

    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <?= Html::img("@web/images/places/{$place['image']}", ["alt"=>'img', 'class'=>'img_pale']);?>
            <div class="caption">
                <h3><?php echo $place['title']; ?></h3>
                <p><?php echo $place['desc']; ?></p>
                <p>
                	<a href="<?= Url::to(['place/view','id'=>$place['id']]); ?>" class="btn btn-primary">Watch events</a>
                </p>
            </div>
        </div>
    </div>
<?php 
	if(($counter + 1)%4 == 0 || ($counter + 1) == $total) echo "</div>"; 
	$counter++;
	endforeach;
?>
<?php
	echo \yii\widgets\LinkPager::widget([
	    'pagination' => $pages,
	]);
?>
