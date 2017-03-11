<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-credit-card"></i>
            Invoice List
        </div>
    </h4>
</center>
<br>

<button onclick="ajax_call('invoice-add')" class="btn btn-primary pull-right">
    <i class="entypo-plus"></i>
    <?php echo 'Add New Invoice/Payment'; ?>
</button>
<div style="clear:both;"></div>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Student</th>
            <th>Title</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $invoices   = get_invoices();
        foreach ($invoices as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $student_name = get_student_name_from_id($row['student_id']); ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'secondary';?>"><?php echo $row['status'];?></span></td>
                <td><?php echo date("D, d M Y", $row['creation_timestamp']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('invoice-show' , <?php echo $row['invoice_id'];?>)">
                                    <i class="entypo-eye"></i> View Invoice
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="ajax_call('invoice-edit' , <?php echo $row['invoice_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_invoice' , <?php echo $row['invoice_id'];?>)">
                                    <i class="entypo-cancel-circled"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>

