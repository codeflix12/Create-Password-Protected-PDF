<?php
include_once("db_connect.php");
$sqlQuery = "SELECT id, name, gender, age, skills, designation FROM developers LIMIT 5";
$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
?>
<table id="editableTable" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Skills</th>
			<th>Designation</th>
			<th> </th>					
		</tr>
	</thead>
	<tbody>
		<?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
		   <tr>
		   <td><?php echo $developer['id']; ?></td>
		   <td><?php echo $developer['name']; ?></td>
		   <td><?php echo $developer['gender']; ?></td>
		   <td><?php echo $developer['age']; ?></td>
		   <td><?php echo $developer['skills']; ?></td>
		   <td><?php echo $developer['designation']; ?></td>
		   <td><a href="pdf.php?id=<?php echo $developer ['id']; ?>" target="_blank">PDF</a></td>
		   </tr>
		<?php } ?>
	</tbody>
</table>