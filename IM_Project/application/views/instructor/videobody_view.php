<style type="text/css">.entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .glyphicon
    {
        font-size: 12px;
    }
    #filehere{
        width:  500px;
    }
</style>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<div style="margin-top:8%;"></div>
<div class="container">
    <div class="col-xs-4"> <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#ppt" data-toggle="tab">Upload Video</a></li>

            <li><a href="#viewlectures" data-toggle="tab">View Videos Record</a></li>

        </ul>
    </div>

    <div class="col-xs-8">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="ppt">
                <div class="container">
                    <div class="row">
                        <div class="control-group" id="fields">
                            <label class="control-label" for="field1"><h2>Upload Videos of your own choice</h2></label>
                            <div class="controls">
                                <!--                                <form action="--><?php //echo site_url()?><!--/Instructor/addlectures" method="post">-->
                                <form action="<?php echo site_url('Instructor/videoinsertion');?>"  method="post" enctype="multipart/form-data">
                                    <?php
                                    $data = array(
                                        'name'        => 'upload',
                                        'id'          => 'upload',
                                        'value'       => 'Upload Video',
                                        'size'       => '10',
                                        'class'        => 'btn btn-success btn-lg',
                                        'style'       => 'margin-bottom:10px;',
                                        'type'        => 'submit'
                                    );
                                    echo form_input($data);
                                    ?>
                                    <!--                                   <input  class="btn btn-success btn-lg" type="submit" value="Upload"/ style="margin-bottom:10px;">-->

                                    <div class="entry input-group col-xs-3">
                                    
                                     <select name="course" class="form-control">
                                    <?php 
                                    foreach ($course as $courses) {
                                        # code...
                                        $id = $courses['courseID'];
                                        $course_name = $courses['CourseName'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $course_name;?></option>
                                    <?php }?>
                                    </select>
                                    
                                    <?php
                                        // $data = array(
                                        //     'name'        => 'v_fields[]',
                                        //     'id'          => 'video',
                                        //     'class'        => 'form-control',
                                        //     'type'       => 'file'
                                        // );
                                        // echo form_input($data);
                                        $data = array(
                                            'name'        => 'video_name',
                                            'id'          => 'video',
                                            'class'        => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>

                                        <!--<input id="filehere" class="form-control" name="fields[]" type="file" />-->
                                              <span class="input-group-btn">

                                                    <button class="btn btn-success btn-add btn-lg"  style="margin-top:72%" type="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                              </span>
                                    </div>
                                    <?php echo form_close(); ?>
                                    <br>
                                    <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="viewlectures">
                <div class="container">
                    <div class="row">
                        <div class="control-group" id="fields">
                            <label class="control-label" for="field1"><h2>View Videos</h2></label>
                            <div class="controls">

                                <form action="" method="post">
                                    <div class="col-sm-8">
                                        <div class="btn-group show-on-hover">
                                            <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                                                Courses <span class="caret"></span>
                                            </button>
                                            </div>
                                        <br>
                                        <br>
                                        <table  id="example" class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Videos</th>
                                                <th>Delete</th>
                                                <th>Update</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($video as $videos)
                                            {
                                                ?>
                                                <tr>
                                                    <td data-search="Course 1"><?php echo $videos['video_name'];?></td>

                                                    <td><a href="">Delete</a></td>
                                                    <td><a href="">Update</a></td>

                                                </tr>
                                            <?php }?>


                                            </tbody>
                                        </table>
                                    </div>
                                </form>

                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#example').DataTable();
                                    } );

                                </script>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">$(function()
    {
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('#video').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
</script>