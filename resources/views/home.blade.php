@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-2">
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
            <div class="col-sm-10">
                <label style="font-size: larger;font-weight: bold;"> Available For Rent :</label>
                <div class="row">
                    <div class="col-sm-3" style="align-items: center">
                        <div class="container1">
                            <a href="#"><img class="img-responsive" src="img/kim.jpg"
                                             style="width: 500px; padding-left: 20px"></a>
                            <label style="margin-left: 80px;">Description</label>
                        </div>
                    </div>
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
@endsection
