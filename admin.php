<?php
include 'include/config.php';

//  Home Description
$sqlHome = "SELECT * FROM home_description WHERE id=1";
$resultHome = mysqli_query($connection, $sqlHome);
$dataHome = mysqli_fetch_assoc($resultHome);

//  Profile Data
$sqlProfile = "SELECT * FROM profile_data WHERE id=1";
$resultProfile = mysqli_query($connection, $sqlProfile);
$dataProfile = mysqli_fetch_assoc($resultProfile);

// Fetch all projects 
$sqlProjectsAll = "SELECT * FROM projects";
$resultProjectsAll = mysqli_query($connection, $sqlProjectsAll);

//  submission for Home Description
$updateMessageHome = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_home'])) {
    $newHomeDescription = mysqli_real_escape_string($connection, $_POST['home_description']);

    $updateQueryHome = "UPDATE home_description SET description='$newHomeDescription' WHERE id=1";
    $updateResultHome = mysqli_query($connection, $updateQueryHome);

    if ($updateResultHome) {
        $updateMessageHome = 'Home Description updated successfully!';
        $dataHome['description'] = $newHomeDescription; // Update the current data for display
    } else {
        $updateMessageHome = 'Error updating home description.';
    }
}

// Handle form submission for Profile Data
$updateMessageProfile = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $newProfileDescription = mysqli_real_escape_string($connection, $_POST['profile_description']);

    $updateQueryProfile = "UPDATE profile_data SET description='$newProfileDescription' WHERE id=1";
    $updateResultProfile = mysqli_query($connection, $updateQueryProfile);

    if ($updateResultProfile) {
        $updateMessageProfile = 'Profile Description updated successfully!';
        $dataProfile['description'] = $newProfileDescription; // Update the current data for display
    } else {
        $updateMessageProfile = 'Error updating profile description.';
    }
}











$updateMessageProfileImage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_image'])) {
    $newImageURL = mysqli_real_escape_string($connection, $_POST['image_url']);

    $updateQueryImage = "UPDATE image_data SET image_source='$newImageURL' WHERE user_id=1";
    $updateResultImage = mysqli_query($connection, $updateQueryImage);

    if ($updateResultImage) {
        $updateMessageProfileImage = 'Profile Image updated successfully!';
        $dataProfile['image_source'] = $newImageURL; // Update the current data for display
    } else {
        $updateMessageProfileImage = 'Error updating profile image.';
    }
}
     


















// Handle form submission for Projects
$updateMessageProjects = '';
$reloadPage = false; // Flag to control reloading

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_project'])) {
    if (isset($_POST['project_id']) && is_array($_POST['project_id'])) {
        foreach ($_POST['project_id'] as $index => $projectId) {
            $newProjectUrl = isset($_POST['project_url'][$projectId]) ? mysqli_real_escape_string($connection, $_POST['project_url'][$projectId]) : '';
            $newProjectImageSource = isset($_POST['project_image_source'][$projectId]) ? mysqli_real_escape_string($connection, $_POST['project_image_source'][$projectId]) : '';

            $updateQueryProjects = "UPDATE projects SET url='$newProjectUrl', image_source='$newProjectImageSource' WHERE id=$projectId";
            $updateResultProjects = mysqli_query($connection, $updateQueryProjects);

            if (!$updateResultProjects) {
                $updateMessageProjects = 'Error updating project information.';
                break; // Stop processing further if an error occurs
            }
        }

        // If no errors occurred during the loop, set success message and flag to reload
        if (empty($updateMessageProjects)) {
            $updateMessageProjects = 'Project information updated successfully!';
            $reloadPage = true;
        }
    } else {
        $updateMessageProjects = 'Project IDs not provided.';
    }
}






$createMessageProjects = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_project'])) {
    $newProjectUrl = mysqli_real_escape_string($connection, $_POST['new_project_url']);
    $newProjectImageSource = mysqli_real_escape_string($connection, $_POST['new_project_image_source']);

    $insertQueryProjects = "INSERT INTO projects (url, image_source) VALUES ('$newProjectUrl', '$newProjectImageSource')";
    $insertResultProjects = mysqli_query($connection, $insertQueryProjects);

    if ($insertResultProjects) {
        $createMessageProjects = 'New project created successfully!';
        $reloadPage = true;
    } else {
        $createMessageProjects = 'Error creating new project.';
    }
}




// Handle form submission for deleting a project
$deleteMessageProjects = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_project'])) {
    if (isset($_POST['delete_project_id'])) {
        $deleteProjectId = mysqli_real_escape_string($connection, $_POST['delete_project_id']);

        $deleteQueryProjects = "DELETE FROM projects WHERE id=$deleteProjectId";
        $deleteResultProjects = mysqli_query($connection, $deleteQueryProjects);

        if ($deleteResultProjects) {
            $deleteMessageProjects = 'Project deleted successfully!';
            $reloadPage = true;
        } else {
            $deleteMessageProjects = 'Error deleting project.';
        }
    } else {
        $deleteMessageProjects = 'Project ID not provided for deletion.';
    }
}


// Reload the page using PHP header() function if the flag is set
if ($reloadPage) {
    header("Refresh:0"); // Reload the page after 0 seconds
    exit(); // Ensure that no further code is executed after the reload header
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        .admin-container {
            max-width: 800px;
            margin: 0px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #ddf;
        }
        h3{
            margin: 20px 0px;
        }

        .admin-content {
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        textarea,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background:#ddf
        }

        button {
            background-color: #4caf50;
            color: #ddf;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            text-align:center;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        .update-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            color: #3c763d;
            border-radius: 4px;
        }

        .update-message-error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            border-radius: 4px;
        }

        .hide-message {
            display: none;
        }
        .align-center{
            width:90%;
            margin:0 auto;
            display:flex;
            flex-flow:column;  
            align-items:end;
        }
        .mt-10{
            margin-top:10px;
        }



        /* Add this CSS to your existing stylesheet or create a new one */

.profile-image {
    margin-top: 20px;
}

.profile-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.update-message-profile-image {
    margin-top: 20px;
    padding: 10px;
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
    color: #3c763d;
    border-radius: 4px;
}

.update-message-profile-image-error {
    margin-top: 20px;
    padding: 10px;
    background-color: #f2dede;
    border: 1px solid #ebccd1;
    color: #a94442;
    border-radius: 4px;
}





    </style>
</head>

<body>
    <div class="admin-container">
        <h2>ADMIN PANEL</h2>

        <div class="admin-content">
            <!-- Home Description Form -->
            <h3>Edit Home Description</h3>
            <p class="update-message-home update-message hide-message"><?php echo $updateMessageHome; ?></p>
            <form method="post" action="admin.php">
                <div class="align-center">
                    <textarea name="home_description" rows="5" cols="100"><?php echo $dataHome['description']; ?></textarea><br>
                    <button type="submit" name="update_home">Update Home Description</button>
                </div>
            </form>

            <!-- Profile Data Form -->
            <h3 class="mt-10">Edit Profile Data</h3>
            <p class="update-message-profile update-message hide-message"><?php echo $updateMessageProfile; ?></p>
            <form method="post" action="admin.php">
                <div class="align-center">
                    <textarea name="profile_description" rows="5" cols="100"><?php echo $dataProfile['description']; ?></textarea><br>
                    <button type="submit" name="update_profile">Update Profile Description</button>
                </div>
            </form>








            <!-- Edit Profile Image Form -->
<h3>Edit Profile Image</h3>
<p class="update-message-profile-image update-message hide-message"><?php echo $updateMessageProfileImage; ?></p>
<form method="post" action="admin.php">
    <div class="align-center">
        <label for="image_url">Profile Image URL:</label>
        
        <input type="text" name="image_url" value="<?php echo isset($dataProfile['image_source']) ? $dataProfile['image_source'] : ''; ?>"><br>

        <button type="submit" name="update_image">Update Profile Image</button>
    </div>
</form>

<!-- Display Profile Image -->
<!-- Display Profile Image -->







            








            <!-- Projects Table -->
            <h3>Create New Project</h3>
            <p class="create-message-project create-message hide-message"><?php echo $createMessageProjects; ?></p>
            <form method="post" action="admin.php">
                <label for="new_project_url">Project URL:</label>
                <input type="text" name="new_project_url" required><br>
                <label for="new_project_image_source">Image Source:</label>
                <input type="text" name="new_project_image_source" required><br>
                <button type="submit" name="create_project">Create Project</button>
            </form>

            <!-- Projects Table -->
            <h3>Edit Projects</h3>
            <p class="update-message-project update-message hide-message"><?php echo $updateMessageProjects; ?></p>
            <p class="delete-message-project delete-message hide-message"><?php echo $deleteMessageProjects; ?></p>
            <form method="post" action="admin.php">
                <table>
                    <thead>
                        <tr>
                            <th>Project ID</th>
                            <th>Project URL</th>
                            <th>Image Source</th>
                            <th>Action</th>
                            <th>Delete</th> <!-- New column for Delete -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultProjectsAll)) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td><input type="text" name="project_url[' . $row['id'] . ']" value="' . $row['url'] . '"></td>';
                            echo '<td><input type="text" name="project_image_source[' . $row['id'] . ']" value="' . $row['image_source'] . '"></td>';
                            echo '<td>
                                    <input type="hidden" name="project_id[]" value="' . $row['id'] . '">
                                    <button type="submit" name="update_project">Update</button>
                                </td>';
                                echo '<td>
        <input type="hidden" name="delete_project_id" value="' . $row['id'] . '">
        <button type="submit" name="delete_project" onclick="return confirm(\'Are you sure you want to delete this project?\')">Delete</button>
      </td>';
                           
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </form>

        </div>
    </div>

    <script>
        var updateMessageHome = document.querySelector('.update-message-home');
        var updateMessageProfile = document.querySelector('.update-message-profile');
        var updateMessageProjects = document.querySelector('.update-message-project');
        
        if (updateMessageHome && updateMessageHome.innerHTML.trim() !== '') {
            updateMessageHome.style.display = 'block';
        }

        if (updateMessageProfile && updateMessageProfile.innerHTML.trim() !== '') {
            updateMessageProfile.style.display = 'block';
        }

        if (updateMessageProjects && updateMessageProjects.innerHTML.trim() !== '') {
            updateMessageProjects.style.display = 'block';
        }
        
        
        setTimeout(function () {
            if (updateMessageHome && updateMessageHome.innerHTML.trim() !== '') {
                updateMessageHome.style.display = 'none';
            }

            if (updateMessageProfile && updateMessageProfile.innerHTML.trim() !== '') {
                updateMessageProfile.style.display = 'none';
            }

            if (updateMessageProjects && updateMessageProjects.innerHTML.trim() !== '') {
                updateMessageProjects.style.display = 'none';
            }
        }, 2000);
    </script>
</body>

</html>
