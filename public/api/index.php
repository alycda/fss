<?php

define('BULLET_ROOT', '../../'); // dirname(__DIR__)
define('BULLET_APP_ROOT', '/api/');

require BULLET_ROOT . 'vendor/autoload.php'; // __DIR__ .

// Your App
$app = new Bullet\App();



// ROOT: /api
$app->path(BULLET_APP_ROOT, function($request) use($app) {

  // Links to available resources for the API
  $data = array(
      'endpoints' => array(
          'cities' => array(
              // 'title' => 'Cities',
              'href' => $app->url(BULLET_APP_ROOT . 'cities'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          // 'comments' => array(
          //     // 'title' => 'Comments',
          //     'href' => $app->url(BULLET_APP_ROOT . 'comments'),
          //     'methods' => ['GET'],
          //     // 'parameters' => []
          // ),
          'headlines' => array(
              // 'title' => 'Headlines',
              'href' => $app->url(BULLET_APP_ROOT . 'headlines'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          'nav' => array(
              // 'title' => 'Navigation',
              'href' => $app->url(BULLET_APP_ROOT . 'nav'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          // 'pages' => array(
          //     // 'title' => 'Pages',
          //     'href' => $app->url(BULLET_APP_ROOT . 'pages'),
          //     'methods' => ['GET'],
          //     // 'parameters' => []
          // ),
          'players' => array(
              // 'title' => 'Players',
              'href' => $app->url(BULLET_APP_ROOT . 'players'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          'schools' => array(
              // 'title' => 'Schools',
              'href' => $app->url(BULLET_APP_ROOT . 'schools'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          'scores' => array(
              // 'title' => 'Scores',
              'href' => $app->url(BULLET_APP_ROOT . 'scores'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          'seasons' => array(
              // 'title' => 'Seasons',
              'href' => $app->url(BULLET_APP_ROOT . 'seasons'),
              'methods' => ['GET'],
              // 'parameters' => []
          ),
          'sports' => array(
              // 'title' => 'Sports',
              'href' => $app->url(BULLET_APP_ROOT . 'sports'),
              'methods' => ['GET'],
              // 'parameters' => []
          )
      )
  );

  // Format responders
  // $app->format('json', function($request), use($app, $data) {
      return $data; // Auto json_encode on arrays for JSON requests
  // });

});


// // ADVERTISEMENTS: /api/ads
// $app->path('ads', function($request) use($app) {

//     // 'posts' subdirectory in 'blog' ('blog/posts')
//     $app->path('posts', function() use($app) {

//         // Handle GET on this path
//         $app->get(function() {
//             // Display all $posts
//             return 'posts'; //$app->template('posts/index', compact('posts'));
//         });

//     });

//   // $app->get(function() use($app) {
//     return 'all ads';
//   // });
// });



// CITIES: /api/cities
$app->path('cities', function($request) use($app) {

    // URL slug (alphanumeric with dashes and underscores)
    $app->param('slug', function($request, $slug) use($app) {
        return $slug; // 'my-post-title'
    });

  // $app->get(function() use($app) {
    return 'all cities';
  // });
});



// HEADLINES: /api/headlines
$app->path('headlines', function($request) use($app) {

    // URL slug (alphanumeric with dashes and underscores)
    $app->param('slug', function($request, $slug) use($app) {
        return $slug; // 'my-post-title'
    });

  // $app->get(function() use($app) {
    return 'all headlines';
  // });
});



// NAVIGATION: /api/nav
$app->path('nav', function($request) use($app) {

    // URL slug (alphanumeric with dashes and underscores)
    $app->param('slug', function($request, $slug) use($app) {
        return $slug; // 'my-post-title'
    });

  // $app->get(function() use($app) {
    return 'all navs';
  // });
});




// Run the app and echo the response
echo $app->run(new Bullet\Request());

?>