<?php
require_once "ProjectManagement.php";

$projectName = "StartTuts";
$projectManagement = new ProjectManagement();
$statusResult = $projectManagement->getAllStatus();

?>
<html>
<head>
<title>Trello</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet"
    href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
body {
    font-family: arial;
}
.task-board {
    background: #2c7cbc;
    display: inline-block;
    padding: 12px;
    border-radius: 3px;
    width: 98%;
    white-space: nowrap;
    overflow-x: scroll;
    min-height: 500px;
}

.status-card {
    width: 250px;
    margin-right: 8px;
    background: #e2e4e6;
    border-radius: 3px;
    display: inline-block;
    vertical-align: top;
    font-size: 0.9em;
}

.status-card:last-child {
    margin-right: 0px;
}

.card-header {
    width: 100%;
    padding: 10px 10px 0px 10px;
    box-sizing: border-box;
    border-radius: 3px;
    display: block;
    font-weight: bold;
}

.card-header-text {
    display: block;
}

ul.sortable {
    padding-bottom: 10px;
}

ul.sortable li:last-child {
    margin-bottom: 0px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0px;
}

.text-row {
    padding: 15px 10px;
    margin: 10px;
    background: #fff;
    box-sizing: border-box;
    border-radius: 3px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    font-size: 0.8em;
    white-space: normal;
    line-height: 20px;
}

.ui-sortable-placeholder {
    visibility: inherit !important;
    background: transparent;
    border: #666 2px dashed;
}
</style>
</head>
<body>
 <div class="container">
        <div class="task-board">
            <?php
            foreach ($statusResult as $statusRow) {
                $taskResult = $projectManagement->getProjectTaskByStatus($statusRow["id"], $projectName);
                ?>
                <div class="status-card">
                    <div class="card-header">
                        <span class="card-header-text"><?php echo $statusRow["status_name"]; ?></span>
                   		                    </div>
                    <ul class="sortable ui-sortable"
                        id="sort<?php echo $statusRow["id"]; ?>"
                        data-status-id="<?php echo $statusRow["id"]; ?>">
                <?php
                if (! empty($taskResult)) {
                    foreach ($taskResult as $taskRow) {
                        ?>
                
                     <li class="text-row ui-sortable-handle"
                            data-task-id="<?php echo $taskRow["id"]; ?>"><?php echo $taskRow["title"]; ?>
                             <img src="images/delete-sign.png"   data-task-id ="<?php echo $taskRow["id"]; ?>" alt="" style="float:right;" id ="delete" height="20" width="20">
               
                            </li>
                
                <?php
                
                    }
                }
                ?>
               
  <button type="button" class="btn btn-info btn-sm" style="float:center;" data-toggle="modal" data-target="#myModal">Add Card                          
  
   </ul>
                </div>
                <?php
            }
            ?>
        </div>
        </div>
        
        
        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Card</h4>
      </div>
      <div class="modal-body">
         <form role="form" method="post" action="<?php echo base_url('trello_add_card'); ?>">
      
    <div class="form-group">
     
      <textarea class="form-control" rows="5" id="card"></textarea>
    </div>
  
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     	 <button type="button" class="btn btn-success" id="addcard" data-dismiss="modal">Save</button>
     </form>
      </div>
    </div>

  </div>
</div>
        
    <script>
    //view card
 $( function() {
     var url = 'edit-status.php';
     $('ul[id^="sort"]').sortable({
         connectWith: ".sortable",
         receive: function (e, ui) {
             var status_id = $(ui.item).parent(".sortable").data("status-id");
             var task_id = $(ui.item).data("task-id");
             $.ajax({
                 url: url+'?status_id='+status_id+'&task_id='+task_id,
                 success: function(response){
                     }
             });
             }
     
     }).disableSelection();
     } );



$(document).ready(function() {
	//add card
    $('#addcard').click(function() {
        var $card = $('#card').val();
       
        $.ajax({
            type: "POST",
            cache: false,       
            url: "/trello_controller/trello_add_card",
            data: {card: card},
            success: function(data) {
                alert('data has been stored to database');
            }
        });
    });

//delete card
$("#delete").click(function(){
    
	 var task_id = $(this).data("task-id");
  
    if(confirm('Are you sure to remove this card ?'))
    {
        $.ajax({
           url: "<?php echo base_url('trello_controller/delete_user_card/')?>"+task_id,
           type: 'DELETE',
           error: function() {
        	   $('#alert').html('<div class="alert alert-danger" role="alert"><div class="alert-icon"><span class="fa fa-check fa-fw"></span>Something went wrong</div></div>');		
       		
           },
           success: function(data) {
               
                $('#alert').html('<div class="alert alert-success" role="alert"><div class="alert-icon"><span class="fa fa-check fa-fw"></span>card has been deleted</div></div>');		
        		 
           }
        });
        location.reload(true);
    }
});

});


  </script>
</body>
</html>