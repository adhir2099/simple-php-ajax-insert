<html>  
    <head>
        <title>Insert records on modal with ajax</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Adhirsaurio" />
        <meta name="description" content="Insert records on modal with ajax" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/fontawesome.js"></script>  
    </head>  

    <body class="d-flex flex-column min-vh-100">  

        <div class="container mb-5">  
            <div class="mb-5"></div>
            <div id="action_alert" class="text-center"></div>
            <div class="mb-5"></div>
            <div class="d-flex align-items-center mb-4">
                <button class="btn btn-primary btn-sm waves-effect waves-light"  id="modal_button"> New employee <i class="fa fa-user-plus"></i></button>
            </div>
            <div class="table-responsive mb-0" data-pattern="priority-columns" id ="result"></div>    
        </div>
        
        <footer class="footer text-center mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="lead mb-0">Insert records on modal with ajax <a href="https://github.com/adhirsaurio?tab=repositories"><i class="fab fa-github-alt"></i></a></p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Insert records on modal with ajax © 2022</small></div>
        </div>

        <!-- MODAL CREATE -->
        <div id="employeeModal" class="modal fade" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New employee</h4>
                    </div>
                    <div class="modal-body">
                        <div id="action_alert_error" class="text-center"></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" placeholder="gender">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-primary" />
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL -->

    </body>  
</html> 

<script>
    $(document).ready(function(){ 
        
        fetchEmployee(); 

        function fetchEmployee(){

            let action = "Load";

            $.ajax({
                url : "employeeController.php", 
                method:"POST", 
                data:{action:action}, 
                success:function(data){
                    $('#result').html(data);
                }
            });
        }

        $('#modal_button').click(function(){
            $('#employeeModal').modal('show'); 
            $('#name').val(''); 
            $('#address').val(''); 
            $('#gender').val(''); 
            $('#age').val(''); 
            $('.modal-title').text("New employee"); 
            $("#contra").show();
            $('#action').val('Save'); 
        });

        //Create/Insert employee 
        $('#action').click(function(){

            let name    = $('#name').val();
            let address = $('#address').val();  
            let gender  = $('#gender').val();  
            let age     = $('#age').val();  
            let action  = $('#action').val();  

            if(name != ''){

                $.ajax({
                    url : "employeeController.php",   
                    method:"POST",     
                    data:{name:name, address:address, gender:gender, age:age, action:action}, 

                    success:function(data){

                        if(data == 'recordInserted'){
                                $('#action_alert').html("<label class='text-success'><div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><b>X</b></button><label>Employee succesfully added.</label></div></label>");
                                fetchEmployee();
                                $('#employeeModal').modal('hide');     
                        }else{
                            $('#action_alert_error').html("<label class='text-danger'><div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><b>X</b></button><label>Error.</label></div></label>");
                        }
                    }
                });
            }else{
                $('#action_alert_error').html("<label class='text-danger'><div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><b>X</b></button><label>No empty values allowed.</label></div></label>");
            }
        });

    });  
</script>