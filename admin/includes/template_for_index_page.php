<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php 
                                    $query= "SELECT * FROM posts";
                                    $select_all_posts = mysqli_query($connection, $query);
                                    $post_count = mysqli_num_rows($select_all_posts);

                                    echo "<div class = 'huge'> {$post_count}</div>";

                                    ?>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="./posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php 
                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection, $query);

                                    $comments_count = mysqli_num_rows($select_all_comments);
                                    ?>
                                    <?php echo "<div class='huge'>{$comments_count}</div>"; ?>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="./comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php 
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection, $query);

                                    $categories_count = mysqli_num_rows($select_all_categories);
                                    ?>
                                    <?php echo "<div class='huge'>{$categories_count}</div>"; ?>
                                    <div>categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="./categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>            

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection, $query);

                                    $users_count = mysqli_num_rows($select_all_users);
                                    ?>
                                    <?php echo "<div class='huge'>{$users_count}</div>"; ?>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
</div>
<!-- /.row -->

<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Memory', 80],
          ['CPU', 55],
          ['Network', 68]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>

    <div id="chart_div" style="width: auto; height: 120px;"></div>

</div>
<!-- /.row -->

<div class="row">
 <script type="text/javascript">
      google.charts.load('current', {packages:['wordtree']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          [ ['Phrases'],
            ['cats are better than dogs'],
            ['cats eat kibble'],
            ['cats are better than hamsters'],
            ['cats are awesome'],
            ['cats are people too'],
            ['cats eat mice'],
            ['cats meowing'],
            ['cats in the cradle'],
            ['cats eat mice'],
            ['cats in the cradle lyrics'],
            ['cats eat kibble'],
            ['cats for adoption'],
            ['cats are family'],
            ['cats eat mice'],
            ['cats are better than kittens'],
            ['cats are evil'],
            ['cats are weird'],
            ['cats eat mice'],
          ]
        );

        var options = {
          wordtree: {
            format: 'implicit',
            word: 'cats'
          }
        };

        var chart = new google.visualization.WordTree(document.getElementById('wordtree_basic'));
        chart.draw(data, options);
      }
    </script>

    <div id="wordtree_basic" style="width: 900px; height: 500px;"></div>

  </div>
<!-- /.row -->
<?php
                        $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                        $select_all_published_posts = mysqli_query($connection, $query);
                        $published_post_count = mysqli_num_rows($select_all_published_posts);
                
                
                        $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                        $select_all_draft_posts = mysqli_query($connection, $query);
                        $draft_post_count = mysqli_num_rows($select_all_draft_posts);
                
                        $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
                        $unapproved_comment_query = mysqli_query($connection, $query);
                        $unapproved_comment_count = mysqli_num_rows($unapproved_comment_query);
                        
                        $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
                        $select_subscribers = mysqli_query($connection, $query);
                        $subscriber_count = mysqli_num_rows($select_subscribers);
                
                
                
?> 
<div class="row">
   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

        <?php 
            $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments','Unapproved Comments', 'Users', 'Subscribers', 'Categories'];
            $element_count = [$post_count,$published_post_count, $draft_post_count, $comments_count, $unapproved_comment_count, $users_count, $subscriber_count, $categories_count];
            
            for($i=0; $i<count($element_text); $i++){
                
                echo "['{$element_text[$i]}'".","."'{$element_count[$i]}'],";
            }
        ?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: auto; height: 500px;"></div>

    </div>
<!-- /.row -->