<?php
    include '../dbConnection.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM course WHERE course_id = '$id'";
    $conn->query($sql);

    echo '<script>window.location.href="courses.php"</script>';