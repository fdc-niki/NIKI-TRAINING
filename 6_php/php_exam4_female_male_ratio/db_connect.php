<?php
// - ALWAYS INITIALISE SESSION
session_start();

// - connection logic
$CONNECTION = mysqli_connect(
	"localhost",
	"root",
	"",
	"fdc_exercise"
);

/**
 * get a file name's extension
 */
function getFileExtension($filename = ""){
	return pathinfo($filename, PATHINFO_EXTENSION);
}

// $search_start = "";
// $search_end = "";
//
// if(isset($_GET["search_start"]) && isset($_GET["search_end"]) && !empty($_GET["search_start"]) && !empty($_GET["search_end"])) {
// 	$search_start = $_GET["search_start"];
// 		$sql = "
// 			SELECT
// 				count() as total_rows
// 		 	FROM
// 				`php_mysql_exam`
// 			WHERE
// 				`name` LIKE '%$search_term%'
// 			OR
// 				`company` LIKE '%$search_term%'
// 			OR
// 				`phone` LIKE '%$search_term%'
//             OR
//                 `email` LIKE '%$search_term%'
// 			";
// 		$count_result = mysqli_query($CONNECTION, $sql);
// 		$count_row = mysqli_fetch_assoc($count_result);
// 		$total_pages = ceil($count_row["total_rows"] / $per_page);
//
// 		if ($current_page > 0) {
// 			$current_offset = $current_page * $per_page;
// 		}
// 			$sql = "
// 			SELECT
// 				*
// 			FROM
// 				`php_mysql_exam`
// 			WHERE
//                 `name` LIKE '%$search_term%'
//             OR
//                 `company` LIKE '%$search_term%'
//             OR
//                 `phone` LIKE '%$search_term%'
//             OR
//                 `email` LIKE '%$search_term%'
// 			ORDER BY id ASC
// 			LIMIT $per_page OFFSET $current_offset
// 			";
//
// 			$result = mysqli_query($CONNECTION, $sql);
//
// }
