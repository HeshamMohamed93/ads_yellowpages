

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../public/css/custom.css" >
    <title>Page Title</title>
   
   
</head>
<body>

  

    <div id="albums">
      <div class="row text-center">
           <div class="row">
       
        <?php  foreach($posts as $post): ?>
          
             
          <div class="column">
              <article class="card-text">
                   <header class="title-header">
          <h3><?php echo $post['title']; ?></h3>
        </header>
                   <div class="card-block">
		<div class="img-card">

                    <a href="http://localhost/ads_yellowpages/public/posts/<?php echo $post['id'];  ?>/show"><img src="../public/images/<?php echo $post['image_name']; ?>" alt="Movie"  /></a>
		</div>
		
                  <?php session_start(); if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                
                <a href="http://localhost/ads_yellowpages/public/posts/<?php echo $post['id'];  ?>/delete"><button type="button" class="btn btn-danger">Delete</button></a>
                 <a href="http://localhost/ads_yellowpages/public/posts/<?php echo $post['id'];  ?>/create"><button type="button" class="btn btn-success">Update</button></a>
                  <?php endif; ?>
                   </div>
              </article>			
	</div>
             
          
        
        
        	
       <?php            endforeach;?>
                     </div>
                  </div>
      </div>
    

    





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



