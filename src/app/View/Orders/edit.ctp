<h1>Spremeni stanje naročila <?php echo $id ?></h1>

<?php
if(AuthComponent::user('role') == "salesman"){
	if ($selected_order['Order']['state'] == "ODDANO") {
		echo "ZAVRNI | V OBDELAVI";
	}
	if ($selected_order['Order']['state'] == "PREKLICI") {
		echo "DELETE";
	}
	if ($selected_order['Order']['state'] == "V OBDELAVI") {
		echo "POSLANO";
	}
	if ($selected_order['Order']['state'] == "POSLANO") {
		echo "ZAPISI V BAZO";
	}
	if ($selected_order['Order']['state'] == "ZAVRNI") {
		echo "ZAVRNJENO";
	}
}
else if(AuthComponent::user('role') == "client") {
	if ($selected_order['Order']['state'] == "ODDANO") {
		echo "PREKLICI";
	}
}
?>
