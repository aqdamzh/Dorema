<!DOCTYPE html>
<html>
<head>
	<title>#</title>
</head>
<body>
<?php 
if ($user->role === 'mahasiswa')
echo $user->username . ' ' . $user->name . ' ' . $user->npm . ' ' . $user->role . ' ' . $user->faculty . ' ' . $user->study_program . ' ' . $user->educational_program;
else if ($user->role === 'staff')
echo $user->username . ' ' . $user->name . ' ' . $user->nip . ' ' . $user->role;
?>
<hr>
<?php echo anchor('auth/logout','<button class="btn btn-secondary" style="width: 12em">
                  <i class="fas fa-spinner mr-1"></i>Logout</button>')
?>
</body>
</html>