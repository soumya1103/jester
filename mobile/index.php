<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width,initial-scale=1"> -->
	<!-- <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" /> -->
	 <meta name="viewport" content="user-scalable=no, width=device-width" /> 
	<title>Jester: The Online Joke Recommender</title>

	<?php include 'imports.php'; ?>

	<?php $_POST["errormessagetype"] = "html" ?>
	<?php require_once("../includes/settings.php") ?>
	<?php require_once("../includes/autologout.php") ?>
	<?php require_once("../includes/constants.php") ?>
	<?php require("../includes/errormessages.php") ?>
	<?php require_once("../includes/generalfunctions.php") ?>
	<?php require_once("../includes/authentication.php") ?>
	<?php user_session() ?>
</head>
<body>
	<div data-role="page" data-theme="c">
		<div data-role="header" data-position="inline" data-theme="e">
              <h1><img src="jester_notext.gif" style="height:1em">Jester 4.0</h1>

			<div data-role="navbar">
				<?php include 'navbar.php'; ?>
			</div>
		</div>

		<div data-role="content" data-theme="c">

			<h2>Home</h2>

			Is there truth behind all humor, or is it the other way around?
			<br /><br />
			Jester uses a collaborative filtering algorithm called <a href="http://eigentaste.berkeley.edu/info.php">Eigentaste 5.0</a>
			to recommend jokes to you based on your ratings of previous jokes.
			<p>

   <!--
   <span class="important">Update:</span>
   </p>
   <p>
   Jester now uses Eigentaste 5.0, an algorithm that improves upon Eigentaste. In addition, user registration has been made optional.
   </p>
   <p>
   To learn more about Eigentaste, go <a href="http://eigentaste.berkeley.edu/info.php" target="_blank">here</a>.
   </p>
-->

<p>
	<?php
	if (!userLoggedIn())
	{
		?>
		<div id="indexnotice">
			<h3> Instructions </h3>
				<!-- <p>
				After telling us where you heard about Jester, click on the "Show Me Jokes!" button. You'll be given a set of <?php print (count($predictjokes) + $numseedjokes) ?> jokes to rate. After that, Jester will begin recommending jokes that have been personalized to your tastes.
				</p>
				<p>
				Please rate the jokes by clicking on the rating bar on the bottom on the screen. Click to the left of the rating bar if the joke makes you wince or to the right if it makes you laugh uncontrollably, and anywhere in between if appropriate. If you have seen or heard a joke before, please try to recall how funny it was to you the first time you heard it and rate it accordingly.
				</p>
				<p>
				<span class="important">Note:</span> Some of the jokes in our database may be considered by some to be offensive. If you are likely to be offended by mild ethnic, sexist, or religious jokes, please do not continue. Thank you.
				</p>
			-->

			<ul>
				<li>You'll be given a set of <?php print (count($predictjokes) + $numseedjokes) ?> jokes to rate. </li>
				<li>After that, Jester will begin recommending personalized jokes.</li>
				<li>Rate the jokes using the rating bar.</li>
				<li>If you've heard a joke before, try to recall your how funny it was when you first heard it.</li>
				</ul>
			</div>

			<div class="alert"><strong>Note: </strong>Some jokes may be considered offensive. 
					If you are offended by mild ethnic, sexist, or religious jokes, please don't continue.</div> 

			<p>
				<!-- data-ajax is false here so that jokes.php loads after processing.-->
				<form action="newuser.php" method="post" data-ajax=false>

					<div id="registrationinput">
						<p>
							<span class="columnleft"><strong> Where did you hear about Jester? (optional) </strong> </span>
							<span class="columnright"><input name="heardabout" type="text" maxlength="255" value="" /></span>
						</p>
					</div>
					<p>
						<input name="submit" type="submit" value="Show Me Jokes!" />
					</p>
				</form>
			</p>

			<?php
		}
		else
		{
			openConnection();

			$userid = $_SESSION["userid"];
			$loggedinphrase = getLoggedInPhrase($connection, $userid);

			print "<p>\nYou are currently <span class=\"important\">" . $loggedinphrase . "</span>.\n</p>";

			mysql_close($connection);
		} ?>

		<!--
		<p>
		<span class="important">Also check out:</span>
		</p>
		<p>
		<a href="http://opinion.berkeley.edu" target="_blank"><img src="../images/opinion_banner.jpg" style="border: 1px solid #9A6850; height:120px; width: 598px;"> <a href="http://dd.berkeley.edu" target="_blank"><img src="../images/dd_banner_square.jpg" style="border: 1px solid #9A6850;" /></a>
		</p>
		<p>
		Donation Dashboard uses Eigentaste to recommend a donation portfolio to you.
															</p>
		-->
			</div>
			<?php require_once("../includes/footer.php") ?>

		</div>
	</div>
</body>
</html>
