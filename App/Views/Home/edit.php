<!DOCTYPE html>



<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="../public/css/custom.css" >
        <title>Page Title</title>

    </head>
    <body>

        
        <div class="wrapper">
      <div class="row">
          <div class="col-lg-6 loginpage"  >

        <div class="form-group">   

            <form method="post" action="http://localhost/ads_yellowpages/public/posts/update" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $post[0]['title'];  ?>">
                </div>


            

                 <div class="form-group">
                  <input type="hidden" id="id" name="id" value="<?php echo $post[0]['id'];  ?>">
                 <img src="../../../public/images/<?php echo $post[0]['image_name'] ?>" />
                </div>
                <div class="form-group">
                    <label for="photo">Image</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" value="<?php $post[0]['image_name'];  ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
          </div></div></div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>   
</body>
</html>
