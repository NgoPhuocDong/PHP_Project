<?php 
            if(!empty($result)):
            
            foreach ($result as $row) : extract($row); ?> 
            <tr>
                <td><?=$row['ID']?></td>
                <td><?=$row['TenLoaiSanPham']?></td>
                <td><?=$row['TenSanPham']?></td>
            </tr>
            <?php endforeach; endif; ?>