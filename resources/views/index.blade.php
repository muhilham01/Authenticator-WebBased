<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2>www.malasngoding.com</h2>
	<h3>Data User</h3>
 
	<a href="/user/tambah"> + Tambah User Baru</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
		@foreach($user as $p)
		<tr>
			<td>{{ $p->user_nama }}</td>
			<td>{{ $p->user_jabatan }}</td>
			<td>{{ $p->user_umur }}</td>
			<td>{{ $p->user_alamat }}</td>
			<td>
				<a href="/user/edit/{{ $p->user_id }}">Edit</a>
				|
				<a href="/user/hapus/{{ $p->user_id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>