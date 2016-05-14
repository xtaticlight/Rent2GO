@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-2">
                <h1>Categories</h1>
                <ul style="list-style: none">
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">houses</a></li>
                    <li><a href="#">Lands</a></li>
                    <li><a href="#">cars</a></li>
                    <li><a href="#">clothes</a></li>
                    <li><a href="#">equipments</a></li>
                    <li><a href="#">others</a></li>
                </ul>
            </div>
            <div class="col-lg-10">
                <label style="font-size: larger;font-weight: bold;"> Available For Rent :</label>
                <div class="row">
                    @foreach($materials as $data)
                        <div class="container1">
                            <div class="col-sm-3" style="align-items: center">
                                <a href="#" data-toggle="modal" data-target="#{{$data['id']}}"><img
                                            class="img-responsive" src="./assets/img/{{$data['pictures'][0]}}.png"
                                            style="width: 300px; padding-left: 20px"></a>
                                <label style="margin-left: 80px;">{{$data['name']}}</label>
                            </div>
                            <div class="modal fade modal-info" id="{{$data['id']}}" role="dialog">
                                <div class="modal-dialog modal-success">

                                    <!-- Modal content-->
                                    <div class="modal-dialog modal-md">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Tabo-Tabo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form type="hidden" method="post" action="./rentItem{{$data['id']}}"
                                                      id="form1"/>
                                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                                <div id="infoCarousel" class="carousel slide" data-ride="carousel"
                                                     data-interval="3000">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#infoCarousel" data-slide-to="0"
                                                            class="active"></li>
                                                        <li data-target="#infoCarousel" data-slide-to="1"></li>
                                                        <li data-target="#infoCarousel" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="item active">
                                                            <img src="./assets/img/{{$data['pictures'][0]}}.png"
                                                                 width="50%" height="auto">
                                                        </div>
                                                        @foreach($data['pictures'] as $pictures)

                                                            <div class="item">
                                                                <img src="./assets/img/{{$pictures}}.png"
                                                                     width="50%"
                                                                     height="auto">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <a class="left carousel-control" href="#infoCarousel" role="button"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                    </a>

                                                    <a class="right carousel-control" href="#infoCarousel" role="button"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                    </a>
                                                </div>
                                                <!--Image Carousel-->
                                            </div>
                                            <div class="modal-footer">
                                                <button style="margin-top:10px;" type="submit"
                                                        class="btn btn-info"><span
                                                            class="glyphicon glyphicon-arrow-right"></span>
                                                    Browse
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <?php
                try {

                    // Find out how many items are in the table
                    $total = $dbh->query('
        SELECT
            COUNT(*)
        FROM
            table
    ')->fetchColumn();

                    // How many items to list per page
                    $limit = 9;

                    // How many pages will there be
                    $pages = ceil($total / $limit);

                    // What page are we currently on?
                    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                            'options' => array(
                                    'default' => 1,
                                    'min_range' => 1,
                            ),
                    )));

                    // Calculate the offset for the query
                    $offset = ($page - 1) * $limit;

                    // Some information to display to the user
                    $start = $offset + 1;
                    $end = min(($offset + $limit), $total);

                    // The "back" link
                    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

                    // The "forward" link
                    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

                    // Display the paging information
                    echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

                    // Prepare the paged query
                    $stmt = $dbh->prepare('
        SELECT
            *
        FROM
            table
        ORDER BY
            name
        LIMIT
            :limit
        OFFSET
            :offset
    ');

                    // Bind the query params
                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $stmt->execute();

                    // Do we have any results?
                    if ($stmt->rowCount() > 0) {
                        // Define how we want to fetch the results
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $iterator = new IteratorIterator($stmt);

                        // Display the results
                        foreach ($iterator as $row) {
                            echo '<p>', $row['name'], '</p>';
                        }

                    } else {
                        echo '<p>No results could be displayed.</p>';
                    }

                } catch (Exception $e) {
                    echo '<p>', $e->getMessage(), '</p>';
                }

                ?>

            </div>

        </div>
    </div>
    </div>
@endsection
