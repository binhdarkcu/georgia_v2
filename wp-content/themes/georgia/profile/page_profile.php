<?php

add_action('admin_menu','add_page_profile');
function add_page_profile()
{
  add_menu_page('Profile', 'Profile','administrator','add-country','page_add_countries');

}

function page_add_countries()
{
    if(!empty($_POST) && wp_verify_nonce($_POST['act_add_country'],'add_country'))
    {
    	if(!empty($_POST['code_c']) && !empty($_POST['country']))
    	{
    		$add=insert_db_country(trim($_POST['code_c']), $_POST['country']);
    		if($add==1)
    		{
    		  echo '<h3>Mã quốc giá đã tồn tại.Vui lòng nhập mã khác</h3>';	
    			
    		}
    		elseif($add==2) 
    		{
    			
    			echo '<h3>Không thể thêm mới quốc gia.vui lòng thử lại</h3>';	
    		}
    		elseif ($add==3)
    		{
    			echo '<h3>Các trường thì rỗng.vui lòng điền đầy đủ thông tin</h3>';	
    			
    		}else 
    		{
    			
    			echo '<h3>Đã thêm mới quốc gia thành công!</h3>';	
    		}
    	}
    	else 
    	{
    		echo '<h3>Các trường thì rỗng.vui lòng điền đầy đủ thông tin</h3>';	
    		
    	}
    	
    	
    }
    if(!empty($_GET) && $_GET['action'] && $_GET['code'] )
    {
    	if($_GET['action']=='delete')
    	{
    		$delete=delete_country($_GET['code']);
    		if($delete)
    		{
    			?>
    			<script type="text/javascript">
    		        location.href='<?php  echo admin_url().'admin.php?page=add-country';?>';
    			</script>
    			
    			<?php 
    			
    			
    		}
    		else 
    		{
    			echo '<h3>Cant not delete!</h3>';	
    			
    		}
    		
    	}
    }
   
	if(!empty($_POST) && $_POST['update_c'])
	{
		
		$countries=$_POST['countries'];
		$err=0;
		if(!$countries)
		{
			return FALSE;
		}
		else 
		{
			foreach ($countries as $key =>$value)
			{
				
				
			   $update=edit_db_country($key,$value['country']);
				if($update)
				{
					$err=0;
				}
			}
			if($err==0)
			{
				echo '<h3>Cập nhật thành công!</h3>';
			}
			
			
		}
		
		
		
	}
    
    
	?>
	<div class="wrap">
    <form action="" method="post">
    <fieldset style="border: 2px solid ;#ddd;">
    <legend><h3>Thêm Mới Quốc Gia</h3></legend>
    <table>
   
    <tr>
    <th><label>Mã Quốc Gia:</label></th>
    <td><input name="code_c" type="text"  /></td>
    </tr>
    <tr>
    <th><label>Tên Quốc Gia:</label></th>
    <td><input name="country" type="text"  /></td>
    </tr>
    <tr>
    <th></th>
    <td><input class="button-primary" name="submit_country" type="submit"  value="Thêm Mới" /></td>
    <?php wp_nonce_field('add_country','act_add_country');?>
    </tr>
    </table>
    </fieldset>
   </form>  
       <form action=""  method="post"">
	   <fieldset style="border:2px solid #000;">
	   <legend ><h3>Danh Sách Quốc Gia</h3></legend>
	  
		<table style="height:10px;overflow: auto;">
		
		<tr>
		<th style="text-align: center;width:200px;"><h3>Mã Quốc Gia</h3></th>
		<th style="text-align: center;width:200px;"><h3>Tên Quốc Gia</h3></th>
		<th style="text-align: center;width:200px;"><h3>Chức Năng</h3></th>
		</tr>
		<?php 
		 $kq=get_list_countries();
		
		 if(!$kq)
		 {?>
		 
		 <tr>
		<td colspan="2">Không có dữ liệu</td>
		</tr>
		 	<?php 
		 }
		 else 
		 {
		 	foreach ($kq as $k)
		 	{
		 	
		?>
		
		<tr>
		<td style="text-align: center;width:200px;text-transform:uppercase;"><?php echo $k->code;?></td>
		<td style="text-align: center;width:200px;"><input style="text-transform:uppercase;" type="text" name="countries[<?php echo $k->code;?>][country]"  value="<?php echo $k->country;?>"/></td>
		<td style="text-align: center;width:200px;"><a class="button-primary" onClick="return confirm('Bạn muốn xóa nó chứ?');" href="<?php admin_url();?>admin.php?page=add-country&action=delete&code=<?php echo $k->code?>">Xóa</a></td>
		
		</tr>
		<?php
		     	}
		 	}?>
		
		</table>

		
	
		
		
	
	   </fieldset>
 <input name="update_c"  style="margin-top:20px;" class="button-primary" type="submit" value="Cập Nhật Tất Cả"/>
		<?php wp_nonce_field('update_country','act_update_country');?>
		</form>
	
	</div>
	
<style>
.table th {
    background-color: #D9E7FF;
    padding: 7px 8px 6px;
    text-align: left;
    white-space: nowrap;
}
</style>
	
	
<?php 
}





