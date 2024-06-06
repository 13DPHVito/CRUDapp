<!DOCTYPE html>
<html>
<head>
    <title>Create Goal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
 <!-- Create Goal Form -->
<form method="POST" action="/goals">
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <label for="due_date">Due Date:</label><br>
    <input type="date" id="due_date" name="due_date"><br>
    <button type="submit">Create Goal</button>
</form>

</div>
</body>
</html>
