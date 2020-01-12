<div>

    <table class="table table-striped table-bordered table-hover">
        <thead><tr>
            <td>N</td>
            <td>Имя</td>
            <td>Сумма в USA</td>
        </tr>
        </thead>
        <?php foreach ($image as $key => $value){
            ?>
            <tr>
                <td><?=$value['id']?></td>

                <td><?=$value['name']?></td>

                <td><?=$value['sumBy']?></td>
            </tr>
            <?php
        }
        ?>


    </table>

</div>











































 <?php foreach ($image as $key => $value){
            ?>
 <div>

     <table class="table table-striped table-bordered table-hover">



            <tr>
                <td><?=$value['id']?></td>

                <td><?=$value['name']?></td>

                <td><?=$value['sumBy']?></td>
                <td><?php echo $value['image']?>"</td>

                <td><img src="<?php echo $value['image']?>" alt="альтернативный текст">
                    </td>



         </tr>
         <?php
         }
         ?>


     </table>

 </div>
