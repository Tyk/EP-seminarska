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
<hr />
<?php echo $content_for_layout ?>
<hr />
<div id="footer">
	<?php echo $this->Html->link("Legal", array('controller' => 'about', 'action' => 'legal')); 
	echo "|";
	echo $this->Html->link("Authors", array('controller' => 'about', 'action' => 'authors'));	
	?>		
</div>
</body>
</html>
