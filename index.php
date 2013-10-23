<?php
	//session_start();
	
	//error checking
	if (!empty($_POST)) {
	
		$error = array();
	
		//First Name
		if (empty($_POST['name'])) {
			$error['name'] = 'Please enter your name.';
		}
		else if (strlen($_POST['name']) > 50) {
			$error['name'] = 'Name input must be less than 50 characters.';
		}
	
		//Email
		if (empty($_POST['email'])) {
			$error['email'] = 'Please enter a valid email address.';
		}
		else if (strlen($_POST['email']) < 5) {
			$error['email'] = 'Your email is too short (5 min).';
		}
		else if (strlen($_POST['email']) > 100) {
			$error['email'] = 'Your email is too long (100 max).';
		}
	
		//NUMBER
		if ((empty($_POST['number'])) || (strlen($_POST['number']) < 0)) {
			$error['number'] = 'Please enter a valid head count.';
		}
	
		//Send email message after complete form submitted
		if (empty($error)){
				$to_email = 'rsvp@danandjen.us';
				$subject = 'RSVP from:'.$_POST['name']."\r\n";
				$body = 'Name: '.$_POST['name']."\r\n";
				$body .= 'Email: '.$_POST['email']."\r\n";
				$body .= 'Number Attending: '.$_POST['number']."\r\n";
				$body .= 'Message: '.$_POST['message']."\r\n";
	
				$headers = 'From: rsvp@danandjen.us' . "\r\n" .
						    'Reply-To: rsvp@danandjen.us' . "\r\n" .
						    'X-Mailer: PHP/' . phpversion();
	
				mail($to_email, $subject, $body, $headers);
	
				header('location:contact-confirm.php');
		}
	}
	
	//exit;
	
	include('header.php');
?>

        <section class="content_block" id="our_story">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
			<div class="content welcome">
				<h3>WELCOME</h3>
				<p>We can't wait to share our big day with y'all! We are so blessed to have the greatest friends and family! Hope to see you <span class="em_text">November 4th</span>. Until then, please enjoy exploring our site. Thanks for stopping by and don't forget to RSVP!</p>
			</div>
            <div class="content column2">
                <div class="column">
					<img src="img/jen.jpg" alt="Jen Avery">
					<h3>THE BRIDE</h3>
					<p>Born and raised in Greenville, SC. Jen is a nanny who is obsessed with chocolate, travel, yoga and Clemson Football. Most of all she enjoys adventuring with Dan.</p>
				</div>
                <div class="column">
					<img src="img/dan.jpg" alt="Dan Robert">
					<h3>THE GROOM</h3>
					<p>Born and raised outside of Detroit, MI. Dan is a coffee-addicted Web developer who loves code, design, surfing and playing outside. Most of all he enjoys adventuring with Jen.</p>
				</div>
            </div>
            <div class="content">
                <h3>HOW WE MET</h3>
                <p>Dan and Jen began talking by accident, really. In late 2008 Jen was living in Encinitas, while Dan was living in Pacific Beach (brah!). Jen moved away to live in Europe just as Dan moved up to Encinitas where he fell into the same group of friends as Jen, just missing her.</p>
				<p>A couple of years later Dan mistook Jen (who was then living in South Carolina) for a high school friend on Facebook and sent her a friend request.  She accepted, noticing that they had so many mutual friends in California. A short time after that, without any further contact, Dan posted his voice-over demo on Facebook. Jen was impressed by it and this got the two talking.</p>
				<p>After several months of chatting, emailing and trips between South Carolina and California, they decided to take a chance to see where things would go. Jen made the move back to San Diego where she moved in with a couple of mutual friends. Right next door to Dan.</p>
				<p>On their two-year anniversary, Dan proposed. Things couldn't have worked out any better … now they're gettin' hitched!</p>
            </div>    
			<div class="section_breaker">&nbsp;</div>
        </section>

        <section class="image_block banner_one"><h2>WEDDING DETAILS</h2></section>

        <section class="content_block" id="info">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
            <div class="content column2 no_pad_bottom">
                <div class="column">
                    <h3>CEREMONY &amp; RECEPTION</h3>
					<ul>
						<li class="em_text">November 4th, 2013 at 4:00pm</li>
						<li>San Diego Botanic Garden</li>
						<li>Cocktail hour &amp; dinner reception immediately following</li>
						<li class="footnote">*Ceremony and reception will both be held outdoors. Bring sleeves for cooler evening temperatures.</li>
					</ul>
                    <h3>DIRECTIONS</h3>
                    <p>From I-5 (North or South) take the Encinitas Blvd exit EAST. Stay on Encinits Blvd for 0.4 miles and then turn LEFT on Quail Gardens Dr. In 0.4 miles, the Botanic Garden entrance will be on the left.</p>
                    <ul class="venue_address">
                        <li>230 Quail Gardens Dr.</li>
                        <li>Encinitas, CA 92024</li>
                        <li>(760) 436-3036</li>
                    </ul>
                </div>
				
                <div class="column map">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?msa=0&amp;msid=214070405663669517593.0004e45aa618fd387160f&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=33.052001,-117.279192&amp;spn=0.002698,0.004828&amp;z=15&amp;output=embed"></iframe>
                </div>
            </div>
			<div class="section_breaker">&nbsp;</div>
        </section>

        <section class="image_block banner_two"><h2>LOCATION</h2></section>

        <section class="content_block" id="location">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
            <div class="content column2 no_pad_bottom">
                <div class="column">
                    <h3>TRAVEL</h3>
                    <p>The closest airport is <span class="em_text">San Diego International Airport</span>, located in downtown San Diego. Encinitas is approximately 25 minutes North of the airport.</p> 
					<p>Other nearby airports include John Wayne Airport in Orange County and Los Angeles International Airport.</p>
					<div class="map">
						<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?msa=0&amp;msid=214070405663669517593.0004e56e78ae0248e14af&amp;ie=UTF8&amp;ll=33.337337,-117.802787&amp;spn=1.210051,1.210737&amp;t=m&amp;z=7&amp;output=embed"></iframe>
					</div>
				</div>
				<div class="column">
                    <h3>LODGING</h3>
                    <p>For our out of town guests, below is a list of nearby hotels:</p>
                    <ul>
						<li class="price_group"><span>$$</span></li>
                        <li><a href="http://www.hojo.com/hotels/california/encinitas/howard-johnson-encinitas-near-legoland-area/hotel-overview" target="_blank">Howard Johnson - Encinitas</a> (1.7 miles from wedding venue)</li>
                        <li><a href="http://www.econolodgeencinitas.net/" target="_blank">Econo Lodge - Encinitas</a> (2.5 miles to wedding venue)</li>
                    </ul>

                    <ul>
						<li class="price_group"><span>$$$</span></li>
                        <li><a href="http://book.bestwestern.com/bestwestern/US/CA/Encinitas-hotels/BEST-WESTERN-Encinitas-Inn---Suites-at-Moonlight-Beach/Hotel-Overview.do?propertyCode=05592" target="_blank">Best Western - Encinitas</a> (1.7 miles from wedding venue)</li>
                        <li><a href="http://www.ihg.com/holidayinnexpress/hotels/us/en/cardiff-by-the-sea/sancc/hoteldetail" target="_blank">Holiday Inn Express - Cardiff-by-the-Sea</a> (3.8 miles from wedding venue)</li>
                        <li><a href="http://hamptoninncarlsbad.com/" target="_blank">Hampton Inn - Carlsbad</a> (6.9 miles from wedding venue)</li>
                        <li><a href="http://www.marriott.com/hotels/travel/sancs-courtyard-san-diego-carlsbad-mcclellan-palomar-airport/" target="_blank">Courtyard Marriott - Carlsbad</a> (6.9 miles from wedding venue)</li>
                        <li><a href="http://hiltongardeninn3.hilton.com/en/hotels/california/hilton-garden-inn-carlsbad-beach-SANCHGI/index.html" target="_blank">Hilton - Carlsbad</a> (8.4 miles from wedding venue)</li>
                        <li><a href="http://www.sheratoncarlsbad.com/" target="_blank">Sheraton - Carlsbad</a> (8.5 miles from wedding venue)</li>
                    </ul>

                    <ul>
						<li class="price_group"><span>$$$$</span></li>
                        <li><a href="http://www.lacosta.com/" target="_blank">La Costa Resort - Carlsbad</a> (3.6 miles from wedding venue)</li>
                        <li><a href="http://parkaviara.hyatt.com/en/hotel/home.html" target="_blank">Hyatt - Aviara Carlsbad</a> (6.4 miles from wedding venue)</li>
                    </ul>
                    <p>If none of these suit your needs, the closest towns to the wedding venue are <a href="http://www.tripadvisor.com/Tourism-g32355-Encinitas_California-Vacations.html" target="_blank">Encinitas</a>, <a href="http://www.tripadvisor.com/Tourism-g32171-Carlsbad_California-Vacations.html" target="_blank">Carlsbad</a> and <a href="http://www.tripadvisor.com/Tourism-g33101-Solana_Beach_California-Vacations.html" target="_blank">Solana Beach</a></p>
                </div>
            </div>
			<div class="section_breaker">&nbsp;</div>
        </section>

        <section class="image_block banner_three"><h2>PHOTOS</h2></section>

        <section class="content_block" id="photos">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
            <div class="content">
				<h3>Engagement Photo Shoot</h3>
				<p>All photos were taken by <a href="http://www.bmillerweddings.com/" target="_blank">Bryan N Miller Photography</a>.</p>
				<div class="flexible_video_wrap">
					<iframe src="//www.youtube.com/embed/VYJDWij3ZQg" frameborder="0" allowfullscreen></iframe>
				</div>
            </div>
			<div class="section_breaker">&nbsp;</div>
        </section>

        <section class="image_block banner_four"><h2>REGISTRY</h2></section>

        <section class="content_block" id="registry">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
			<div class="content">
                <h3>GIFTS</h3>
				<p>Click on the logos below to view our registries.</p>
			</div>
			<div class="content column3">
				<div class="column brand_logo anthrolopogie">
					<a href="https://www.anthropologie.com/anthro/wishlist/wishlist.jsp?_DARGS=/anthro/wishlist/gift_list_search_results_vwr.jsp_A&_DAV=gl_PHL1884956057&_dynSessConf=3523337116963154710" title="Anthropologie" target="_blank">
					<img src="img/anthropologie.svg" alt="Anthropologie Logo" />
					</a>
				</div>
				<div class="column brand_logo bed_bath_beyond">
					<a href="http://www.bedbathandbeyond.com/store/giftregistry/view_registry_guest.jsp?pwsToken=&eventType=Wedding&registryId=13672721&pwsurl=" title="Bed Bath and Beyond" target="_blank">
						<img src="img/bed_bath_beyond.svg" alt="Bed Bath and Beyond Logo" />
					</a>
				</div>
				<div class="column brand_logo target">
					<a href="http://www.target.com/GiftRegistrySearchViewCmd?registryType=WD&jsRequest=true&catalogId=10051&status=completePage&cumulativeTime=-1&listId=MDSwrpziGBvZ4XqhVHCRjg&noOfPings=&registryFirstName=jennifer&langId=-1&segmentGrpName=J&storeId=10151&registryLastName=avery" title="Target" target="_blank">
						<img src="img/target.svg" alt="Target Logo" />
					</a>
				</div>
			</div>
			<div class="section_breaker">&nbsp;</div>
        </section>

        <section class="image_block banner_five"><h2>RSVP</h2></section>

        <section class="content_block" id="rsvp">
			<div class="tiny_hearts"><img src="img/tiny_hearts.svg" alt="Tiny Hearts"></div>
            <div class="content">
				<h3>Join Us!</h3>
				<p>Please RSVP via the form below. <em>(* Required Fields)</em></p>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
					<p>
						<label for="name">Name *</label>
						<input type="text" name="name" placeholder="Willy Wonka" required>
					</p>
					<p>
						<label for="email">Email Address *</label>
					<input type="email" name="email"  placeholder="willy@wonka.com" required>
					</p>
					<p>
						<label for="number">Number Attending *</label>
						<input type="number" name="number" required>
					</p>
					<!--<p>Dietary Restrictions
						<label class="checklist" for="none">None <input type="checkbox" name="none" checked="checked"></label>
						<label class="checklist" for="vegetarian">Vegetarian <input type="checkbox" name="vegetarian"></label>
						<label class="checklist" for="vegan">Vegan <input type="checkbox" name="vegan"></label>
						<label class="checklist" for="gluten-free">Gluten-Free <input type="checkbox" name="gluten-free"></label>
						<label class="checklist" for="vegan">Vegan <input type="checkbox" name="vegan"></label>
					</p>-->
					<p>
						<label for="diet">Dietary Restrictions</label>
						<span class="sub_label">None </span><input type="radio" name="diet" value="none">
						<span class="sub_label">Vegetarian </span><input type="radio" name="diet" value="vegetarian">
						<span class="sub_label">Vegan </span><input type="radio" name="diet" value="vegan">
						<span class="sub_label">Gluten-Free </span><input type="radio" name="diet" value="gluten-free">
						<span class="sub_label">All of the above </span><input type="radio" name="diet" value="all">
						<span class="sub_label">Other (specify in message box) </span><input type="radio" name="diet" value="other">
					</p>
					<p>
						<label for="message">Message</label>
						<textarea name="message"></textarea>
					</p>
					<p>
						<input type="submit">
					</p>
				</form>
            </div>
			<div class="section_breaker">&nbsp;</div>
        </section>

<?php include('footer.php'); ?>
