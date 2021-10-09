<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>PHP CRUD App</title>

    <style>
      <?php include __DIR__ . '/css/bootstrap.min.css'; ?>
    </style>
    <!-- <link href="public/css/bootstrap.min.css" rel="stylesheet"/> -->
  </head>
  <body>

    <nav class="navbar navbar-expand navbar-dark bg-primary">
      <a class="navbar-brand" href="#">
        <?php
         $image = __DIR__ . '/img/database.svg';
         $image_data = base64_encode(file_get_contents($image));
         $src = 'data: '.mime_content_type($image).';base64,'.$image_data;
         echo '<img src="',$src,'" width="30" height="50" class="d-inline-black ml-3 align-text-top">';
         ?>
        <!-- <img src="public/img/database.svg" width="30" height="30" class="d-inline-block align-top ml-5" alt=""> -->
        Crud App
      </a>
    </nav>

    <div class="container my-3">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div id="title_form" class="card-header text-center">Add Contact</div>
            <div class="card-body">
              <form id="add_contact">
                <input name="" type="text" value="" id="fullname" class="form-control my-2" placeholder="Fullname"/>
                <input name="" type="text" value="" id="phone" class="form-control my-2" placeholder="Phone number"/>
                <input name="" type="email" value="" id="email" class="form-control my-2" placeholder="Email"/>
                <button id="btn_submit" contact_id="" class="form-control btn btn-success" type="submit">Send</button>
              </form>
              <div class="result"></div>
            </div>
          </div>      
        </div>
        
        <div class="col-sm-8">
          <table class="table table-striped table-dark table-bordered">
              <thead>
                <tr>
                    <th scope="col" class="text-center">Fullname</th>
                    <th scope="col" class="text-center">Phone</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Options</th>
                </tr>
              </thead>
              <tbody id="contacts">
              </tbody>
          </table>
        </div>
      </div>
    </div>


    <script>
    <?php include __DIR__ . '/js/jquery-3.6.0.min.js'; ?>
    <?php include __DIR__ . '/js/app.js'; ?>
    </script>

    
    <!-- <script src="public/js/jquery-3.6.0.min.js"> -->
    <!-- </script> -->
    
    <!-- <script type="text/javascript" src="public/js/app.js"> -->
    <!-- </script> -->
  </body>
</html>
