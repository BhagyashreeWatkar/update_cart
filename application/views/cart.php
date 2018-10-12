<!--<?php //echo form_open('path/to/controller/update/method'); ?>-->
<script type="text/javascript">
      //http://localhost/ci3/index.php/welcome/
      var path = "<?php echo ctrl(); ?>";
      // alert(path)
  </script>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th>QTY</th>
        <th>Item Description</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">Rs.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<!--<p><?php //echo form_submit('', 'Update your Cart'); ?></p>-->


<?php echo form_open('welcome/register_action');?>
 
        <div class="form-group">
        <label for="pwd">UserName:</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">UserMobile:</label>
        <input type="text" class="form-control" name="usermobile">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="useremail">
      </div>
      <div class="form-group">
        <label for="pwd">address</label>
        <input type="text" class="form-control" name="useraddress">
      </div>
      
     <br><br>
      <button type="submit">Submit</a></button>
      <?php echo form_close(); ?>




<br><br><br>

<a href=""><button>Checkout</button></a>

