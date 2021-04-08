<?php

class crud
{
	private $db;
	
	function __construct($koneksi)
	{
		$this->db = $koneksi;
	}
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($data=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
					<td class="center">
						<label class="pos-rel"><?php echo $data['id'] ?></label>
					</td>
					<td><?php echo $data['alamat'] ?></td>
					<td><?php echo $data['jenis'] ?></td>
					<?php 
						$query=$this->db->prepare("SELECT * FROM tb_admin WHERE id = :id");
						$query->bindParam(":id", $data['pemilik']);
					    $query->execute();
					    while($row = $query->fetch())
					    {
					?>
					<td class="hidden-480"><?php echo $row['nama'] ?></td>
					<td><?php echo $row['kontak'] ?></td>
				<?php } ?>
					<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="blue" href="index.php?modul=konten&file=view&id=<?php echo $data['id'] ?>">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>
						<a class="green" href="index.php?modul=konten&file=edit&id=<?php echo $data['id'] ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red" href="index.php?modul=konten&file=hapus&id=<?php echo $data['id'] ?>">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
					</td>
				</tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = "index.php?modul=konten&file=content" ;//$_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."&page_no=1'>First</a></li>";
				echo "<li><a href='".$self."&page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."&page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."&page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."&page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."&page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
