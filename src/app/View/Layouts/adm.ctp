<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<?php
echo $this->Html->css("common");
echo $this->Html->css("layout_adm");
echo $scripts_for_layout
?>
</head>
<body>
	<div id="application">
		<div id="header">
			<div style="text-align:center"><h1>CakeShop</h1></div>
			<div style="text-align:center"><h2>administration</h2></div>
		</div>
		<div id="menu">
			<div>
				<?php 
					echo $this->Html->link("Home", array('controller' => 'home', 'action' => 'index')); 
					echo "|";
					echo $this->Html->link("Profile", array('controller' => 'users', 'action' => 'edit', AuthComponent::user('id')));						
					echo "|";
					echo $this->Html->link("Logout", array('controller' => 'users', 'action' => 'logout'));						
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
