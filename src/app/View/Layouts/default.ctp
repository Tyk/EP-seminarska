<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php
echo $scripts_for_layout
?>
</head>
<body>

<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
<div id="header">
    <div style="text-align:center"><h1>CakeShop</h1></div>
</div>
<div id="menu">
    <div>
		<?php 
		if(true == AuthComponent::user('id')) 
		{
			echo $this->Html->link("Home", array('controller' => 'home', 'action' => 'index')); 
			echo "|";
			echo $this->Html->link("Cart[".$items_in_cart."]", array('controller' => 'cart', 'action' => 'index')); 
			echo "|";
			echo $this->Html->link("Orders", array('controller' => 'orders', 'action' => 'index'));						
			echo "|";
			echo $this->Html->link("Profile", array('controller' => 'users', 'action' => 'edit', AuthComponent::user('id')));						
			echo "|";
			echo $this->Html->link("Logout", array('controller' => 'users', 'action' => 'logout'));						
		}
		else
		{
			echo $this->Html->link("Login", array('controller' => 'users', 'action' => 'login')); 
			echo "|";
			echo $this->Html->link("Register", array('controller' => 'users', 'action' => 'add'));	
		}
		?>		
    </div>
</div>
<hr />
<?php echo $content_for_layout ?>
<hr />
<div id="footer">
	<?php echo $this->Html->link("Legal", array('adm'=>false, 'controller' => 'about', 'action' => 'legal')); 
	echo "|";
	echo $this->Html->link("Authors", array('adm'=>false, 'controller' => 'about', 'action' => 'authors'));	
	?>		
</div>

</body>
</html>
