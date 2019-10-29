<?php
include 'db_connect.php';

// - count all users; we don't care about their gender
$count_all = "
	select
		count(*) as total_count
	from
		users
		where created >= '2019-09-01 00:00:00'
";
$query_all = mysqli_query($CONNECTION, $count_all);
$result_count_all = mysqli_fetch_assoc($query_all);
$num_count_all = $result_count_all["total_count"];

// - string for counting male users
if(isset($_GET["search_start"]) && isset($_GET["search_end"])){
    $search_start = $_GET["search_start"];
    $search_end = $_GET["search_end"];
    $count_male = "
        SELECT
            count(*) as male_count
        FROM
            users
        where
            gender = 1
        AND
            created_at between $search_start and $search_end
    ";
    $query_male = mysqli_query($CONNECTION, $count_male);
    $result_count_male = mysqli_fetch_assoc($query_male);
    $num_count_male = $result_count_male["male_count"];

} else {
    $count_male = "
    select
    count(*) as male_count
    from
    users
    where
    gender = 1
    and created >= '2019-09-01 00:00:00'
    ";
    $query_male = mysqli_query($CONNECTION, $count_male);
    $result_count_male = mysqli_fetch_assoc($query_male);
    $num_count_male = $result_count_male["male_count"];
}

// - string for counting female users
$count_female = "
	select
		count(*) as female_count
	from
		users
	where
		gender = 2
		and created >= '2019-09-01 00:00:00'
";
$query_female = mysqli_query($CONNECTION, $count_female);
$result_count_female = mysqli_fetch_assoc($query_female);
$num_count_female = $result_count_female["female_count"];

// - string for counting other genders
$count_others = "
	select
		count(*) as other_count
	from
		users
	where
		gender != 1
		and gender != 2
		and created >= '2019-09-01 00:00:00'
";
$query_other = mysqli_query($CONNECTION, $count_others);
$result_count_other = mysqli_fetch_assoc($query_other);
$num_count_other = $result_count_other["other_count"];


// echo "TOTAL users : " . $num_count_all . " - " . (($num_count_all / $num_count_all) * 100);
//
// echo "<br/>";
// echo "TOTAL male : " . $num_count_male . " - " . (($num_count_male / $num_count_all) * 100);
//
// echo "<br/>";
// echo "TOTAL female : " . $num_count_female . " - " . (($num_count_female / $num_count_all) * 100);
//
// echo "<br/>";
// echo "TOTAL others : " . $num_count_other . " - " . (($num_count_other / $num_count_all) * 100);

$per_male = $num_count_male / $num_count_all * 100;
$per_female = $num_count_female / $num_count_all * 100;
$per_other = $num_count_other / $num_count_all * 100;
$per_all = $num_count_all / $num_count_all * 100;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>STATISTICS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1>STATISTICS PAGE</h1>
        <form class="" action="" method="get">
            <label for="search_start">CREATED START(DATE)</label><br>
            <input type="date" name="search_start" id="search_start" value=""><br><br>
            <label>CREATED END(DATE)</label><br>
            <input type="date" name="search_end" id="search_end" value=""><br><br>
            <button type="submit" name="submit_search" value="">SEARCH</button>
        </form>

        <p>User statistics result for <start date> ~ <end date>	</p>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">GENDER</th>
                    <th scope="col">COUNT</th>
                    <th scope="col">%</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>MALE</td>
                    <td><?php echo $result_count_male["male_count"]; ?></td>
                    <td><?php echo $per_male; ?></td>
                </tr>
                <tr>
                    <td>FEMALE</td>
                    <td><?php echo $result_count_female["female_count"]; ?></td>
                    <td><?php echo $per_female; ?></td>
                </tr>
                <tr>
                    <td>OTHERES</td>
                    <td><?php echo $result_count_other["other_count"]; ?></td>
                    <td><?php echo $per_other; ?></td>
                </tr>
                <tr>
                    <td>TOTAL</td>
                    <td><?php echo $result_count_all["total_count"]; ?></td>
                    <td><?php echo $per_all; ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
