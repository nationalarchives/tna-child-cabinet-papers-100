<?php
/*
Template Name: Cabinet documents
*/
get_header();
get_template_part( 'breadcrumb' ); ?>
<main>
	<section class="container">
		<h1><?php the_title() ?></h1>
		<div class="document-viewer">
			<a href="http://www.nationalarchives.gov.uk/wp-content/uploads/2015/10/feature-agincourt-Henry-V-seal.jpg" title="feature-agincourt-Henry-V-seal" target="_blank"><div style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/feature-agincourt-Henry-V-seal.jpg); background-repeat: no-repeat" class="document-full"></div>

			</a>
			<div class="overlay">
				<a class="button align-right" href="#">View full image</a>
			</div>
		</div>
		<p>In 1415, after nearly 25 years of delicate peace between England and France, King Henry V revived what is now known as the Hundred Years War (1337-1453). He wanted to reassert English claims to the crown of France and sovereignty over lands within France – as his great grandfather Edward III had done.</p>

		<p>The timing was ideal: France was racked by civil war and military action against an external enemy would help cement Henry’s authority as king, as well as strengthen the loyalty of his subjects.</p>

		<p>On 15 April, the king met with leading noblemen and prelates, and proclaimed his intention to lead an army to France.</p>
	</section>
	<section class="container explore-records">
		<h2>Explore the records</h2>
		<span id="slider-prev"></span>
		<span id="slider-next"></span>

			<div class="bxslider">
				<a href="">
					<div class="document-slide-thumb" style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/agincourt-charles-vi-great-seal-400x180.jpg)"></div>
					<div><p>Great Seal of Charles VI (front side)</p></div>
				</a>
				<a href="">
					<div class="document-slide-thumb" style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/Parliamentary-rolls-400x180.jpg)"></div>
					<div><p>Parliamentary rolls</p></div>
				</a>
				<a href="">
					<div class="document-slide-thumb" style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/agincourt-Henry-V-seal-400x180.jpg)"></div>
					<div><p>‘Golden’ Seal of Henry V (reverse side)</p></div>
				</a>
				<a href="">
					<div class="document-slide-thumb" style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/agincourt-Henry-V-seal-front-400x180.jpg)"></div>
					<div><p>‘Golden’ Seal of Henry V (front side)</p></div>
				</a>
				<a href="">
					<div class="document-slide-thumb" style="background-image: url(http://livelb.nationalarchives.gov.uk/wp-content/uploads/2015/10/Sick-rolls-of-invalided-soldiers-400x180.jpg)"></div>
					<div><p>Sick roll</p></div>
				</a>
			</div>
	</section>
	<section class="container">
		<a class="button align-right" href="#">Return to the Battle of Agincourt</a>
	</section>
</main>
<?php get_footer(); ?>
