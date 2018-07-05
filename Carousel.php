//Bootstrap carousel for custom post type its just my work part you need to change it as per your requirement

<div class="row">
<?php
$args = array (
'post_type' => array( 'coustom_post_name' ),
'post_status' => array( 'publish' ),
'posts_per_page' => '-1'
);

// The Query
$query = new WP_Query( $args );
// The Loop

if ( $query->have_posts() ) {
$number_of_slidess = 0;?>
<div id="myCarousel" class="carousel slide productslider" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<?php while ( $query->have_posts() ) { $query->the_post(); 
if($number_of_slidess == 0){
$indicator_active_classs = "active";
}else{
$indicator_active_classs = "";
}
?>
<li data-target="#myCarousel" data-slide-to="<?php echo $number_of_slidess; ?>" class="<?php echo $indicator_active_classs; ?>"></li>
<?php 
$number_of_slidess++; 
} ?>
</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner">
<?php 
$i = 0;
while ( $query->have_posts() ) { $query->the_post(); 
$i++;
if($i == 1){
$active_classs = "active";
}else{
$active_classs = "";
} 
?>
<div class="item <?php echo $active_classs;?>">
<?php the_content(); ?>
<img src=" <?php the_post_thumbnail_url( 'full' ); ?>">
</div>
<?php } 
// Restore original Post Data
wp_reset_postdata();?>

<?php
}?>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>