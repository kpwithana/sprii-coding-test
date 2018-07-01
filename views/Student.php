<div id="main">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <form action="IndexController/insertData" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label>First Name: <em>*</em></label>
                        <input type="text" name="firstname" class="form-control" required="required"/>

                        <label>Last Name: <em>*</em></label>
                        <input type="text" name="lastname" class="form-control" required="required"/>
                    </div>
                </div>        	
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label>Subjects: <em>*</em></label>
                        <select name="subjects[]" size="10" class="form-control" required="required" multiple>
                            <?php
                            foreach ($this->SubjectData as $key => $row) {

                                echo '<tr id="' . $row['id'] . '">';
                                echo '<option value="' . $row['id'] . '">' . $row['subject'] . '</option>';

                                echo '</option>';
                            }
                            ?>

                        </select> 
                    </div>
                </div>
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-success btn-lg btn-block">Save</button> 

            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Student List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Id</th>	
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subjects</th>

                </tr>
            </thead>
            <?php
            foreach ($this->StudentData as $key => $row) {

                echo '<tr id="' . $row['id'] . '">';

                foreach ($row as $key => $val) {

                    echo '<td><span>' . $val . '</span></td>';
                }

                echo '<td class="delete">';
                foreach ($this->StudentSubjectData as $line => $data) {
                    if ($data["student_id"] == $row['id']) {
                        echo $data["subject"] . ',';
                    }
                }
                echo'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
