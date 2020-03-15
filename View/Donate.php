<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.64.2/SPCA/css/donate.css" />
	<?php include "../Config/otherConfig.php" ?>
	<?php include '../Controller/fetchAllOrganization.php'; ?>
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
			<form name="process" id="ProcessForm" action="http://192.168.64.2/SPCA/Controller/donate_form.php" method="post">
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
							<input id="money_submit" placeholder="money" class="self_money" type="text" name="other_val" required />
						</div>

					</div>
					<div class="user_select">
						<h2>Designate my gift</h2>
						<label>I wish my gift to support</label>
						<select name="branch_select" required>
							<option >choose a shelter or branch to donate</option>
							<?php foreach($organization->organizationSelectList as $ele): ?>
							<option value=<?php echo $ele["name"]; ?>><?php echo $ele["name"]; ?></option>
							<?php endforeach; ?>
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
				<input type="submit" class="btn-primary" value="submit" onclick="deny_submit()" />
			</form>
			

			

			

		</div>


		<?php include "footer.php"; ?>
	</div>


</body>

</html>