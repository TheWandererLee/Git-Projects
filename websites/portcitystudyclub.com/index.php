<?php
ob_start("ob_gzhandler");
$page = $_REQUEST['page']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Port City Study Club</title>
<link rel="stylesheet" href="styles/main.css" />
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-389885-11']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body>

<div id="main">
    <div id="head">
   		<div>
        	<h1>Welcome to the Port City Study Club</h1>
        </div>
    </div>
    <?php
    	if (empty($page) || $page == 'home') { echo '<div id="body" style="height: 396px;">'; }
		else { echo '<div id="body">'; }
	?>
    	<ul class="nav">
        	<li><a href="?page=home">Home</a></li>
            <li><a href="?page=members">Members</a></li>
            <li><a href="?page=events">Events</a></li>
            <li><a href="?page=resources">Resources</a></li>
            <li><a href="?page=about-us">About Us</a></li>
        </ul>
    	<div id="content">
        	<?php switch($page) { case "members": ?>
            	<h2>Member Roster</h2>
		<table class="members"><tr><td>
			<div>
				<img src="images/members/colemanBurgess.jpg" alt="Coleman Burgess, DDS" width="75" height="112" />
				Coleman Burgess, DDS
				<br />1777 South 16th Street
				<br />Wilmington, NC 28401
				<br /><a href="mailto:drcburgess@aol.com">drcburgess@aol.com</a>
				<br />Office: (910) 762-1402
			</div>
			<div>
				<img src="images/members/casey.png" alt="Casey Burns" width="75" height="112" />
				<a href="http://www.burnsddsnc.com/" class="title">Casey Burns, DDS</a>
				<br />4914 Randall Parkway
				<br />Wilmington, NC 28403
				<br /><a href="mailto:cqburns23@yahoo.com">cqburns23@yahoo.com</a>
				<br />Office: (910) 799-9059
			</div>
			<div>
				<img src="images/members/phyllisCook.jpg" alt="Phyllis B. Cook, DDS (Director)" width="75" height="112" />
				<a href="http://www.phylliscook.com" class="title">Phyllis B. Cook, DDS (Director)</a>
				<br />7028 Wrightsville Avenue
				<br />Wilmington, NC 28403
				<br /><a href="mailto:phyllis@phylliscook.com">phyllis@phylliscook.com</a>
				<br />Office: (910) 256-8486
			</div>
			<div>
				<img src="images/members/normaCortez.png" alt="Norma Cortez" width="75" height="112" />
				<a href="http://www.pendersmiles.com/" class="title">Norma Cortez, DDS</a>
				<br />PO Box 874
				<br />Burgaw, NC 28425
				<br /><a href="mailto:norma.cortez.dds@gmail.com">norma.cortez.dds@gmail.com</a>
				<br />Office: (910) 259-2053
			</div>
			<div>
				<img src="images/members/stephenEdgerton.jpg" alt="Stephen Edgerton, DDS (Advisor)" width="75" height="112" />
				<a href="http://www.edgertonandfisher.com/" class="title">Stephen Edgerton, DDS (Advisor)</a>
				<br />1426 Commonwealth Drive
				<br />Wilmington, NC 28403
				<br /><a href="mailto:drsedge@hotmail.com">drsedge@hotmail.com</a>
				<br />Office: (910) 256-9230
			</div>
			<div>
				<img src="images/members/jenniferEdwards.jpg" alt="Jennifer Edwards" width="75" height="112" />
				Jennifer Edwards (Coordinator)
				<br />7028 Wrightsville Avenue
				<br />Wilmington, NC 28403 
				<br /><a href="mailto:ccperio@aol.com">ccperio@aol.com</a>
				<br />Office: (910) 256-8486
			</div>
			<div>
				<img src="images/members/davidFisher.jpg" alt="David Fisher, DDS" width="75" height="112" />
				<a href="http://www.edgertonandfisher.com/" class="title">David Fisher, DDS</a>
				<br />1426 Commonwealth Drive
				<br />Wilmington, NC 28403
				<br /><a href="mailto:fisher@edgertonandfisher.com">fisher@edgertonandfisher.com</a>
				<br />Office: (910) 256-9230
			</div>
			<div>
				<img src="images/members/williamGierie.jpg" alt="William Gierie, DDS (Advisor)" width="75" height="112" />
				<a href="http://www.gobraces.net/" class="title">William Gierie, DDS (Advisor)</a>
				<br />1650 Military Cutoff 
				<br />Wilmington, NC 28403
				<br /><a href="mailto:info@gobraces.net">info@gobraces.net</a>
				<br />Office: (910) 256-8590
			</div>
			<div>
				<img src="images/members/stephanieHackney.jpg" alt="Stephanie Hackney, DDS" width="75" height="112" />
				Stephanie Hackney, DDS
				<br />1337 Military Cutoff 
				<br />Wilmington, NC 28405
				<br /><a href="mailto:stephaniegraydds@hotmail.com">stephaniegraydds@hotmail.com</a>
				<br />Office: (910) 256-9292
			</div>
			<div>
				<img src="images/members/maryKing.jpg" alt="Mary Lynn King, DDS" width="75" height="112" />
				<a href="http://www.crownmysmile.com/" class="title">Mary Lynn King, DDS</a>
				<br />3317 Masonboro Loop Road # 140
				<br />Wilmington, NC 28405
				<br /><a href="mailto:marylynn@mac.com">marylynn@mac.com</a>
				<br />Office: (910) 791-7911
			</div>
			<div>
				<img src="images/members/jonLudwig.jpg" alt="Jon Ludwig" width="75" height="112" />
				<a href="http://www.teethbythebeach.com/" class="title">Jon Ludwig, DMD</a>
				<br />1014 B Grandiflora Drive
				<br />Leland, NC 28451
				<br /><a href="mailto:drludwig@teethbythebeach.com">drludwig@teethbythebeach.com</a>
				<br />Office: (910) 371-5965
			</div>
			<div>
				<img src="images/members/jasperMaritz.jpg" alt="Jasper Maritz, Absolute Dental Lab" width="75" height="112" />
				Jasper Maritz (Advisor), Absolute Dental Lab
				<br />3720 Shipyard Boulevard
				<br />Wilmington, NC  28403
				<br /><a href="mailto:jasper@absolutedentalservices.com">jasper@absolutedentalservices.com</a>
				<br />Office: (910) 790-2071
			</div>
			<div>
				<img src="images/members/maryRuth.png" alt="Mary Ruth" width="75" height="112" />
				<a href="http://www.marshalldental.com" class="title">Mary Ruth Marshall, DDS</a>
				<br />7643 Market Street
				<br />Wilmington, NC 28411
				<br /><a href="mailto:mmarshall@marshalldental.com">mmarshall@marshalldental.com</a>
				<br />Office: (910) 686-9802
			</div>
			<div>
				<img src="images/members/johnOverton.jpg" alt="John Overton, DDS" width="75" height="112" />
				<a href="http://www.overtondentistry.com" class="title">John Overton, DDS</a>
				<br />6200 Oleander Drive
				<br />Wilmington, NC 28403
				<br /><a href="mailto:overtonja@gmail.com">overtonja@gmail.com</a>
				<br />Office: (910) 350-0413
			</div>
			<div>
				<img src="images/members/leslie.jpg" alt="Leslie Plasky" width="75" height="112" />
				Leslie Plasky, DDS
				<br />4713 College Acres Drive
				<br />Wilmington, NC 28403
				<br /><a href="mailto:cplasky@hotmail.com">cplasky@hotmail.com</a>
				<br />Office: (910) 799-2238
			</div>
			<div>
				<img src="images/members/valeriePollock.png" alt="Valerie Pollock" width="75" height="112" />
				<a href="http://www.pendersmiles.com/" class="title">Valerie Pollock, DDS</a>
				<br />PO Box 874
				<br />Wilmington, NC 28403
				<br /><a href="mailto:coblevalerie@yahoo.com">coblevalerie@yahoo.com</a>
				<br />Office: (910) 259-2053
			</div>
			<div>
				<img src="images/members/ronRobinson.png" alt="Ron Robinson" width="75" height="112" />
				<a href="http://www.ronrobinsondds.com/" class="title">Ron Robinson, DDS</a>
				<br />2520 Delaney Ave
				<br />Wilmington, NC 28403
				<br /><a href="mailto:robinsondds@bizec.rr.com">robinsondds@bizec.rr.com</a>
				<br />Office: (910) 762-1772
			</div>
			<div>
				<img src="images/members/jamesSalling.jpg" alt="James Salling, DDS" width="75" height="112" />
				<a href="http://www.sallingtate.com/" class="title">James Salling, DDS</a>
				<br />2002 Eastwood Rd., Suite 105
				<br />Wilmington, NC 28403
				<br /><a href="mailto:amy@sallingtate.com">jill@sallingtate.com</a>
				<br />Office: (910) 256-9040
			</div>
			<div>
				<img src="images/members/williamSalling.png" alt="William Salling" width="75" height="112" />
				<a href="http://www.sallingtate.com/" class="title">William Salling, DDS</a>
				<br />2002 Eastwood Rd.
				<br />Wilmington, NC 28403
				<br /><a href="mailto:amy@sallingtate.com">amy@sallingtate.com</a>
				<br />Office: (910) 256-9040
			</div>
			<div>
				<img src="images/members/robertSchaffer.png" alt="Robert Schaffer" width="75" height="112" />
				Robert Schaffer
				<br />PO Box 929
				<br />Wrightsville Beach, NC 28480 
				<br /><a href="mailto:schafferdds@yahoo.com">schafferdds@yahoo.com</a>
				<br />Office: (910) 686-9802
			</div>
			<div>
				<img src="images/members/ryanStanley.jpg" alt="Ryan Stanley, DDC" width="75" height="112" />
				Ryan Stanley, DDS
				<br />6200 Oleander Drive
				<br />Wilmington, NC 28403
				<br /><a href="mailto:arstan@aol.com">arstan@aol.com</a>
				<br />Office: (910) 350-0441
			</div>
			<div>
				<img src="images/members/johnSweeney.jpg" alt="John Sweeney, DDS" width="75" height="112" />
				<a href="http://www.bluewavedentistry.com/" class="title">John Sweeney, DDS</a>
				<br />1300 S. Dickinson Drive
				<br />Leland, NC 28457
				<br /><a href="mailto:john@sweeneydentalcare.com">john@sweeneydentalcare.com</a>
				<br />Office: (910) 383-2615
			</div>
			<div>
				<img src="images/members/bryanTate.jpg" alt="Bryan Tate, DDS" width="75" height="112" />
				<a href="http://www.sallingtate.com/" class="title">Bryan Tate, DDS</a>
				<br />2002 Eastwood Road, Suite 105
				<br />Wilmington, NC  28403
				<br /><a href="mailto:tatedds@bizec.rr.com">tatedds@bizec.rr.com</a>
				<br />Office: (910) 256-9040
			</div>
			<div>
				<img src="images/members/chrisWard.jpg" alt="Chirstopher Ward" width="75" height="112" />
				Christopher Ward, DMD (Advisor)
				<br />6329 Oleander Drive, Suite 100
				<br />Wilmington, NC 28403
				<br /><a href="mailto:drchrisward@gmail.com">drchrisward@gmail.com</a>
				<br />Office: (910) 350-3508
			</div>
		</td></tr></table>
            <?php break; case "events": ?>
            	<h2>Calendar &amp; Upcoming Events</h2>
                <table class="calendar">
                <tr><td colspan="2"><h2>2012 Schedule</h2></td></tr>
                <tr><td>
               	  <h1>January 19</h1>
                    
                    <strong>Dental Implant Complications</strong><br /><br />
                    <strong>Location:</strong> TBD <br />
                    <strong>Time:</strong> 5:30 – 8 PM <br />
                    <strong>Speaker:</strong> Dr. Brian Mealy <br /><br />Light Dinner Provided (Doctors Only)
                  </h1></td><td>
                	<h1>JANUARY 20 </h1>
                   
                    <strong>Hygiene Study Club
Oral - Systemic Connection</strong><br /><br />
<strong>Speaker:</strong> Dr. Brian Mealy <br />
<strong>Time:</strong> 8am - 12pm <br />
<strong>Location:</strong> Cape Fear Country Club<br />
                    <br />(Doctors and Hygienists)
4 CE Hours
                </td></tr>
                <tr><td valign="top">
                	<h1>JANUARY 23-28</h1>
                    
                    <strong>Seattle Study Club Symposium<br />
                    "The Complete Clicinian"</strong><br /><br />

                    <br />
                    <strong>Location:</strong> Laguna Niguel, CA </td><td>
                	<h1>FEBRUARY  9</h1>
                    
                    <strong>Current Topics Hands On Techniques In 			Implant Overdenture And Implant Retained Partial Dentures
                    </strong><br /><br />
                    <strong>Speaker:</strong> Dr. Bob
Vogel. <br />
<strong>Location:</strong> TBD <br />
<strong>Time:</strong> 5:30 – 8 PM <br />(Light dinner served at 5:30)
                    
                    <br /><br />Light Dinner Provided
(Doctors and Assistants)
2 CE Hours
                </td></tr>
                <tr><td>
                	<h1>FEBRUARY 10</h1>
                    <strong>Advanced Topics with
Techniques in Implant Dentistry</strong><br /><br />
					ITI Study Club
                    <br />
                    <strong>Location:</strong> Dr. Phyllis Cook's office <br />
                    <strong>Time</strong>: 8AM - 12 PM <br /><br />(Doctors and Assistants) 
                </td><td valign="top">
                	<h1>MARCH 6</h1>
                    <strong>Hygiene Study Club
"Night of Pearls"</strong><br />
                    <br />
                    <strong>Speaker:</strong> Dr. Phyllis Cook <br />
                    <strong>Location:</strong> Dr. Cook's office <br />
                    <strong>Time:</strong> 5:30 - 8 PM <br />Light Dinner Provided<BR /><br />
					(Hygienists, Assistants) 2 CE Hours
                </td></tr>
                <tr><td>
                	<h1>MARCH 29</h1>
                    
                    <strong>Case Presentation Webinar with Dr. Glenn Kreiger</strong> <br /><br />
                    <strong>Location:</strong>Dr. Phyllis Cook’s office <br />
                    <strong>Time:</strong> 5:30 – 8 PM <br />Light Dinner Provided<br /><br />
					(Doctors Only) 2 CE Hours
                     
                    <br /></td><td valign="top">
                	<h1>APRIL 10</h1>
                    
                    <strong>Treatment Planning
Night<br />
                    </strong><br />
                    <strong>Location:</strong> Circa 1922 <br />
                    <strong>Time:</strong> 5:30 – 8 PM <br />Light dinner provided 
                    
                    <br /><br />(Doctors Only)
2 CE Hours 
                </td></tr>
                <tr><td>
                	<h1>MAY 12</h1>
                    
                    <strong>Final Dinner<br />
                    </strong><br />
                    Dinner provided
                    <br />
                    <strong>Time:</strong> 5:30 – 9 PM<br />
                    <br />(Doctors and Spouse or
Significant Others)
                    
                    
                </td><td>&nbsp;
                
                </td>
                	
                </td></tr>
                </table>
                
                <br /><br />
                <h2>Miscellaneous Events</h2>
                <br />This year we will be starting a
                <br /><h3 style="color: #FCC;">Implant Mini - Residency Program (Two Levels)</h3>
                <br /><em><strong>SYNERGISM</strong>: The joint action of agents when taken together increases the effectiveness of one or more of its properties. Successful implant dentistry is the result of a team effort. The best outcome is realized when each member of the implant team—surgeon, restorative dentist and laboratory technician—coordinates his/her efforts with the other members. This is the approach of the implant program sponsored by Dr Phyllis B Cook. Our team works synergistically with the restoring doctor and their office to deliver the highest quality of patient care. During this educational course, the restoring doctor and their office will work closely with Dr Phyllis Cook's team and learn how to treatment plan multiple patient situations encompassing a range of complexities. In this way, each "Synergy" group will customize the program to satisfy its specific educational needs.</em>
                <br /><br />Any dentist interested in either of these study clubs should contact <a href="http://www.phylliscook.com">PhyllisCook.com</a> for registration information.
            <?php break; case "resources": ?>
                <h2>Resources, Links, &amp; Affiliates</h2>
                <table class="resources">
                <tr><td>
                    <ul class="resources">
                        <li><a href="http://www.seattlestudyclub.com/">Seattle Study Club</a></li>
                        <li><a href="http://www.absolutedentalservices.com/">Absolute Dental Services</a></li>
                    </ul>
                </td><td>
                    <ul class="resources">
                    	<li><a href="http://www.bluewavedentistry.com/">Chad Biggerstaff: bluewavedentistry.com</a></li>
                        <li><a href="http://www.phylliscook.com/">Phyllis Cook: phylliscook.com</a></li>
                    	<li><a href="http://www.edgertonandfisher.com/">Steve Edgerton: edgertonandfisher.com</a></li>
                    	<li><a href="http://www.edgertonandfisher.com/">David Fisher: edgertonandfisher.com</a></li>
                        <li><a href="http://www.gobraces.net/">Bill Gierie: gobraces.net</a></li>
                        <li><a href="http://www.crownmysmile.com/">Mary Lynn King: crownmysmile.com</a></li>
                        <li><a href="http://www.teethbythebeach.com/">Jon Ludwig: teethbythebeach.com</a></li>
                        <li><a href="http://www.overtondentistry.com/">John Overton: overtondentistry.com</a></li>
                        <li><a href="http://www.pierpanfamilydentistry.com/">Monica Pierpan: pierpanfamilydentistry.com</a></li>
                        <li><a href="http://www.bluewavedentistry.com/">John Sweeney: bluewavedentistry.com</a></li>
                        <li><a href="http://www.sallingtate.com/">Bryan Tate: sallingtate.com</a></li>
                    </ul>
                </td></tr>
                </table>
                <h2>Sponsors</h2>
                <ul class="resources">
                	<li><a href="http://www.benco.com/">Benco</a></li>
                    <li><a href="http://www.straumann.us/">Straumann</a></li>
                    <li><a href="http://www.pattersondental.com/">Patterson Dental</a></li>
                    <li><a href="http://www.henryschein.com/">Henry Schein</a></li>
                </ul>
            <?php break; case "about-us": ?>
            	<h2>About Us</h2>
                <p>I would like to make you aware of the Port City Study Club. Many restorative dentists and specialists have expressed a desire for a study club which involves comprehensive, interdisciplinary treatment planning rather than one particular discipline (implants, occlusion, etc). Total Case Management is the focus of the group, and our goal is to elevate the level of dentistry for every practitioner involved. We learn with and from our peers in a relaxed group format that is both professional and educational. We had a very successful past year and have truly created a base for our "university without walls". The Port Study Club is a local affiliate of Seattle Study Club (www.seattlestudyclub.com), a leader in the field of dentist continuing education. For our 2010 - 2011 academic year our curriculum will be strengthening your core therefore giving your practice greater stability and power with a focus on Communication.</p>
                <p>A key byproduct of our meetings is the establishment of a safe environment where we can confidentially discuss our challenges, successes and failures in order to benefit from the experiences, knowledge and insights within our group without fear of condemnation or attack. It has been most gratifying to see this process start, and it will steadily progress until we are all comfortable enough to bring our failures and questions before the group. This objective has been made possible by the careful selection of member dentist to include only those with high ethical standards and personalities conducive to such an environment. We will keep it that way.</p>
                <p>We will, of course, have our own treatment planning sessions involving multiple disciplines where some of our members will be presenting cases for discussion. Our affiliation with Seattle Study Club allows us to have the quality of speakers we have available to our small group at an affordable cost.</p>
                <br /><br />
                <h2>Goals of our study club are to <u>promote</u> and <u>advance</u></h2>
                <ol>
                	<li>Interdisciplinary treatment planning as the foundation of ideal, comprehensive care for patients in the US.</li>
                    <li>Peer-based, ongoing learning in the context of the Seattle Study Club model as the most efficient and effective way for dentists in the field to enhance their understanding of basic and advanced techniques and technologies, and to improve their ability to treatment plan and treat complex cases.</li>
                    <li>Commitment on the part of dentists to achieving their full professional potential in becoming "complete clinicians".</li>
                    <li>Enthusiasm and passion in dentists for the profession of dentistry, and a true understanding of the immense benefits dentistry can provide patients.</li>
                    <li>Professional camaraderie and sharing of knowledge between and among dentists.</li>
                    <li>A "university without walls" inside the study club, such that clinicians have ready access to leading dental authorities in a variety of fields, through presentations, journals, participation in Seattle Study Club web sessions and lectures and workshops at the yearly Seattle Study Club National Symposium.</li>
				</ol>
                <br /><br /><em>If you are interested in joining and expanding your knowledge, please contact Anita, Port City Study Club Coordinator, at 910-256-8486. We look forward to hearing from you!</em>
            <?php break; default: ?>
                <div class="rightContent"><img src="images/main1.jpg" alt="Port City: Wilmington, NC" width="432" height="465" /></div>
                <h2 align="center">Welcome to the <a href="#">Port City Study Club</a><br />of Wilmington, NC.</h2>
                <br /><br />We hope you will enjoy this valuable source of information, as it allows you to address any and all of your dental needs in the great Port City of Wilmington, NC.
                <br /><br />Our advisory board consists of dental specialists and general dentists to provide diversity in educational curriculum.
                <br /><br />For members, and those wishing to join, there are meeting lists, including topics and speakers, upcoming events, and contacts.
                <br /><br />For patients, and potential patients, we also have lists of dentists and their specialties, as well as links to dental resources.
            <?php } ?>
        </div>
    </div>
    	<?php if ($page == 'members') { echo '<div id="foot" style="background: url(\'images/footer.png\'); height: 53px;">'; } else {
		echo '<div id="foot" style="background: url(\'images/footerBlock.png\'); height: 158px;">'; ?>
		<div class="footerBlock">
			<img src="images/members/phyllisCook.jpg" alt="Phyllis B. Cook, DDS (Director)" />
			<h3><a href="#">Phyllis B. Cook, DDS (Director)</a></h3>
			<br />7028 Wrightsville Avenue
			<br />Wilmington, NC 28403
			<br /><a href="mailto:phyllis@phylliscook.com">phyllis@phylliscook.com</a>
			<br /><a href="#" class="moreInfo">- More information</a>
		</div>
        <?php } ?>
        <div class="underFoot"><a href="http://www.13willows.com/">Website Development</a> by 13 Willows<br /><a href="javascript:toggleBg();" class="toggleAnimations">Toggle Animations (for slower CPU's)</a></div>
    </div>
</div>

</body>
</html>