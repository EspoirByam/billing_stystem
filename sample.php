<section class="content">
<div class="row">
 <div class="col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><strong> Liste De Sortie</strong></h3>
            </div>
            <!-- /.box-header -->


            <?php 

                $condition =array 
                (
                  'order_by'=>'ID desc'
                );


          $sales = $db->getRows('mppd_sale',$condition);



              ?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No </th>
                  <th>Destination</th>
                  <th>Motif</th>
                  <th>Heure de Sortie </th>
                  <th>Heure Retour</th>
                  <th>Identification du Personnel</th>
                 </tr>
                </thead>
                <tbody>
                    
                     <?php if(!empty($sales)): $count = 0; foreach($sales as $sale): $count++; ?>
                    <tr>
                      <td><?php echo '#'.$count; ?></td>
                        <?php 
                             $condition =array 
                              (
                                'order_by'=>'ID desc',
                                'where'=>array('ID' => $sale['Prod_id'] )
                              );
                             $products = $db->getRows('mppd_product',$condition);

                              if(!empty($products)) :  foreach($products as $list): 
                         ?>
                            <td><?php echo $list['Name']; ?></td>
                            
                        
                        
                        <td><?php echo $sale['Price']; ?></td>
                        <td><?php echo $sale['Quantity']; ?></td>
                        
                        <?php 
                             $condition =array 
                              (
                                'order_by'=>'ID desc',
                                'where'=>array('ID' => $sale['Client_id'] )
                              );
                             $clients = $db->getRows('mppd_client',$condition);

                              if(!empty($clients)) :  foreach($clients as $client): 
                         ?>
                            <td><?php echo $client['Name']; ?></td>
                            <?php endforeach; else: ?>
                            <?php endif; ?>
                        
                            <?php endforeach; else: ?>
                            <?php endif; ?>
                        <td><?php echo $sale['Sale_Date']; ?></td>

                         <?php 
                             $condition =array 
                              (
                                'order_by'=>'ID desc',
                                'where'=>array('ID' => $sale['User_id'] )
                              );
                             $users = $db->getRows('mppd_user',$condition);

                              if(!empty($users)) :  foreach($users as $user): 
                         ?>
                            <td><?php echo $user['firstname']." ".$user['lastname']; ?></td>
                            <?php endforeach; else: ?>
                            <?php endif; ?>


                         <!--<td>
                           <a href="<?php echo $db->url ?>?request=useredit&amp;id=<?php echo $user['ID']; ?>&whid=<?php echo $user['warehouse_id'];?>" class="glyphicon glyphicon-edit"> Edit</a>
                            <a href="class/config.php?action_type=deleteu&id=<?php echo $user['ID']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Do you really  want to delete this user ?')"> Delete</a>
                        </td>-->

                        <?php endforeach; else: ?>
                           
                        
                    </tr>
                    
                    <tr><td colspan="5">No match found </td></tr>
                     <?php endif; ?>


                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
          <!-- /.box -->
        </div>
      </section>


      <?php if(!empty($projects)): $count = 0; foreach($projects as $project): $count++; ?>
      <option value="<?php echo $project['ID']; ?>"> <?php echo $project['Name'] ; ?></option>
      <?php endforeach; else: ?>
      <?php endif; ?>

      
 