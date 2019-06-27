<?
include 'includes/head.inc.php';
if(isset($_POST['submit'])){
    $deptName = $_POST['deptName'];
    $deptHead = $_POST['deptHead'];
    $sql = "INSERT INTO tbl_department(dept_name, dept_head) VALUES('$deptName','$deptHead')";
    mysqli_query($conn, $sql);
    
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM tbl_department WHERE id=$id";
    mysqli_query($conn, $delete_query);
}
$select_query = 'SELECT * FROM tbl_department';
$row = mysqli_query($conn, $select_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="includes/main.css">
    <title>Hai</title>
</head>
<body>
<div class="max-auto">
    <form action="" class="sm-col-3" method="post">
        <label for="deptName">Department Name</label><input type="text" name="deptName" class="block col-12 mb1 field">
        <label for="deptHead">Department Head</label><input type="text" name="deptHead" class="block col-12 mb1 field">
        <input type="submit" name="submit" class="block col-12 mb1 field btn btn-primary">
    </form>
</div>
<table>
    <thead>
        <th>ID</th>
        <th>Department Name</th>
        <th>Department Head</th>
        <th>Action</th>
    </thead>
    <?
    while($data = mysqli_fetch_array($row)){
    ?>
        <tr>
            <td><?=$data['id'] ?></td>
            <td><?=$data['dept_name'] ?></td>
            <td><?=$data['dept_head'] ?></td>
            <td><a href="crud1.php?id=<?=$data['id'] ?>">Delete</a></td>
        </tr>
    <?
    }
    ?>
</table>
</body>
</html>
