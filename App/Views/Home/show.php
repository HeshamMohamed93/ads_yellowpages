<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="../../css/custom.css" >
        <title>Page Title</title>


    </head>
    <body>
        
        

        
    <?php session_start(); ?>
        
        
        
            <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId            : '510912549408637',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v3.2'
        });
        FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

       function statusChangeCallback (response)
       {
         if(response.status === 'connected')
         {
           console.log('logged in');
           testAPI();
         }else {
           console.log('not logged in');
         }
       }


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function testAPI () {
  FB.api('/me?fields=name,email' , function (response){
    if(response && !response.error)
    {

    document.getElementById('addComment').style.display = 'block';
  
   
    document.getElementById('username').value = response.name;
    }
  })
}
    </script>
        
        
        <div>
        <ul class="postsbar">
            <?php session_start(); if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
           <li><a class="active" href=""><?php echo Welcome . ' ' .$_SESSION['username'] ?></a> </li>
  <li class="rightpos"><a class="" href="http://localhost/ads_yellowpages/public/Users/logout" >Logout</a></li>
  
   <li><a class="" href="http://localhost/ads_yellowpages/public/Posts/create">Create Posts</a></li>
   <li><a class="" href="http://localhost/ads_yellowpages/public/comments/nonconfirmed">Confirm Comments</a></li>

   <?php endif; ?>
    </ul> 

        
        
    </div>
        
        
  
        <div id="albums">
            <div class="row text-center">
                <div class="row">

                    <div class="columnn">
                        <article class="card-text">
                            <header class="title-header">
                                <h3><?php echo $post[0]['title']; ?></h3>
                            </header>
                            <div class="card-block">
                                <div class="img-card">
                                    <img class="myimage" src="../../../public/images/<?php echo $post[0]['image_name'] ?>" alt="Movie"  />
                                </div>
                              
                            </div>
                        </article>			
                    </div>

                </div>
            </div>
        </div>
        
        
    <div class="fblogin">
 <fb:login-button
      scope="public_profile,email"
      onlogin="checkLoginState();">
    </fb:login-button>
    </div>      
        
        <section>
             
            <div>
            
            <ul class="list-group">
                <?php  foreach($comments as $comment): ?>
                <div class="mycomment">
                    <div class="col-sm-8">
                <div class="panel panel-default">
              <div class="panel-heading">
                  <strong><?php echo $comment['username'];  ?></strong> <span class="text-muted"><?php echo $comment['created_at'];  ?></span>
              </div>
                    <div class="panel-body">
                <li class="list-group-item"><?php echo $comment['comment'];  ?></li>
                </div>
                </div></div>
             
                </div>
                <?php            endforeach;?>
            </ul>
            
            
        </div>
        
        </section>
        
    
            <div class="form-group" id="addComment" style="display: none">   

            <form method="post" action="http://localhost/ads_yellowpages/public/comments/add" enctype="multipart/form-data">
               
        

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="content" name="comment" rows="3"></textarea>
                </div>

             
                 <input type="hidden" id="username" name="username" value="" />
                
                <input type="hidden" name="post_id" value="<?php echo $post[0]['id'];  ?>" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
       
        


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



