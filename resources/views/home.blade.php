<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>D4S Test</title>
        <link rel="stylesheet" href="../css/app.css">
    </head>
    <body>

      <div class="container">

        <!-- Header --> 
        <div id="header" class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">D4S Blog</h1>
            <p class="lead">Laravel CRUD app</p>
          </div>
        </div>

        <!-- Content -->
        <div class="card-columns">
          <div class="card bg-info">
            <div class="card-body text-center">
              <p class="card-text">
                {{ app()->getLocale() }}
              </p>
            </div>
          </div>
        </div>
      </div>

    </body>
</html>
