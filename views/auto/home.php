<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo AutoComplete Dengan CodeIgniter dan jQuery</title>

<link href="<?php echo base_url(); ?>asset/css/thickbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/thickbox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
	$(function() {
		$('#loading').ajaxStart(function(){
			$(this).fadeIn();
		}).ajaxStop(function(){
			$(this).fadeOut();
		});
	});

	function cariDosen(namaDosen) {
		if(namaDosen.length == 0) {
			$('#hasilPencarian').hide();
		} else {
			$.post("<?php echo base_url(); ?>index.php/autocomplete/tampil", {kirimNama: ""+namaDosen+""}, function(data){
				if(data.length >0) {
					$('#hasilPencarian').fadeIn();
					$('#dataPencarian').html(data);
				}
			});
		}
	} 
	
	function pilih(thisValue) {
		$('#namaDosen').val(thisValue);
		setTimeout("$('#hasilPencarian').fadeOut();", 100);
	}
</script>

<style type="text/css">
	body {
		font-family: Arial;
		font-size: 11px;
		color: #000;
		margin: 0px auto;
		padding :0px;
	}

	.kotakHasil {
		margin: 0px auto;
		padding :0px;
		background-color: #fff;
		border : 1px solid #666;
		width : 400px;
	}
	
	.daftarPencarian {
		margin: 0px;
		padding: 0px;
	}
	
	.daftarPencarian ul {
		margin:0px;
		padding: 0px;
	}
	
	.daftarPencarian li {
		margin:0px;
		padding: 5px;
		cursor: pointer;
		list-style : none;
	}
	
	.daftarPencarian li:hover {
		background-color: #659CD8;
	}
	#namaDosen{
		padding : 8px;
		background-color: #f3f3f3;
		border : 1px solid #666;
		width:380px;
	}
	#total{
		background-color:#f3f3f3; 
		padding:10px; 
		text-align:center;
	}
	#loading{
		background-color:#f3f3f3; 
		padding:5px; 
		text-align:center;
	}
	a{
		text-decoration:none;
		color:#000;
	}
	a:hover{
		text-decoration:underline;
		color:#000;
	}
</style>

</head>

<body>


	<div>

	<div id="loading" style="display:none"><img src="<?php echo base_url(); ?>images/loading.gif" width="20px">
	<br>Memuat Data dari Database...</div>
		<form>
			<div style="width:400px; margin:0px auto;">
				<input type="text" size="30" id="namaDosen" onkeyup="cariDosen(this.value);" onblur="pilih();"  
				value="Pencarian...." onfocus="if(this.value=='Pencarian....') this.value='';" />
			</div>
			
			<div class="kotakHasil" id="hasilPencarian" style="display: none;">
				<div class="daftarPencarian" id="dataPencarian">
					
				</div>
			</div>
		</form>
	</div>

</body>
</html>
