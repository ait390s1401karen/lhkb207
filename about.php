<?php
	// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();
	}
?>

<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>	

<h2>About The Humane Society Thrift Store</h2>

<div id="bodyContainer">
<p>The Humane Society of Fairfax County depends upon the proceeds of our thrift store to assist with the substantial and ever-increasing costs of medical care for our rescued animals. Additionally, this funding helps support the general feeding and care of the animals while they await their new loving families.

When you are in the mood for Spring cleaning or if you have occasion to go through that attic or storage room, please keep us in mind and donate your well-cared for wares. Household items, toys, books and [clean] clothing that can be sold without repair are greatly appreciated. And when you drop off your donations, take a moment to browse the thrift store for fine collectibles, antiques, or other treasures.

We hope to see you soon at our shop!</p>
</div>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
