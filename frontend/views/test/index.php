<?php
/* @var $this yii\web\View */
use frontend\models\Category;
use yii\helpers\Html;
?>

<?php
    foreach ($datacategory as $dataCategories) {  
    	//echo "____________________________________".$dataCategories->category_id."<br>";
    	//echo "____________________________________".Html::encode($dataCategories->category_id);
    	//echo Html::encode($category->category_name); 
?>
	<ul class="category-list">	
		<li class="category-item">
			<a href="job-list.html">
				<div class="category-icon"><img src="<?php Yii::$app->request->baseUrl; ?>/images/icon/1.png" alt="images" class="img-responsive"></div>
				<span class="category-title"><?php echo Html::encode($dataCategories->category_name); ?></span>
				<span class="category-quantity">(1298)</span>
			</a>
		</li><!-- category-item -->
	</ul>	

<?php } ?>




			


