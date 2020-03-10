<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.64.2/SPCA/css/donate.css" />
	<?php include "../Config/otherConfig.php" ?>
	<script>
		var jq = $.noConflict();
		let money = 0;
		let deny_submit = function(e) {


			if (money != 0) {

				return true
			}
			return false
		}
		jq(document).ready(function() {
			jq("[id=donate-block]").click(function() {

				jq("[id=donate-block]").removeClass("momney_hover")

				jq(this).toggleClass("momney_hover")
			})
			jq("[id=money_opt]").click(function() {
				jq("#money_submit").css("opacity", "0")
				jq("[id=money_opt]").removeClass("momney_hover")
				jq(this).toggleClass("momney_hover")

				if (jq(this).text() === "Others") {

					jq("#money_submit").css("opacity", "100")
				} else {
					money = jq(this).text().slice(1)
					jq("#money_submit").val(money)
				}

			})

		});
	</script>

</head>

<body>

	<div class="donate_header">
		<div class="donate_header_1">
		<span class="donate-header-t1">
			<a href="home.php" style="text-decoration:none;color:white">ONTARIOSPCA</a>
		</span>
		<span class="donate-header-t2">
			<a href="home.php" style="text-decoration:none;color:white">AND HUMANE SOCIETY</a>
		</span>
		</div>
		<div class="donor"><a href="Donor.php" style="text-decoration:none;color:white">Our Donor</a></div>
	</div>
	<div class="donate-content">
		<div class="column__row">
			<div class="donation-preamble">
				<h2 class="donate_header2">Your gift changes animals' lives.</h2>
				<p>Your compassion and generosity provides urgently needed care and shelter for thousands of animals suffering
					from injury, abuse or neglect each year in Ontario.</p>
				<p class="callout-text">Choose an option below to get started.</p>

				<div class="donation-preamble__donation-type-choice">
					<!-- BEGIN GIVING OPTION 1 -->
					<div class="donate-block" id="donate-block">
						<i class="fas fa-users"></i>
						<span>One time donate</span>
					</div>
					<div class="donate-block" id="donate-block">
						<i class="fas fa-users"></i>
						<span>Monthly donate</span>
					</div>
					<div class="donate-block" id="donate-block">

						<i class="fas fa-gift "></i>
						<span>In memory or in honour</span>
					</div>

				</div>

			</div>
		</div>
		<div class="column__row">
			<form name="process" id="ProcessForm" action="Controller/donate_form.php" method="post">
				<fieldset>
					<div class="select_money">
						<h5>Select Gift Amount (CDN funds):</h5>
						<div class="money_options">
							<div id="money_opt" value="18" class="money-option">$18</div>
							<div id="money_opt" value="36" class="money-option">$36
							</div>
							<div id="money_opt" value="72" class="money-option">$72
							</div>
							<div id="money_opt" value="100" class="money-option">$100
							</div>
							<div id="money_opt" value="250" class="money-option">$250</div>
							<div id="money_opt" value="500" class="money-option">$500</div>
							<div id="money_opt" value="1000" class="money-option">$1000</div>
							<div id="money_opt" value="other" class="money-option">Others</div>
							<input id="money_submit" placeholder="money" class="self_money" type="text" name="other_val" />
						</div>

					</div>
					<div class="user_select">
						<h2>Designate my gift</h2>
						<label>I wish my gift to support</label>
						<select required>
							<option>choose a shelter or branch to donate</option>
							<option>1</option>
						</select>
						<h3 class="dor_title">Donor Information</h3>
						<div class="dor_item">
							<label>First Name</label>
							<input type="text" name="firstname" required="required" />
						</div>
						<div class="dor_item">
							<label>Last Name</label>
							<input type="text" name="lastname" />
						</div>
						<div class="dor_item">
							<label>Donate Date</label>
							<input type="date" name="date" required="required" />
						</div>

						<p> <input type="checkbox" />Yes, I would like to receive communication from this organization. You can manage
							your email preferences and opt-ins at any time. We want the information you receive
							from us to remain of interest to you!
						</p>
					</div>
				</fieldset>
				<input type="submit" value="submit" onclick="deny_submit()" />
			</form>
			<div class="payment_select">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Credit Card</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bank Information</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Pay Pal</a>
					</li>

				</ul>
			</div>

			<div class="tab-content">
				<div class="tab-pane active" id="home" class="credit" role="tabpanel" aria-labelledby="home-tab">
					<h3>Credit Card Information:</h3>
					<span>Credit Card Type:</span>

					<label>Credit Card</label>
					<input type="text" />
					<img />
				</div>
				<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
				<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
				<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
			</div>

			<script>
				jq(function() {
					jq('#myTab li:last-child a').tab('show')
				})
			</script>

		</div>


		<?php include "footer.php"; ?>
	</div>


</body>

</html>