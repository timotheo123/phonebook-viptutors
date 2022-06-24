<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone Book App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container{
            width: 900px;
        }
        
        body{
            background: #f1f1f1;
        }

        .spacer{
            height: 20px;
        }

        tr{
            background: #fff;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <h1 class="display-4 text-center pt-4 pb-4"><i class="fa-solid fa-address-book mr-5" style="margin-right: 10px;"></i> Phone Book App</h1>
            <div class="row">
                <div class="col">
                    <h1 class="display-5 d-inline-block">Contacts</h1>
                    <button class="btn btn-primary mt-3" style="float: right;" data-bs-toggle="modal" data-bs-target="#contact-form-modal"><i class="fa fa-plus"></i> Add Contact</button>
                </div>
            </div>
            <div class="row">
                <div class="spacer"></div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Search for contact by last name..." style="padding-left: 33px;">
                    <i class="fa fa-search" style="position: absolute;margin-top: -27px; margin-left: 12px;"></i>
                </div>
            </div>
            <div class="row">
                <div class="spacer"></div>
            </div>
            <div class="row">
                <div class="col">
                    <table id="contact-list-table" class="table table-hover table-bordered">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="temp_modal_container">
        <div id="contact-form-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="contact-form">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name">
                            </div>
                            <div class="form-group">
                                <label>Tel. No.:</label>
                                <input type="text" class="form-control" name="tel_no">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            get_list();
        });

        function display_list(response){
            $("#contact-list-table tbody").empty();

            let data = !response 
                        ? `<tr>
                            <td style="padding-left: 12px; padding-right: 12px; text-align: center;">
                                No data available.
                            </td>
                        </tr>`
                        : "";

            for(let i = 0; i < response.length; i++){
                data += `<tr>
                            <td>
                                <strong>${response[i].full_name}</strong>
                                <br>
                                <span style="font-size: 13px; color: #bab6b6;"><i class="fa fa-phone"></i> ${response[i].tel_no}</span>
                                <button class="btn btn-danger btn-sm" style="float: right; margin-top: -15px;"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>`;
            }

            $("#contact-list-table tbody").append(data);
        }

        function get_list(){
            $.ajax({
                url: "list",
                method: "GET",
                success: function(response){
                    display_list(response);
                }
            });
        }
    </script>
</body>
</html>