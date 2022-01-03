<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>PHP Google Drive Api </h2>
    <a href="<?=site_url('drive/get_files_and_folders')?>">Click here to list all files and folders</a>

    <h2>File Upload</h2>
    <form action="<?=site_url('drive/upload')?>" method="post" enctype="multipart/form-data" >
        <label for="">Choose File</label>
        <input type="file" name="file" >
        
        <input type="submit" name="submit" value="submit" >
    </form>
</body>
</html>