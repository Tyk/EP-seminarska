<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<?php
echo $this->Html->css("common");
echo $this->Html->css("layout_default");
echo $scripts_for_layout;

?>
</head>
<body>
	<div id="application">
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
					if(isset($items_in_cart))
						echo $this->Html->link("Cart[".$items_in_cart."]", array('controller' => 'cart', 'action' => 'index')); 
					else
						echo $this->Html->link("Cart[0]", array('controller' => 'cart', 'action' => 'index')); 
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
					echo $this->Html->link("Register", array('controller' => 'users', 'action' => 'register'));	
				}
				?>		
			</div>
		</div>
		<div class="delim" />
		<?php
			$tmpFlash = $this->Session->flash(); 
			if ($tmpFlash != "")				
			{			
				echo "<div id='flash' >";
				echo $tmpFlash;			
				echo "</div>";
			}
		?>
		<div id="content">
			<div id="inner-content">	
				<?php echo $content_for_layout ?>
			</div>
			<div id="footer">
				<?php echo $this->Html->link("Legal", array('controller' => 'about', 'action' => 'legal')); 
				echo "|";
				echo $this->Html->link("Authors", array('controller' => 'about', 'action' => 'authors'));	
				?>		
			</div>
		</div>
	</div>
</body>
</html>
