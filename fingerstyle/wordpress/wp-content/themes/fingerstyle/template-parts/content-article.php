<div class="blog-container d-flex flex-column align-items-center">
                <h1 class="blog-title headline"><?= the_title()?></h1>
                <div class="blog-hero col-sm-5">
                    <img src="./assets/asset4.png" class="img-fluid" />
                </div>
                <div class="meta-data"><span>pushlished on <?php the_date()?></span><span class = 'date'></span><span class = 'tag'></span></div>
                <?php the_content();
             
		the_content();
       
        the_excerpt();
                the_tags('<span class="tag"><i class="fa fa-tag"></i>)','</span><span class="tag"><i class="fa fa-tag"></i>','</span>');
                
?>


            </div>
            
            <?php comments_template(); ?>
          

</div>

            