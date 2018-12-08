<?php
session_start();

// if user is not logged in
if( !$_SESSION['loggedInUser'] ) {
    
    // send them to the login page
    header("Location: index.php");
}

// connect to database
include('connection.php');

// query & result
$query = "SELECT * FROM courses";
$result = mysqli_query( $conn, $query );

// check for query string
if( isset( $_GET['alert'] ) ) {
    
    // new course added
    if( $_GET['alert'] == 'success' ) {
        $alertMessage = "<div class='alert alert-success'>New course added! <a class='close' data-dismiss='alert'>&times;</a></div>";
    
    // course deleted
    } elseif( $_GET['alert'] == 'remove' ) {
        $alertMessage = "<div class='alert alert-success'>Course deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
    }
      
}

// close the mysql connection
mysqli_close($conn);

include('header.php');
?>

<h1>Hie. Below is a list of your courses.</h1>

<?php echo $alertMessage; ?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Course Code</th>
        <th>Course Description</th>
        <th>Number of Answer Sheets</th>
    </tr>
    
    <?php
    
    if( mysqli_num_rows($result) > 0 ) {
        
        // we have data!
        // output the data
        
        while( $row = mysqli_fetch_assoc($result) ) {
            echo "<tr>";
            
            echo "<td>" . $row['code'] . "</td><td>" . $row['description'] . "</td><td>" . $row['number'] . "</td><td>";
            
            echo '<td><a href="remove.php?id=' . $row['id'] . '" type="button" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-delete"></span>
                    </a></td>';
            
            echo "</tr>";
        }
    } else { // if no entries
        echo "<div class='alert alert-warning'>Mmmm, looks lonely here. Please add courses.</div>";
    }

    mysqli_close($conn);

    ?>

    <tr>
        <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
    </tr>
</table>

<?php
include('footer.php');
?>